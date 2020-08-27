<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User ;
use Illuminate\Database\Eloquent\SoftDeletes;


class CommentsFood extends Model
{
      use SoftDeletes;
    protected $guarded = array();
    
          public function FoodBlog()
    {
        return $this->belongsTo('App\Models\FoodBlog');
    } 


    
       public function userName(){
     	return User::where('id',$this->user_id)->first();
     }
}
