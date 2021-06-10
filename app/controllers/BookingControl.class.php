<?php


namespace app\controllers;

use app\forms\PlaceForm;

use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;
use core\SessionUtils;

class BookingControl
{

    public $id;
    public $markerData;
  
   public function __construct()
    {
        $this->form = new PlaceForm();
    }

    /**
     *
     */
    public function getParams(){
        $this->form->chceck_in_date = ParamUtils::getFromPost('chceck_in_date');
        $this->form->chceck_out_date = ParamUtils::getFromPost('chceck_out_date');
    
        
    }
    
     public function validateBooking(){
        if(!$this->form->checkIsNull()) return false;

       

        $v = new Validator();
        $v->validate($this->form->chceck_in_date,[
            'trim' => true,
            'required' => true,
           
            
        ]);

        $v->validate($this->form->chceck_out_date,[
            'trim' => true,
            'required' => true,
            
            
        ]);

       
    }
       public function insertTooDB(){
        try{
            App::getDB()->insert('room_booking',[
                'id' => null,
                'chceck_in_date' => $this->form->chceck_in_date,
                'chceck_out_date' => $this->form->chceck_out_date,
                'user_id'=> SessionUtils::load('id', true),
                'room_id'=> $this->form->id,
            ]);

           

            
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }
  
        
    public function getBookingFromDb($id){
        try{
            $this->markerData = App::getDB()->get("rooms", [
                "[>]room_type" => ["id" => "room_id"],
                "[>]user" => ["room_type.author" => "id"],
            ],[
                'rooms.description',
                'room_type.type',
                'room_type.room_id',
                'user.login',
                'user.id',
                'rooms.room_no',
                'rooms.price',
                
            ],[
                'rooms.id' => $id
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
        return $this->markerData;
    }

 

  

    public function generateView(){
        $this->markerData = $this->getBookingFromDb($this->id);
      
        
        App::getSmarty()->assign("place", $this->markerData);
        App::getSmarty()->assign("page_title", "Miejsce: " .$this->markerData['room_no']);
        App::getSmarty()->display("BookingView.tpl");
    }

    public function validate(){
        if(empty($this->id) || $this->id <= 0) Utils::addErrorMessage("Brak parametru");

        $v = new Validator();
        $v->validate($this->id,[
            'numeric' => true,
            'int' => true,
            'validator_message' => 'Nieprawidłowy parametr!',
        ]);

        $this->isExist();

        if(App::getMessages()->isError()) return false;
        else return true;
    }

    public function isExist(){
        try{
            $isExist = App::getDB()->has("rooms", [
                'id' => $this->id
            ]);

            if(!$isExist){
                Utils::addErrorMessage("");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }
    
   
    

    public function action_hotel(){
        $this->id = ParamUtils::getFromCleanURL(1);
         $this->generateView();
        if(!$this->validate()){
            header("Location: ".App::getConf()->app_url."/panel");
        }
        else{
            $this->generateView();
        }
    }
}