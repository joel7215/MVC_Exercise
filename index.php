<?php
if(!isset($_SESSION)) {
    session_start();
}

echo __DIR__;
define("DIR_APP",__DIR__);
echo "<br> ruta costant: ".DIR_APP;

include('./App/data.php');
include('autoload.php');


use App\Router;

$myRouter = new Router();
$myRouter->run();