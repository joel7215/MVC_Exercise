<?php

use App\Core\Controller;
use App\Models\User;
use App\Models\Orm;

class userController extends Controller
{

    public function index() {
        //Carrega la vista del login
        $params["title"]="Login";
        $this->render('user/login',$params);
    }

    public function register() {
        //carrega la vista del registre
        $params["title"]="register";
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

        if($_SERVER["REQUEST_METHOD"]==="POST"){
            if(isset($_POST)){
                $username=$_POST["username"];
                $pass1=$_POST["pass1"];
                $pass2=$_POST["pass2"];
                $mail=$_POST["mail"];

                $user=new User;
                if($user->usernameExist($username)){
                    $params["error"]="El nom d'usuari ja existeix";
                    $this->render("/user/register",$params);
                }

                //falten les comprovacions de password, mail....
                //faltar un metode per obtenir el id nou usuari

                $newUser=
                [
                    'id' => 0, //cal afegir la funcio per obtenir el id
                    'username' => $username,
                    'password' => $pass1,
                    'mail' => $mail,
                    'admin' => false
                ];

                $user->create($newUser);
                $this->index();
            }
        }

        // if($_POST["pass1"]!=$_POST["pass2"]){
        //     $this->render("user/register",["error"=>1]);exit;
        // }
        // $user=new User;
        // foreach($user->getAll() as $u){
        //     if($u["username"]==$_POST["username"]){
        //         $this->render("user/register",["error"=>1]);exit;
        //     }
        // }
        // $data=[
        //     "id"=>count($user->getAll()),
        //     "username"=>$_POST["username"],
        //     "password"=>$_POST["pass1"],
        //     "mail"=>$_POST["mail"],
        //     "admin"=>false,
        // ];
        // $user->create($data);
        // $this->render("user/register",["success"=>1]);
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
                    header("Location: /product");exit;
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
