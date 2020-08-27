<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\Challenging;



class Challenging extends Model
{
         protected $guarded = [];
 

          public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}
