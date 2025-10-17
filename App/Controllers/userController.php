<?php

use App\Core\Controller;
use App\Models\User;

class userController extends Controller
{

    public function index() {
        //Carrega la vista del login
        $this->render('user/login');
        
    }

    public function register() {
        //carrega la vista del registre
    }

    public function profile() {
        //carrega la vista del perfil d'usuari
        //es una ruta protegia, cal fer servir funcions de Controller


    }

    public function logout() {
        //Fa la lògica del logout
        //es una ruta protegia, cal fer servir funcions de Controller

    }

    public function store(){
        //crea el nou usuari
        //si hi ha errors, per exemple que el usuari ja existeix redirigeix a
        //la vista del registe amb els errors
    }

    public function login(){
        //fa la logica del login
        //si hi ha erros els mostra a la vista del login
        //si el login te exit redirigeix al productController amb
        //header('Location: .....')
    }

    public function edit(){
        //fa la logica d'editar el perfil d'usuari
        //es una ruta protegia, cal fer servir funcions de Controller
    }


}
