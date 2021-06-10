<?php


namespace app\controllers;

use core\App;
use core\Logs;
use core\ParamUtils;
use core\Utils;
use core\SessionUtils;

class RoomManagerControl
{
    public $places;
    public $place;
    public $offset = 1;
    public $records = 50;

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

    public function deletePlace($id){
        try{
            $result = App::getDB()->has("rooms",[
                'id' => $id
            ]);

            if($result){
                App::getDB()->delete("rooms",[
                    'id' => $id
                ]);

                App::getDB()->delete("room_type",[
                    'room_id' => $id
                ]);

                Utils::addInfoMessage("Miejsce (".$id.") zostało usunięte");
                $admin_login = SessionUtils::load("login", true);
                Logs::addLog("Miejsce (".$id.") zostało usunięte przez ".$admin_login);
            }
            else{
                Utils::addErrorMessage("Pokój nie istnieje");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return false;
    }

    public function action_managePlaces(){
        $option = ParamUtils::getFromCleanURL(2);
        $place_id = ParamUtils::getFromCleanURL(3);

        switch ($option){
         
            case "delete" :
                $this->deletePlace($place_id);
                break;
            case "edit" :
                $this->getPlaceFromDB($place_id);
                App::getSmarty()->assign("edit", true);
                App::getSmarty()->assign("placeDetails", $this->place);
                break;
        }


        $offset = ParamUtils::getFromCleanURL(1);
        if(isset($offset) && is_numeric($offset) && $offset > 0) $this->offset += $offset - 1;
        if(isset($offset) && $offset == 0) $this->records = App::getDB()->count("user","*");
        $this->generateView();
    }

    public function generateView(){
        $this->getPlacesFromDB();
        App::getSmarty()->assign("places", $this->places);
        App::getSmarty()->assign("offset", $this->offset);
        App::getSmarty()->assign("isNextPage", $this->checkIsNextPage());
        App::getSmarty()->assign("next_page", $this->offset + 1);
        App::getSmarty()->assign("previous_page", $this->offset - 1);
        App::getSmarty()->assign("page_title", "Zarządzanie miejscami noclegowymi");
        App::getSmarty()->display("ManageRoomView.tpl");
    }
}