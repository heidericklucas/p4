<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Auth;
use Redirect;

class UserLoginController extends Controller
{

  public function postLogin()
  {
    $credentials = Input::only('email', 'password');
    if (Auth::attempt($credentials, $remember = true)) {
        return Redirect::intended('/')
            ->with('flash_message', 'Welcome Back!');
    }
    else {
        return Redirect::to('/login')
            ->with('flash_message', 'Log in failed; please try again.');
    }
    return Redirect::to('login');
  }
}
