<?php


namespace app\controllers;

use app\forms\PlaceForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;
use core\Logs;
use core\SessionUtils;


class UsersBookingControl
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
         
        
    }
    public function selectBookingDBB(){
        try{
           
            $this->places = App::getDB()->select("room_booking",[
                "[>]user" => ["user_id" => "id"],
                "[>]rooms" => ["room_id" => "id"],
              ],[ 
                'room_booking.booking_id',
                'room_booking.chceck_in_date',
                'room_booking.chceck_out_date',
                'room_booking.user_id',
                'user.login',
                'user.name',
                'rooms.room_no',
                'rooms.id',
             
            ],[
              
               
               "user_id" => SessionUtils::load('id', true)
                      
            ],
                    
            [
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
    
      public function deleteBooking($id){
        try{
            $result = App::getDB()->has("room_booking",[
                'booking_id' => $id
            ]);

            if($result){
                App::getDB()->delete("room_booking",[
                    'booking_id' => $id
                ]);

                

                Utils::addInfoMessage("Miejsce (".$id.") zostało usunięte");
                $admin_login = SessionUtils::load("login", true);
                Logs::addLog("Miejsce (".$id.") zostało usunięte przez ".$admin_login);
            }
            else{
                Utils::addErrorMessage("Nie masz żadnych rezerwacji");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return false;
    }
      public function selectBookingDB(){
        try{
           
            $this->places = App::getDB()->select("room_booking",[
                "[>]user" => ["user_id" => "id"],
                "[>]rooms" => ["room_id" => "id"],
              ],[ 
                'room_booking.booking_id',
                'room_booking.chceck_in_date',
                'room_booking.chceck_out_date',
                'room_booking.user_id',
                'user.login',
                'user.name',
                'rooms.room_no',
                'rooms.id',
             
            ],
                    
            [
                'LIMIT' => [(($this->offset - 1) * $this->records), $this->records]
            ]);
             
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!".$e->getMessage());
        }
    }
   
    
    

    

    public function action_usersBooking(){
      $this->getParams();
       $option = ParamUtils::getFromCleanURL(2);
        $place_id = ParamUtils::getFromCleanURL(3);

        switch ($option){
            
            case "delete" :
                $this->deleteBooking($place_id);
                break;
           
            case "booking" :
                $this->deleteBooking($booking_id);
                App::getSmarty()->assign("booking", true);
                App::getSmarty()->assign("placeDetails", $this->place);
                break;
        }
        $offset = ParamUtils::getFromCleanURL(1);
        if(isset($offset) && is_numeric($offset) && $offset > 0) $this->offset += $offset - 1;
        if(isset($offset) && $offset == 0) $this->records = App::getDB()->count("user","*");
        
        
        
        
        $this->generateView();
    }
    
    

    public function generateView(){
          if(SessionUtils::load('role', true) == 'user'){
               
                 $this->selectBookingDBB();
               } 
               else{
                $this->selectBookingDB();
               }
       
        App::getSmarty()->assign("places", $this->places);
        App::getSmarty()->assign("offset", $this->offset);
        App::getSmarty()->assign("isNextPage", $this->checkIsNextPage());
        App::getSmarty()->assign("next_page", $this->offset + 1);
        App::getSmarty()->assign("previous_page", $this->offset - 1);
        App::getSmarty()->assign('page_title', "Szukaj noclegu");
        App::getSmarty()->assign('allPlaces', $this->allPlaces);
        App::getSmarty()->display("UsersBookingView.tpl");
       
  
       
         App::getSmarty()->assign('allPlaces', $this->allPlaces);
    }

}