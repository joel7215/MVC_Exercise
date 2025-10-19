<?php

use App\Core\Controller;
use App\Models\User;
use App\Models\Orm;

class userController extends Controller
{

    public function index() {
        //Carrega la vista del login
        $this->render('user/login');
    }

    public function register() {
        //carrega la vista del registre
        $this->render("user/register");
    }

    public function profile() {
        //carrega la vista del perfil d'usuari
        //es una ruta protegia, cal fer servir funcions de Controller
        $this->render("user/profile");

    }

    public function logout() {
        //Fa la lògica del logout
        //es una ruta protegia, cal fer servir funcions de Controller
        
    }

    public function store(){
        //crea el nou usuari
        //si hi ha errors, per exemple que el usuari ja existeix redirigeix a
        //la vista del registe amb els errors
        if($_POST["pass1"]!=$_POST["pass2"]){
            $this->render("user/register",["error"=>1]);exit;
        }
        $user=new User;
        foreach($user->getAll() as $u){
            if($u["username"]==$_POST["username"]){
                $this->render("user/register",["error"=>1]);exit;
            }
        }
        $data=[
            "id"=>count($user->getAll()),
            "username"=>$_POST["username"],
            "password"=>$_POST["pass1"],
            "mail"=>$_POST["mail"],
            "admin"=>false,
        ];
        $user->create($data);
        $this->render("user/register",["success"=>1]);
    }

    public function login(){
        //fa la logica del login
        //si hi ha erros els mostra a la vista del login
        //si el login te exit redirigeix al productController amb
        //header('Location: .....')
        $user=new User;
        foreach($user->getAll() as $u){
            if($u["username"]==$_POST["username"]){
                if($u["password"]==$_POST["password"]){
                    $this->render("user/product");exit;
                    // header("Location: ../../Controllers/productController.php");exit;
                }
            }
        }
        $this->render("user/login",["error"=>1]);
    }

    public function edit(){
        //fa la logica d'editar el perfil d'usuari
        //es una ruta protegia, cal fer servir funcions de Controller
    }


}
