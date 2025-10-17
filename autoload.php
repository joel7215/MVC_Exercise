<?php
//aquesta funcio es crida quan instanciem una classe ja sigui amb el new amb el extends....
spl_autoload_register(function ($class) {
    // echo __DIR__ . "<br>";
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    // echo $path;
    if (file_exists($path)) {
        require_once $path;
    }
});