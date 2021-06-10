<?php


namespace app\controllers;

use app\forms\PlaceForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use core\Logs;
use core\SessionUtils;

class RoomEditControl
{
    public $form;
    public $roomId;

    public function __construct(){
        $this->form = new PlaceForm();
    }

    public function getParams(){
        $this->roomId = ParamUtils::getFromPost('id');
        $this->form->room_no = ParamUtils::getFromPost('room_no');
        $this->form->price = ParamUtils::getFromPost('price');
        $this->form->type = ParamUtils::getFromPost('type');
        $this->form->description = ParamUtils::getFromPost('description');
        
    }

    public function validatePlace(){
        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        $v->validate($this->form->room_no,[
       
        ]);

        $v->validate($this->form->price,[
          
        ]);
        
        $v->validate($this->form->description,[
          
        ]);
        
        $v->validate($this->form->type,[
          
        ]);
  
      

      

        $this->checkForDuplicates();

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    public function checkForDuplicates(){
        try{
            $record = App::getDB()->has('rooms',[
                'AND'=>[
                    'room_no' => $this->form->room_no,
                   
                    'id[!]' => $this->roomId
                ]
            ]);

            if($record){
                Utils::addErrorMessage("Pokój o podanym numerze istnieje już w bazie!");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function updatePlace(){
        try{
            App::getDB()->update('rooms',[
                'room_no' => $this->form->room_no,
                'price' => $this->form->price,
                'description' => $this->form->description,
               
            ],[
                'id' => $this->roomId
            ]);

            App::getDB()->update('room_type',[
                
                'type' => $this->form->type,
               
            ],[
                'room_id' => $this->roomId
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        Utils::addInfoMessage("Pomyślnie zmieniono szczegóły pokoju!");
        $login = SessionUtils::load('login', true);
        $role = SessionUtils::load('role', true);
        Logs::addLog("Edycja miejsca: ".$this->roomId." przez ".$role.": ".$login );
    }

    public function generateView(){
        if($this->validatePlace()){
            $this->updatePlace();
        }
        header("Location: ".App::getConf()->app_url."/managePlaces/0/edit/".$this->roomId);
    }

    public function action_placeEdit(){
        $this->getParams();
        $this->generateView();
    }

}