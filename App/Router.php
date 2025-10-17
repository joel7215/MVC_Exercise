<?php

namespace App;

class Router
{

    private $controller;
    private $method;
    private $params = [];

    public function __construct()
    {
        $this->matchRoute();
    }

    public function matchRoute()
    {
        //divideix la url per les "/"
        $url_array = explode('/', $_SERVER['REQUEST_URI']);

        //comprova si hem passat una valor a la url i sino dirigeix al home
        if (!empty($url_array[1])) {
            $this->controller = $url_array[1];
        } else {
            $this->controller = 'home';
        }

        //Creem la ruta del controlador
        $this->controller = $this->controller . "Controller";
        $controllerPath = "App/Controllers/" . $this->controller . ".php";
        //comprovem si existeix i sino mostrem error 404
        if (!file_exists($controllerPath)) {
            $this->controller = 'error';
            $this->controller = $this->controller . "Controller";
            $controllerPath = "App/Controllers/" . $this->controller . ".php";
        }

        require_once($controllerPath);


        if (isset($url_array[2])) {
            //si tenim una segon valor a la url inicialitzem metode
            $this->method = !empty($url_array[2]) ? $url_array[2] : 'index';
        } else {
            $this->method = 'index';
        }

        // $this->method = !empty($url_array[2]) ? $url_array[2] : 'index';

        $numPramas = count($url_array);
        if ($numPramas > 3) {
            for ($i = 3; $i < $numPramas; $i++) {
                $this->params[$i - 3] = $url_array[$i];
            }
        }

        // echo "<pre>";
        // print_r($this->params);
        // echo "</pre>";

    }

    public function run()
    {
        $controller = $this->controller;
        $method = $this->method;


        $c = new $controller;
        if (isset($this->params)) {
            $c->$method($this->params);
        } else {
            $c->$method();
        }
    }
}
