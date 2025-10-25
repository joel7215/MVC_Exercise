<?php

namespace App\Models;

use App\Models\Orm;

class User extends Orm
{
    public function __construct() {
        parent::__construct('users');
    }

    public function login($username,$password){
        foreach($_SESSION[$this->model] as $user){
            if($user["username"]==$username){
                if($user["password"]==$password){
                    return $user;
                }
            }
        }
        return 3;
    }

    public function getUserLogged()  {
        return $_SESSION["user_logged"];
    }

    public function isUserLogged()
    {
        return isset($_SESSION["user_logged"]);
    }

    public function userDeslogged()
    {
        unset($_SESSION["user_logged"]);
    }

    public function setUserLogged($user) {
        if($user==null){
            unset($_SESSION["user_logged"]);
        }else{
            $_SESSION["user_logged"]=$user;
        }
    }

    public function usernameExist($username)
    {
        foreach($_SESSION[$this->model] as $user){
            if($username==$user["username"]){
                return true;
            }
        }
        return false;
    }

    public function modify($user)
    {
        foreach($_SESSION[$this->model] as $key=>$u){
            if($u["id"]==$user["id"]){
                $_SESSION[$this->model][$key]["username"]=$user["username"];
                $_SESSION[$this->model][$key]["password"]=$user["password"];
                $_SESSION[$this->model][$key]["mail"]=$user["mail"];
                return;
            }
        }
    }
}
