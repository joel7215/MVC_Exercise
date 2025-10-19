<?php

namespace App\Models;

use App\Models\Orm;

class User extends Orm
{
<<<<<<< HEAD
=======
    private $userLogged=[];

>>>>>>> a89ed638489828053d0514b3151c7ab1666cad97
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
    public function login($username,$password) {
        foreach ($_SESSION[$this->model] as $user) {
            if ($user['username']==$username) {
                if ($user['password']==$password) {
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
        $this->userLogged=$user;
    }
}
