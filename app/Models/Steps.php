<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Steps extends Model
{

  use SoftDeletes;
    protected $guarded = array();

          public function training()
    {
        return $this->belongsTo('App\Models\Training');
    } 
}
