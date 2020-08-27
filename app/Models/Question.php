<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Answers;
use App\User ;



use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
      use SoftDeletes;
    protected $guarded = array();



          public function answers()
    {
        return $this->hasMany('App\Models\Answers');
    }

    public function userName(){
     	return User::where('id',$this->user_id)->first();
     }
}
