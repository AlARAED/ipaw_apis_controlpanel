<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class executewarning extends Model
{

 use SoftDeletes;

    protected $guarded = array();



           public function cares()
    {
        return $this->belongsTo('App\Models\Care','care_id');
    }
}
