<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCaptcha extends Model
{
    
    //table Name
    protected $table = 'user_captchas';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;


    public function user() {
    	return $this->belongsTo('App\User');
    }
}
