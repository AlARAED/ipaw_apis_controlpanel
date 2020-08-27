<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User ;


class CommentChainAnimal extends Model
{
    use SoftDeletes;
    protected $guarded = array();



          public function chainanimal()
    {
        return $this->belongsTo('App\Models\ChainAnimal');
    } 


    
       public function userName(){
     	return User::where('id',$this->user_id)->first();
     }
}
