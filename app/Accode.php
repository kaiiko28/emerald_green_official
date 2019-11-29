<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accode extends Model
{

    protected $fillable = [
        'status',
    ];

    //table Name
    protected $table = 'accodes';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;


    
    public function user() {
    	return $this->belongsTo('App\User', 'email');
    }

    public function accode() {
    	return $this->belongsTo('App\Accode');
    }
}
