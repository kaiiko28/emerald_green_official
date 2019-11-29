<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wallet extends Model
{
    //table Name
    protected $table = 'wallets';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;


    public function user() {
    	return $this->belongsTo('App\User');
    }
}
