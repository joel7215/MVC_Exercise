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
}
