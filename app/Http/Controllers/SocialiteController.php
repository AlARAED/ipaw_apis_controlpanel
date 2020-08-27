<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Socialite;

 
class SocialiteController extends Controller
{
  protected $stateless = false;

     public function redirect($service)
    {

        return Socialite::driver($service)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($service)
    {
        $user = Socialite::with($service)->stateless()->user();

    //      if(User::where('email', '=', $money->email)->first()){
    // $checkUser = User::where('email', '=', $money->email)->first();
    // Auth::login($checkUser);
    // return redirect('home');
    //  } 

    // $user->facebook_id = $money->getId();
    // $user->name = $money->getName();
    // $user->email = $money->getEmail();
    // $user->avatar = $money->getAvatar();
    // $user->save();

    // Auth::login($user);
    // return redirect('home');

    
    }
}
