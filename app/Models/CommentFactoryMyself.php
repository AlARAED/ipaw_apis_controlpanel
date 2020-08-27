<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
    use App\User ;



class CommentFactoryMyself extends Model
{


	    protected $guarded = array();

     public function FactoryMyself()
    {
        return $this->belongsTo('App\Models\FactoryMyself');
    } 


    
       public function userName(){
     	return User::where('id',$this->user_id)->first();
}
}