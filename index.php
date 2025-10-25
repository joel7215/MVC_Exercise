<?php
if(!isset($_SESSION)) {
    session_start();
}
include('./App/data.php');
include('autoload.php');


use App\Router;

$myRouter = new Router();
$myRouter->run();