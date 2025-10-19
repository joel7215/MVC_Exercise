<?php

use App\Core\Controller;

class errorController extends Controller  {

    public function index() {
        //carrega la vista del error
        $this->render("error/error");
    }
}