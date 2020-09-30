<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens; 

use App\Models\MyAnimal;

class User extends Authenticatable

{
    use Notifiable,HasApiTokens,SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'name', 'email', 'password',  'user' ,  'tel', 'statusValue',   'countryName',
           'image' ,'about' , 'fcm_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


public function comments()
    {
        return $this->hasMany(Comment::class);
    }
  public function animals()
    {
        return $this->hasMany(MyAnimal::class);
    }
    public function AauthAcessToken(){
    return $this->hasMany('\App\OauthAccessToken');
}

public function friends()
{
    return $this->belongsToMany(User::class, 'frinds', 'user_id', 'friend_id');
}
}
