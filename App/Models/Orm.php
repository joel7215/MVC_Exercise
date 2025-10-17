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
        foreach ($_SESSION[$this->model] as $item) {
            if ($item['id'] == $id) {
                return $item;
            }
        }
        return null;
    }

    public function removeItemById($id) {}

    public function create($item) {
        array_push($_SESSION[$this->model],$item);
    }

    public function getAll() {
        return $_SESSION[$this->model];
    }

    public function updateItemById($id) {}

    public function reset() {}
}
