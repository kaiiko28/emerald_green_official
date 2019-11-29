<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requestpayout extends Model
{
    //table Name
    protected $table = 'requestpayouts';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;


    
    public function user() {
    	return $this->belongsTo('App\User');
    }

    
}
