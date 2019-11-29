<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RenewalCode extends Model
{
    protected $fillable = [
        'status',
    ];

    //table Name
    protected $table = 'renewal_codes';
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
