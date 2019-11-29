<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //table Name
    protected $table = 'products';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;


    public function admin() {
    	return $this->belongsTo('App\Admin');
    }
}
