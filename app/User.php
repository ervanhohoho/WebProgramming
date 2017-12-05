<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
    public $table = 'users';
    public $timestamps = false;
    protected $primaryKey = 'userId';
}
