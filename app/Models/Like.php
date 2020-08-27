<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
             protected $guarded = array();


 public function comments()
    {
        return $this->belongsTo(' App\Models\Comment');
    } 


}
