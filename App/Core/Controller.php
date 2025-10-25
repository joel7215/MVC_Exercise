<?php 

namespace App\Core;

use \App\Models\User;

class Controller{

    protected function render($path, $params = [], $layout ="main"){
        ob_start();
        require_once(__DIR__ . "/../Views/" . $path . ".view.php");
        $params['content'] = ob_get_clean();
        require_once(__DIR__ . "/../Views/layouts/" . $layout . ".layout.php");
    }

    protected function userLogged($user){
        //retorna True si l'usuari esta logejat
        //cal fer servir el model user
        $userLogged=new User;
        if($userLogged->isUserLogged()){
            return $userLogged->getUserLogged()["id"]==$user["id"];
        }
        return false;
    }

    protected function adminLogged() {
        //retorna True si el admin esta logejat
        //cal fer servir el model user
    }
}


?>