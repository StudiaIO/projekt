<?php

namespace app\controllers;

use app\forms\RegisterForm;
use core\Logs;
use core\SessionUtils;
use core\ParamUtils;
use core\App;
use core\Utils;
use core\Validator;


class RegisterControl
{
 
    public $form;

    
    public function __construct(){
        $this->form = new RegisterForm();
    }

   
    public function getFormParams(){
        $this->form->email = ParamUtils::getFromRequest("email");
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->name = ParamUtils::getFromRequest("name");
        $this->form->country = ParamUtils::getFromPost('country');
        $this->form->password = ParamUtils::getFromRequest("password");
        $this->form->mobile = ParamUtils::getFromRequest("mobile");
        
        
      
    }

   
    public function validateForm(){
        if(!empty(SessionUtils::load("id", true))) return true;

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        $v->validate($this->form->email,[
            'email' => true,
            'trim' => true,
            'required' => true,
            'required_message' => 'Adres email jest wymagany',
            'validator_message' => "Nieprawidłowy adres email"
        ]);

        $v->validate($this->form->login,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Login jest wymagany',
           
        ]);

        $v->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',

        ]);
        $v->validate($this->form->name,[
            'required' => true,
            'required_message' => 'Imie i nazwisko jest wymagane',

        ]);
           $v->validate($this->form->country,[
            'required' => true,
            'required_message' => 'Kraj jest wymagany',
        ]);
           
             $v->validate($this->form->mobile,[
            'required' => true,
            'required_message' => 'Telefon jest wymagany',
        ]);
       

        $this->checkForDuplicate();

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

   
    public function checkForDuplicate(){
        try{
            $loginCount = App::getDB()->has("user", [
                'login' => $this->form->login
            ]);

            $emailCount = App::getDB()->has("user",[
                'email' => $this->form->email
            ]);

            if($loginCount){
                Utils::addErrorMessage("Podany login jest już zajęty");
            }

            if($emailCount){
                Utils::addErrorMessage("Podany email jest już zajęty");
            }

        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }
    }

  
    public function insertToDb(){
        try{
            $userRole_id = App::getDB()->get("role", "id_role",[
                'name' => 'user'
            ]);

            App::getDB()->insert("user_details",[
                'register_date' => (new \DateTime())->format('Y-m-d H:i:s')
            ]);

            $userId = App::getDB()->id();

            App::getDB()->insert("user",[
                'id' => $userId,
                'login' => $this->form->login,
                'password' => md5($this->form->password),
                'email' => $this->form->email,
                'name' => $this->form->name,
                'country' => $this->form->country,
                'mobile' => $this->form->mobile,
                'id_role' => $userRole_id
                
            ]);

            Utils::addInfoMessage("Konto zostało utworzone");
            Logs::addLog("Utworzenie nowego konta: ".$this->form->login);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }

    /**
     * @throws \SmartyException
     */
    public function generateView(){
        if($this->validateForm()){
            $this->insertToDb();
            header("Location: ".App::getConf()->app_url."/login");
        }
        else{
            App::getSmarty()->assign('page_title','Rejestracja');
            App::getSmarty()->assign('page_description','Rejestracja');
            App::getSmarty()->display('RegisterView.tpl');
        }
    }

    /**
     * @throws \SmartyException
     */
    public function action_register(){
        $this->getFormParams();
        $this->generateView();
    }
}