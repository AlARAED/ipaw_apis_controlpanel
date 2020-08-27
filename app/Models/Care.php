<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Care extends Model
{
     protected $guarded = array();

     public function CatName(){
     	return Category::where('id',$this->category_id)->first();
     }


          public function executewarning()
    {
        return $this->hasMany('App\executewarning');
    } 
}
