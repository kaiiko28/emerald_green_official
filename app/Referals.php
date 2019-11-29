<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referals extends Model
{
	protected $table = 'referals';
    protected $fillable = [
    	'name', 'Referer_code', 'MyRef_code', 'reward',
    ];


    public function user() {
    	return $this->belongsTo('App\User');
    }
}
