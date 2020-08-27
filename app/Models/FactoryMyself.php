<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CommentFactoryMyself;

class FactoryMyself extends Model
{

   use SoftDeletes;
            protected $guarded = array();


          public function Commentsfactory()
    {
        return $this->hasMany('App\Models\CommentFactoryMyself');
    }

}
