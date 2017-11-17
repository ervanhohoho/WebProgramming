<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model
{
    //
	public $table = 'brand';
	public $timestamps = false;
	protected $primaryKey = 'brandId';
}
