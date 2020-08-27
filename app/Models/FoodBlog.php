<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\CommentsFood;

class FoodBlog extends Model
{
   use SoftDeletes;
    protected $guarded = array();

          public function CommentsFood()
    {
        return $this->hasMany('App\Models\CommentsFood');
    }


    
}
