<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Validator;
use Auth;
use Redirect;

class TaskEditController extends Controller
{

  public function postEdit()
  {
    $data = Input::all();
    //Validation constraints
    $rules = array(
        'name' => 'required'
    );

    // Validator instance.
    $validator = Validator::make($data, $rules);

    // Fails conditional
    if ($validator->fails()) {
    return Redirect::to('/incomplete')
    ->with('flash_message', 'Edit failed. Tasks must be indexed by complete name.');
    }

    // SUCCESS!
    $task = Task::findOrFail(Input::get('id'));
    $task->fill(Input::all());
    $task->complete     = Input::has('complete');
    if (Input::has('complete')){
    $task->completed_at_time = new Carbon('America/Chicago');
    };
    $task->save();
    return Redirect::to('/all');
}
