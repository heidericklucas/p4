<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Auth;
use Redirect;
use Carbon\Carbon;

class UserLoginController extends Controller
{

  public function handleCreate()
  {


       $data = Input::all();

        //Validation constraints.
        $rules = array(
        'name' => 'required'
        );
        //New validator
        $validator = Validator::make($data, $rules);

        //If fails
        if ($validator->fails()) {
        return Redirect::to('/create')
        ->with('flash_message', 'Edit failed. Tasks must be indexed by complete name.')
        ->withInput();
        }


        // SUCCESS
        $task = new Task();
        $task->name        = Input::get('name');
        $task->complete     = Input::has('complete');
        if (Input::has('complete')){
        $task->completed_at_time = new Carbon('America/Chicago');
        };
        $task->save();
        return Redirect::to('/incomplete');
}
