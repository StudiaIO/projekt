<?php


namespace app\controllers;


use core\App;
use core\Utils;
use app\forms\PlaceForm;
use core\ParamUtils;
use core\Validator;
use core\Logs;
use core\SessionUtils;

class PanelControl
{
  
   public $allPlaces;
  
    
    public $places;
    public $place;
    public $offset = 1;
    public $records = 50;
    public $form;
    
    public function __construct()
    {
        $this->form = new PlaceForm();
    }
    
    public function getParams(){
            $this->form->chceck_in_date = ParamUtils::getFromPost('chceck_in_date');
            $this->form->chceck_out_date = ParamUtils::getFromPost('chceck_out_date');
        
    }
    public function getPlacesFromDB(){
        try{
           
            $this->places = App::getDB()->select("rooms",[
                "[>]room_type" => ["id" => "room_id"],
                "[>]user" => ["room_type.author" => "id"],
                
            ],[
                'rooms.id',
                'rooms.room_no',
                'rooms.price',
                'user.login',
                'user.id(userid)',
                'room_type.type',
                'rooms.description',
               
            ],[
                'LIMIT' => [(($this->offset - 1) * $this->records), $this->records]
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!".$e->getMessage());
        }
    }
    
    public function checkIsNextPage(){
        try{
            $isNext = App::getDB()->has("rooms",[
                'LIMIT' => [(($this->offset) * $this->records), $this->records]
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return $isNext;
    }
    
    public function getPlaceFromDB($id){
        try{
            $this->place = App::getDB()->get("rooms",[
                "[>]room_type" => ["id" => "room_id"],
                "[>]user" => ["room_type.author" => "id"]
            ],[
                'rooms.id',
                'rooms.room_no',
                'rooms.price',
                'room_type.type',
                'room_type.author',
                'rooms.description',
                'user.login',
                'user.id(userid)'
            ],[
                'room_id' => $id
            ]);

           
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
    
   
    
    

    public function getAmountOfPlaces(){
        $count = 0;
        try{
            $count = App::getDB()->count("rooms", "id");
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return $count;
    }

    public function action_panel(){
      $this->getParams();
       $option = ParamUtils::getFromCleanURL(2);
        $place_id = ParamUtils::getFromCleanURL(3);

        switch ($option){
         
           
            case "booking" :
                $this->getPlaceFromDB($place_id);
                App::getSmarty()->assign("booking", true);
                App::getSmarty()->assign("placeDetails", $this->place);
                break;
        }
        $offset = ParamUtils::getFromCleanURL(1);
        if(isset($offset) && is_numeric($offset) && $offset > 0) $this->offset += $offset - 1;
        if(isset($offset) && $offset == 0) $this->records = App::getDB()->count("user","*");
        
        
        $this->allPlaces = $this->getAmountOfPlaces();
        
        $this->generateView();
    }
    
    

    public function generateView(){
        $this->getPlacesFromDB();
       
        App::getSmarty()->assign("places", $this->places);
        App::getSmarty()->assign("offset", $this->offset);
        App::getSmarty()->assign("isNextPage", $this->checkIsNextPage());
        App::getSmarty()->assign("next_page", $this->offset + 1);
        App::getSmarty()->assign("previous_page", $this->offset - 1);
        App::getSmarty()->assign('page_title', "Szukaj noclegu");
        App::getSmarty()->assign('allPlaces', $this->allPlaces);
        App::getSmarty()->display("PanelView.tpl");
       
  
       
         App::getSmarty()->assign('allPlaces', $this->allPlaces);
    }

}