<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentShare extends Model
{
    use SoftDeletes;

    protected $guarded = array();

        public function Challenges()
    {
        return $this->belongsTo(' App\Models\Comment');
    } 

}
