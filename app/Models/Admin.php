<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Authenticatable

{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password',  'image' ,  'emailsite','aboutsite','Watsapp','aboutsite_ar',
'aboutsite_en','imagepolicy','policy_ar','policy_en',
'imageabout',

    ];

    
    
}
