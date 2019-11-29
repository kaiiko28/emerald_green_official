<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{

    //table Name
    protected $table = 'orders';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;

}
