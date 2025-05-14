<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::all();
    return view('index', compact('tasks'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    Task::create($request->all());
    return redirect('/');
}

public function edit(Task $task)
{
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $task->update($request->all());
    return redirect('/');
}

public function destroy(Task $task)
{
    $task->delete();
    return redirect('/');
}

}
