<?php


use App\Core\Controller;
use App\Models\User;


class homeController extends Controller
{

    public function index()
    {
        //carrega la vista principal de l'aplicacio
        $params['title'] = 'HomeApp';
        $params['id'] = 0;

        $u = new User();
        if (!$u->sessionCreated()) $this->loadUserData();
        $params['users'] = $u->getAll();
        $this->render('/home/index', $params);
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
