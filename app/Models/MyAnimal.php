<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;
use App\User ;



class MyAnimal extends Model
{
    use SoftDeletes;
    protected $guarded = array();


     public function CatName(){
     	return Category::where('id',$this->category_id)->first();
     }

     public function users()
     {
         return $this->belongsTo(' App\User');
     }
     public function userName(){
     	return User::where('id',$this->user_id)->first();
     }


}
