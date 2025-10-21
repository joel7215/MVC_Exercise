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
        return $this->userLogged;
    }

    public function setUserLogged($user) {
        if($user==null){
            unset($_SESSION["user_looged"]);
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

}
