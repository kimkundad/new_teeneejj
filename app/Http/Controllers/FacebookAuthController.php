<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class FacebookAuthController extends Controller
{
  /**
 * Create a redirect method to facebook api.
 *
 * @return void
 */
  public function redirect()
  {
      return Socialite::driver('facebook')->redirect();
  }

  /**
   * Return a callback method from facebook api.
   *
   * @return callback URL from facebook
   */
  public function callback(SocialAccountService $service)
  {
    $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
      auth()->login($user);
      return redirect()->to('/');
  }
}
