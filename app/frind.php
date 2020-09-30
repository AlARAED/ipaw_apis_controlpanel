<?php

namespace App;
use User;

use Illuminate\Database\Eloquent\Model;

class frind extends Model
{

    protected $guarded = array();
   public function friend()
{
    return $this->belongsTo(User::class, 'id', 'user_id');
}

/**
 * A user friends are connected to
 */
public function user()
{
    return $this->belongsTo(User::class, 'id', 'friend_id');
}


}