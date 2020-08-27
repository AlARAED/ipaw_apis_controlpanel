<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User ;

class TrainingVedio extends Model
{
   
    use SoftDeletes;
    protected $guarded = array();



     public function userName(){
     	return User::where('id',$this->user_id)->first();
     }

}
