<?php
$users = [
    [
        'id'=>0,
        'username'=>'admin',
        'password'=>'123',
        'mail'=>'mail@mail.es',
        'admin'=>true
    ],
    [
        'id'=>1,
        'username'=>'raquel',
        'password'=>'123',
        'mail'=>'mail@mail.es',
        'admin'=>false
    ]
];

if(!isset($_SESSION['users'])) $_SESSION['users'] = $users;