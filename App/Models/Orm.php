<?php

namespace App\Models;

class Orm
{

    protected $model;


    public function __construct($model)
    {
        $this->model = $model;
        if (!isset($_SESSION[$this->model])) {
            $_SESSION[$this->model] = [];
        }
    }

    public function getById($id)
    {
        //retorna el item del id passat
        foreach ($_SESSION[$this->model] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function removeItemById($id) {
        //elimina el item amb el id passat
        foreach($_SESSION[$this->model] as $item){
            if($item["id"]==$id){
                unset($item);
            }
        }
    }

    public function create($item)
    {
        array_push($_SESSION[$this->model], $item);
    }

    public function getAll()
    {
        return $_SESSION[$this->model];
    }

    public function updateItemById($item) {
        //actulaitza el item dins el model a 
        //parir del id del item passat
        foreach($_SESSION[$this->model] as $key=>$i){
            if($item["id"]==$i["id"]){
                $_SESSION[$this->model][$key]=$item;
                return;
            }
        }
    }

    public function reset() {
        //esboora el contingut del model
        $_SESSION[$this->model] = [];
    }

    public function sessionCreated()
    {
        if (isset($_SESSION[$this->model])) {
            return true;
        }
        return false;
    }

    public function getLastId() {
        //retorna el Id per crea un nou item del model
        $keyReturn=0; $id=0;
        foreach($_SESSION[$this->model] as $key=>$m){
            if($m["id"]>$id) $id=$m["id"];
            // echo "<pre>";
            // print_r($m);
            // echo "</pre>";
            if($m["id"]>$id){
                $keyReturn=$key;
                $id=$m["id"];
            }
        }
        return $_SESSION[$this->model][$key];
    }
}
