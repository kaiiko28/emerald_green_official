<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table Name
    protected $table = 'posts';
    // Primary key
    public $primarykey = 'id';

    //Timestamps
    public $timestamps = true;
}
