<?php
use \App\Models\User;

$user=new User;
echo "<pre>";
print_r($user->getAll());
echo "</pre>";