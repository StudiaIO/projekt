<?php

namespace app\controllers;

use app\forms\PlaceForm;
use core\App;
use core\ParamUtils;
use core\RoleUtils;
use core\SessionUtils;
use core\Utils;
use core\Validator;


/**
 * Class AddPlaceControl
 * @package app\controllers
 */
class AddPlaceControl
{
    /**
     * @var PlaceForm
     */
    public $form;
    public $newAddedId;
    /**
     * AddPlaceControl constructor.
     */
    public function __construct()
    {
        $this->form = new PlaceForm();
    }

    /**
     *
     */
    public function getParams(){
        $this->form->room_no = ParamUtils::getFromPost('room_no');
        $this->form->price = ParamUtils::getFromPost('price');
        $this->form->type = ParamUtils::getFromPost('type');
        $this->form->description = ParamUtils::getFromPost('description');
        
    }

   
    public function validatePlace(){
        if(!$this->form->checkIsNull()) return false;

       

        $v = new Validator();
        $v->validate($this->form->room_no,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Numer jest wymagany',
            
        ]);

        $v->validate($this->form->price,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Cena jest wymagana',
            
        ]);

        $v->validate($this->form->type,[
            'required' => true,
            'required_message' => 'Rodzaj pokoju jest wymagany',
        ]);

         $v->validate($this->form->description,[
            'max_length' => 65535,
            'validator_message' => "Podany opis jest zbyt długi!"
        ]);

        

        

        $this->checkForDuplicates();

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    public function checkForDuplicates(){
        try{
            $record = App::getDB()->has('rooms',[
                'AND'=>['room_no' => $this->form->room_no,]
            ]);

            if($record){
                Utils::addErrorMessage("Pokój o podanym numerze istnieje już w bazie!");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    /**
     *
     */
    public function insertToDB(){
        try{
            App::getDB()->insert('rooms',[
                'id' => null,
                'room_no' => $this->form->room_no,
                'price' => $this->form->price,
                'description' => $this->form->description,
            ]);

            $this->newAddedId = App::getDB()->id();

            App::getDB()->insert('room_type',[
                'id_details' => null,
                'room_id' => $this->newAddedId,
               
                'author' => SessionUtils::load('id', true),
                'type' => $this->form->type
                
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

    /**
     * @throws \SmartyException
     */
    public function generateView(){
        if($this->validatePlace()){
            $this->insertToDB();
            Utils::addInfoMessage("Pomyślnie dodano nowy pokój");
            header("Location: ".App::getConf()->app_url."/addPlace/".$this->newAddedId);
        }
        else{
            App::getSmarty()->assign("title", "Dodaj nowy pokoj");
            App::getSmarty()->assign("form", $this->form);
            App::getSmarty()->assign("page_title", "Dodaj nowy pokoj");
            App::getSmarty()->display("AddPlaceView.tpl");
        }
    }


    /**
     * @throws \SmartyException
     */
    public function action_addPlace(){
        $this->getParams();
        $this->generateView();
    }

}