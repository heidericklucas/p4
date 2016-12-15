<?php

class TaskController extends \BaseController {

	/**
	*
	*/
	// public function __construct() {

	// 	# Make sure BaseController construct gets called
	// 	parent::__construct();

	// 	// # Only logged in users are allowed here
	// 	// $this->beforeFilter('auth');

	// }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Show a listing of tasks.
		$tasks = Task::all();

        // return View::make('task_index', compact('tasks'));
        return View::make('task_index')->with('task',$tasks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        // Show the create task form.
        return View::make('task_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		 // Handle create form submission.
        $task = new Task;
        $task->name        = Input::get('name');
        $task->complete     = Input::has('complete'); // not on tag controller.  needed?
        $task->save();

        return Redirect::action('TasksController@index')->with('flash_message','Your tag been added.');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
				// Show a listing of tasks. - not right need to look at foobooks for guidance
				// $tasks = Task::all();
  				// return View::make('index', compact('tasks'));

		try {
			$task = Task::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/task')->with('flash_message', 'Task not found');
		}
		return View::make('task_show')->with('task', $task); //need to make task_show
	}




	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

		        // Show the edit task form.  edit(Task $task)
        		// return View::make('edit', compact('task'));
		try {
			$task = Task::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/task')->with('flash_message', 'Task not found');
		}
		# Pass with the $task object so we can do model binding on the form
		return View::make('task_edit')->with('task', $task);



	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Handle edit form submission.
        // $task = Task::findOrFail(Input::get('id'));
        // $task->name        = Input::get('name');
        // $task->complete     = Input::has('complete');
        // $task->save();

        // return Redirect::action('TasksController@index');

        		try {
			$task = Task::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/task')->with('flash_message', 'Task not found');
		}
		$task->name = Input::get('name');
		$task->complete     = Input::has('complete'); //from codebright - needed?
		$task->save();
		return Redirect::action('TaskController@index')->with('flash_message','Your task has been saved.');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete(Task $task)
		// return View::make('delete', compact('Task'));

				try {
			$tag = Tag::findOrFail($id);
		}
		catch(Exception $e) {
			return Redirect::to('/task')->with('flash_message', 'Task not found');
		}
		# Note there's a `deleting` Model event which makes sure book_tag entries are also destroyed
		# See Tag.php for more details
		Task::destroy($id);
		return Redirect::action('TaskController@index')->with('flash_message','Your task has been deleted.');

	}


}
