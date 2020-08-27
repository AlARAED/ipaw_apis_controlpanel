<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ChainAnimal extends Model
{
   use SoftDeletes;
    protected $guarded = array();


           public function Commentschain()
    {
        return $this->hasMany('App\Models\CommentChainAnimal');
    }
}
