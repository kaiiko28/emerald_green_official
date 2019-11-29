<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TableOfExit extends Model
{
   //table Name
   protected $table = 'tableofexit';
   // Primary key
   public $primarykey = 'id';

   //Timestamps
   public $timestamps = true;

   protected $fillable = [
    'current_table_id','current_table','current_table_earning',
    ];

   public function user() {
       return $this->belongsTo('App\User');
   }
}
