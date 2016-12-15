<?php
// app/controllers/TasksController.php

class TasksController extends BaseController
{
    // public function index()
    // {
    //     // Show a listing of tasks.
    //     $tasks = Task::all();

    //     return View::make('task_index', compact('tasks'));
    // }

    public function create()
    {
        // Show the create task form.
        return View::make('task_create');
    }

    public function handleCreate()
    {
        // Handle create form submission.
        $task = new Task;
        $task->name        = Input::get('name');
        $task->created_at = new Carbon();
        $task->complete     = Input::has('complete');
        $task->save();

        return Redirect::action('TasksController@index');
    }

    public function edit(Task $task)
    {
        // // Show the edit task form.
        return View::make('task_edit', compact('task'));
    }

    public function handleEdit()
    {
        // Handle edit form submission.
        $task = Task::findOrFail(Input::get('id'));
        $task->name        = Input::get('name');
        $task->complete     = Input::has('complete');
        $task->save();

        return Redirect::action('TasksController@index');
    }

    public function delete(Task $task)
    {
        // Show delete confirmation page.
        return View::make('task_delete', compact('Task'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
        $id = Input::get('task');
        $task = Task::findOrFail($id);
        $task->delete();

        return Redirect::action('TasksController@index');
    }
}
