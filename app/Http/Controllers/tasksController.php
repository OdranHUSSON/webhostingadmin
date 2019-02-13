<?php

namespace App\Http\Controllers;

use App\tasks;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    public function fetch() {
        $tasks = tasks::all();
        return response()->json($tasks);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function persist(Request $request) {
        /** @var Validator $validator */
        $validator = $request->validate([
            'id' => 'nullable|int',
            'name' => 'required|max:255',
            'description' => 'max:1024',
        ]);

        if(isset($validator['id'])) {
            $task = tasks::findOrNew($validator['id']);
            $task->id = $validator["id"];
        }
        else {
            $task = new tasks();
        }
        $task->name = $validator["name"];
        $task->description = $validator["description"];
        $task->save();

        return response()->json($task);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function delete(Request $request) {
        /** @var Validator $validator */
        $validator = $request->validate([
            'id' => 'required|int',
        ]);

        try {
            /** @var tasks $task */
            $task = tasks::findOrFail($validator['id']);
            $task->delete();

            return response()->json($task);
        }
        catch(ModelNotFoundException $exception) {
            $errorMessage = [
                "message" => "The given data was invalid.",
                "errors" => [
                "id" => "Task not found."
              ]
            ];

            return response()->json($errorMessage,404 );
        }
    }
}
