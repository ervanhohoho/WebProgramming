<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $tablename = 'carts';
    public $primaryKey = 'cartId';
    public $incrementing = false;
    public $timestamps = false;
}
