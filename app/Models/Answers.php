<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User ;

class Answers extends Model
{
    
          public function Question()
    {
        return $this->belongsTo('App\Models\Question');
    } 


       public function userName(){
     	return User::where('id',$this->user_id)->first();
     }

}
