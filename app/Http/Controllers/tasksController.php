<?php

namespace App\Http\Controllers;

use App\tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function retrieveTasks() {
        $tasks = tasks::all();
        return response()->json($tasks);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function createTasks(Request $request) {
        try {
            $input = $request->input('task');
            $validatedData = $request->validate([
                'id' => 'required',
                'name' => 'required|max:255',
                'description' => 'max:1024'
            ]);
            $collection = (array)json_decode($validatedData);
            $collection = tasks::hydrate($collection);
            $task = $collection->first();
            $task->save();
            return response()->json($task);
        }catch (Exception $e) {
            return response()->json($e);
        }
    }
}
