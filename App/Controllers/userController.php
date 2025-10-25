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
        $user=new User;
        if($this->userLogged($user->getUserLogged())){
            $this->render("user/profile");exit;
        }
        $this->render("user/index");exit;
    }

    public function logout() {
        //Fa la lògica del logout
        //es una ruta protegia, cal fer servir funcions de Controller
        $user=new User;
        if($this->userLogged($user->getUserLogged())){
            $user=new User;
            $user->userDeslogged();
            $this->render("home/index");exit;
        }
        $this->render("home/index");exit;
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
                    exit;
                }

                if($pass1!=$pass2){
                    // $params["error"]="Les contrasenyes no coinsideixen";
                    // $this->render("/user/register/",$params);
                    $params["error"]="Les contrasenyes no coinsideixen";
                    $this->render("/user/register",$params);
                    exit;
                }

                //falten les comprovacions de password, mail....
                //faltar un metode per obtenir el id nou usuari

                $newUser=
                [
                    'id' => count($user->getAll()), //cal afegir la funcio per obtenir el id
                    'username' => $username,
                    'password' => $pass1,
                    'mail' => $mail,
                    'admin' => false
                ];

                $user->create($newUser);
                $this->index();
            }
        }
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
                    $user->setUserLogged($u);
                    $params["title"]="site";
                    $userList=$user->getAll();
                    $params["users"]=$userList;
                    $this->render("user/product",$params,"site");exit;
                    header("Location: /product");exit;
                }
            }
        }
        $this->render("user/login",["error"=>1]);
    }

    public function edit(){
        //fa la logica d'editar el perfil d'usuari
        //es una ruta protegia, cal fer servir funcions de Controller
        $user=new User;
        $userLogged=$user->getUserLogged();
        if(!$this->userLogged($userLogged)){
            $params["error"]="El usuari no esta loggejat";
            $this->render("/user/profile",$params,"site");
            exit;
        }

        if($user->usernameExist($_POST["username"])
        && $userLogged["username"]!=$_POST["username"]){
            $params["error"]="El nom d'usuari ja existeix";
            $this->render("/user/profile",$params,"site");
            exit;
        }

        if($_POST["pass1"]!=$_POST["pass2"]){
            // $params["error"]="Les contrasenyes no coinsideixen";
            // $this->render("/user/register/",$params);
            $params["error"]="Les contrasenyes no coinsideixen";
            $this->render("/user/profile",$params,"site");
            exit;
        }
        
        $editUser=
        [
            'id' => $user->getUserLogged()["id"], //cal afegir la funcio per obtenir el id
            'username' => $_POST["username"],
            'password' => $_POST["pass1"],
            'mail' => $_POST["mail"],
            'admin' => false
        ];

        $user->modify($editUser);
        $user->setUserLogged($editUser);
        $params["title"]="Productes";
        $this->render("user/product",$params,"site");
    }


}
