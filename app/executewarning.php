<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class executewarning extends Model
{

 use SoftDeletes;

    protected $guarded = array();

    protected $with= ['cares'];

           public function Cares()
    {
        return $this->belongsTo('App\Models\Care');
    }
}
