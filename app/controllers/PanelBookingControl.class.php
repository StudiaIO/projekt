<?php


namespace app\controllers;

use app\forms\PlaceForm;
use core\App;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;
use core\Logs;
use core\RoleUtils;

class PanelBookingControl
{
    public $form;
    public $roomId;

    public function __construct(){
        $this->form = new PlaceForm();
    }

    public function getParamss(){
      
        $this->form->room_id = ParamUtils::getFromPost('id');
        $this->form->chceck_in_date = ParamUtils::getFromPost('chceck_in_date');
        $this->form->chceck_out_date = ParamUtils::getFromPost('chceck_out_date');
       
    }

    public function validateBooking(){
        

        $v = new Validator();
        $v->validate($this->form->chceck_in_date,[
        'required' => true,
        'required_message' => 'Data początkowa jest wymagana',
        ]);

        $v->validate($this->form->chceck_out_date,[
        'required' => true,
        'required_message' => 'Data końcowa jest wymagana',  
        ]);
    
       $this->checkForDuplicates();

        if(!App::getMessages()->isError()) return true;
        else return false;
    }
    
   public function checkForDuplicates(){
        try{
            $record = App::getDB()->has('room_booking',[
                'AND'=>[
                    'room_id' => $this->form->room_id,
                    'chceck_in_date' => $this->form->chceck_in_date,
                    'chceck_out_date' => $this->form->chceck_out_date,
                   
                    ]
                
            ]);

            if($record){
                Utils::addErrorMessage("Nie można zarezerwować wybierz inny termin");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    public function addBooking(){
        try{
            
            App::getDB()->insert('room_booking',[
                'booking_id' => null,
                'chceck_in_date' => $this->form->chceck_in_date,
                'chceck_out_date' => $this->form->chceck_out_date,
                'user_id' => SessionUtils::load('id', true),
                'room_id' => $this->form->room_id,
            ]);
             Utils::addInfoMessage("Pomyślnie zarezerwowano!");
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

       
        $login = SessionUtils::load('login', true);
        $role = SessionUtils::load('role', true);
        Logs::addLog("Zarezerwowano pokój o numerze id: ".$this->roomId." przez ".$role.": ".$login );
        
    }

    public function generateView(){
        if($this->validateBooking()){
            $this->addBooking();
            Utils::addInfoMessage("Pomyślnie zarezerwowano nowe miejsce!");
            
        }
        header("Location: ".App::getConf()->app_url."/panel/0/booking/".$this->roomId);
    }

    public function action_panelBooking(){
        $this->getParamss();
        
        $this->generateView();
    }

}