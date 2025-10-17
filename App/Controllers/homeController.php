<?php


use App\Core\Controller;
use App\Models\User;


class homeController extends Controller
{

    public function index()
    {
        //carrega la vista principal de l'aplicacio
        $params['title']='home';
        $params['nom']='toni';
        $this->render('/home/index',$params);
        
       
    }
}
