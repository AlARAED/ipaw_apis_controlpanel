<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User ;


class LostAnimal extends Model
{
        protected $guarded = array();




     public function userName(){
     	return User::where('id',$this->user_id)->first();
     }
}
