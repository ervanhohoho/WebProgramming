<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailTransaction extends Model
{
    //
    protected $table = 'detailTransactions';
    protected $primaryKey = 'detailTransactionId';
    public $incrementing = false;
    public $timestamps = false;
}
