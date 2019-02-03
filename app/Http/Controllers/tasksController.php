<?php

namespace App\Http\Controllers;

use App\tasks;
use Illuminate\Http\Request;

class tasksController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = tasks::all();
        return view('tasks')
            ->with("tasks", $tasks);
    }
}
