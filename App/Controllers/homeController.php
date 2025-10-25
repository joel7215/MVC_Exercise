<?php

use App\Core\Controller;
use App\Models\User;


class homeController extends Controller
{

    public function index()
    {
        //carrega la vista principal de l'aplicacio
        $params['title'] = 'HomeApp';


        $u = new User();
        //comprova si s'ha creat la variable de sessio d'usuaris
        if (!$u->sessionCreated()) $this->loadUserData();

        $this->render('/home/index');
    }

    public function loadUserData()
    {
        //Carrega dades d'usuari dins l'aplicacio
        $user = [
            'id' => 0,
            'username' => 'admin',
            'password' => '123',
            'mail' => 'mail@mail.es',
            'admin' => true
        ];
        $u = new User;
        $u->create($user);

        $user = [
            'id' => 1,
            'username' => 'raquel',
            'password' => '123',
            'mail' => 'mail@mail.es',
            'admin' => false
        ];
        $u = new User;
        $u->create($user);
    }
}
