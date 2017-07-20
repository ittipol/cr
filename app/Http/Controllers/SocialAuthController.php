<?php

namespace App\Http\Controllers;

use App\library\service;
use App\library\token;
// use Auth;
use Hash;
use Socialite;
// use Redirect;

class SocialAuthController extends Controller
{
  public function redirect()
  {
    // return Socialite::driver('facebook')->redirect();
    return Socialite::with('facebook')->scopes(['email', 'public_profile', 'publish_actions'])->redirect();
  }   

  public function callback()
  {
    // when facebook call us a with token
    $provider = Socialite::with('facebook');
    $social = $provider->user();

    $user = Service::loadModel('User')->where([
      ['social_provider_id','=',1],
      ['social_user_id','=',$social->getId()],
    ])->first();

    if(empty($user)) {

      $user = Service::loadModel('User');
      $user->social_provider_id = 1;
      $user->social_user_id = $social->getId();

      if(!empty($social->getEmail())) {
        $user->email = $social->getEmail();
      }

      $user->password = Hash::make(Token::generateSecureKey(6));
      $user->name = $social->getName();

      $user->save();

    }

    auth()->login($user);

    return redirect()->intended('/');

    // Auth::login($user,true);

    // return Redirect::intended('/');

  }

  // private function checkExistUserByEmail($email){
  //   $user = Service::loadModel('User')->where('email','=',$email)->first();
  //   return $user;
  // }
   
  // private function checkExistUserByFacebookId($facebook_id){
  //   $user = Service::loadModel('User')->where('social_user_id','=',$facebook_id)->first();
  //   return $user;
  // }
}
