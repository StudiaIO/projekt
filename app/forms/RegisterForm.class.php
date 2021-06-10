<?php

namespace app\forms;

class RegisterForm
{
    public $email;
    public $login;
    public $password;
    public $name;
    public $country;
    public $mobile;

    function checkIsNull() {
        foreach ($this as $key => $value) {
            if(!isset($value)) return false;
            else return true;
        }
    }
}