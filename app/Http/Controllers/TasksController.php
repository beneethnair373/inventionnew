<?php

namespace App\Http\Controllers;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

	public function index()
	{
		$tasks= Task::all();
		return view('welcome', compact('tasks'));
	}

    public function store()
    {
    	    $task = new Task;
    		$task->name = request()->name;
    		$task->quantity = request()->quantity;
    		$task->category = request()->category;
    		$task->save();
         
        return $task;
    }    
    public function delete()
    {
        // $delete=
    }
}
