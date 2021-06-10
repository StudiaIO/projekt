<?php

namespace app\controllers;

use app\forms\LoginForm;
use core\Logs;
use core\ParamUtils;
use core\App;
use core\SessionUtils;
use core\RoleUtils;
use core\Utils;
use core\Validator;


class LoginControl
{
    
    public $form;

    public $accountData;

   
    public function __construct(){
        $this->form = new LoginForm();
    }

    
    public function getLoginParams(){
        $this->form->login = ParamUtils::getFromRequest("login");
        $this->form->password = ParamUtils::getFromRequest("password");
    }

   
    public function validateLogin(){
        if(!empty(SessionUtils::load("id", true))) return true;

        if(!$this->form->checkIsNull()) return false;

        $v = new Validator();
        $v->validate($this->form->login,[
            'trim' => true,
            'required' => true,
            'required_message' => 'Login jest wymagany',
           
        ]);

        $v->validate($this->form->password,[
            'required' => true,
            'required_message' => 'Hasło jest wymagane',
        ]);

        if(App::getMessages()->isError()) return false;

        try{
            $this->accountData = App::getDB()->get("user", [
                "[>]role" => ["id_role" => "id_role"],
            ],[
                'user.id',
                'user.login',
                'user.password',
                'role.name',
            ],[
                'login' => $this->form->login,
                'password' => md5($this->form->password)
            ]);

            if(empty($this->accountData)){
                Utils::addErrorMessage("Nieprawidłowy login lub hasło");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych");
        }

        if(!App::getMessages()->isError()) return true;
        else return false;
    }

    
    public function generateView(){
        if($this->validateLogin()){
            SessionUtils::store("id", $this->accountData["id"]);
            SessionUtils::store("login", $this->accountData["login"]);
            SessionUtils::store("role", $this->accountData["name"]);

            App::getDB()->update('user_details',[
                'last_login' => (new \DateTime())->format('Y-m-d H:i:s')
            ],[
                'id_details' => $this->accountData["id"]
            ]);

            RoleUtils::addRole($this->accountData["name"]);
            RoleUtils::addRole("logged");
            Utils::addInfoMessage("Logowanie udane!");

            Logs::addLog("Logowanie na konto: " . $this->accountData["login"]);
            header("Location: ".App::getConf()->app_url."/panel");
        }
        else{
            App::getSmarty()->assign('page_title','Zaloguj się');
            App::getSmarty()->assign('page_description','Logowanie do systemu');
            App::getSmarty()->display('SignInView.tpl');
        }
    }

    /**
     * @throws \SmartyException
     */
    public function action_login(){
        $this->getLoginParams();
        $this->generateView();
    }

    /**
     *
     */
    public function action_logout(){
        RoleUtils::removeRole("logged");
        RoleUtils::removeRole(SessionUtils::load("role"));
        SessionUtils::remove("id");
        SessionUtils::remove("login");
        SessionUtils::remove("role");
        header("Location: ".App::getConf()->app_url);
    }
}