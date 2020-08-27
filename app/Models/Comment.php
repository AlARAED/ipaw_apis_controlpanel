<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
         protected $guarded = array();


          public function Challenges()
    {
        return $this->belongsTo(' App\Models\Challenging');
    } 

         public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }



          public function CommentShare()
    {
        return $this->hasMany('App\CommentShare');
    }

}
