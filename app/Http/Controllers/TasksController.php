<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TasksController extends Controller
{
    public function index()
    {

        $tasks = Tasks::all();

        return view('tasks')->with(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description' => 'required|max:255',
        ]);

        $task = new Tasks;
        $task->description = $request->input('description');
        $task->save();

        var_dump($task);

        return redirect('/');
    }

    public function update($id)
    {
        $task = Tasks::findOrFail($id);
        $task->update(['completed' => 1]);
        
        return redirect('/');
    }

    public function destroy($id)
    {
        $task = Tasks::findOrFail($id);
        $task->delete();

        return redirect('/');
    }


}
