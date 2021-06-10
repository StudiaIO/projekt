<?php


namespace app\controllers;


use core\App;
use core\Logs;
use core\ParamUtils;
use core\Utils;
use core\SessionUtils;


class UserManagerControl
{
    
    public $users;
    public $user;
    public $roles;
    public $offset = 1;
    public $records = 50;

   
    public function getUsersFromDB(){
        try{
            $this->users = App::getDB()->select("user", [
                "[>]role" => ["id_role" => "id_role"],
            ],[
                'user.id',
                'user.login',
                'user.password',
                'user.name',
                'user.country',
                'user.email',
                'user.mobile',
                'user.id_role',
                'role.name',
            ],[
                'LIMIT' => [(($this->offset - 1) * $this->records), $this->records]
            ]);

            $this->roles = App::getDB()->select("role", "*");
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }

    public function checkIsNextPage(){
        try{
            $isNext = App::getDB()->has("user",[
                'LIMIT' => [(($this->offset) * $this->records), $this->records]
            ]);
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return $isNext;
    }

    public function getUserFromDB($id){
        try{
            $this->user = App::getDB()->get("user", [
                "[>]role" => ["id_role" => "id_role"],
                "[>]user_details" => ["id" => "id_details"]
            ],[
                'user.id',
                'user.login',
                'user.password',
                'user.name',
                'user.country',
                'user.email',
                'user.mobile',
                'user.id_role',
                'role.name',
            ],[
                'user.id' => $id
            ]);

        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }
    }

    
    public function generateView(){
        $this->getUsersFromDB();
        App::getSmarty()->assign("roles", $this->roles);
        App::getSmarty()->assign("users", $this->users);
        App::getSmarty()->assign("offset", $this->offset);
        App::getSmarty()->assign("isNextPage", $this->checkIsNextPage());
        App::getSmarty()->assign("next_page", $this->offset + 1);
        App::getSmarty()->assign("previous_page", $this->offset - 1);
        App::getSmarty()->assign("page_title", "Zarządzanie użytkownikami");
        App::getSmarty()->display("ManageUsersView.tpl");
    }

    
    public function deleteUser($id){
        try{
            $result = App::getDB()->get("user", [
                "[>]role" => ["id_role" => "id_role"],
            ],[
                'user.id',
                'role.name',
            ],[
                'id' => $id
            ]);

            if(isset($result) && $result['name'] == 'admin'){
                Utils::addErrorMessage("Nie można usunąć konta administratora");
                return false;
            }

            if(!empty($result)){
                App::getDB()->delete("user",[
                    'id' => $id
                ]);

                App::getDB()->delete("user_details",[
                    'id_details' => $id
                ]);

                Utils::addInfoMessage("Użytkownik (".$id.") został usunięty");
                $admin_login = SessionUtils::load("login", true);
                Logs::addLog("Użytkownik (".$id.") został usunięty przez ".$admin_login);
            }
            else{
                Utils::addErrorMessage("Użytkownik nie istnieje");
            }
        }catch(\PDOException $e){
            Utils::addErrorMessage("Błąd połączenia z bazą danych!");
        }

        return false;
    }

    /**
     * @throws \SmartyException
     */
    public function action_manageUsers(){
        $option = ParamUtils::getFromCleanURL(2);
        $user_id = ParamUtils::getFromCleanURL(3);

        switch ($option){
           
            case "delete" :
                if(SessionUtils::load('role', true) == 'moderator'){
                    Utils::addErrorMessage("Tylko administrator może usuwać użytkowników!");
                    break;
                }
                $this->deleteUser($user_id);
                break;
            case "edit" :
                $this->getUserFromDB($user_id);
                App::getSmarty()->assign("edit", true);
                App::getSmarty()->assign("userDetails", $this->user);
                break;
        }


        $offset = ParamUtils::getFromCleanURL(1);
        if(isset($offset) && is_numeric($offset) && $offset > 0) $this->offset += $offset - 1;
        if(isset($offset) && $offset == 0) $this->records = App::getDB()->count("user","*");
        $this->generateView();
    }
}