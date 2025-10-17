<?php

namespace App\Models;

use App\Models\Orm;

class User extends Orm
{

    public function __construct() {
        parent::__construct('users');

    }
}
