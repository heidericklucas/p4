<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Auth;
use Redirect;

class UserRegController extends Controller
{

    public function store()
    {

          $data = Input::all();

          // Validation constraints.
          $rules = array(
          'email' => 'required|email|unique:users,email',
          'password' => 'required|min:6'
          );

          // Validator instance.
          $validator = Validator::make($data, $rules);

          // If fails
          if ($validator->fails()) {
          return Redirect::to('/signup')
          ->with('flash_message', 'Sign up failed; please fix the errors listed below.')
          ->withInput()
          ->withErrors($validator);
          }

          // SUCCESS


          $user = new User;
          $user->email    = Input::get('email');
          $user->password = Input::get('password');

          # Try to add the user
          try {
              $user->save();
              }
          # Fail
          catch (Exception $e) {
          return Redirect::to('/signup')
          ->with('flash_message', 'Sign up failed; please try again.')->withInput();
                              }




          # Login
          Auth::login($user);
          return Redirect::to('/all')
          ->with('flash_message', 'Welcome!');

    }
}
