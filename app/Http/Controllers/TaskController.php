<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $tasks = Task::all();

    return view('tasks.index', compact('tasks'));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('tasks.create');
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'task_name' => 'required|max:255',
        'description' => 'nullable',
        'status' => 'required|in:Pending,Completed',
        'due_date' => 'nullable|date',
    ]);

    Task::create([
        'task_name' => $request->task_name,
        'description' => $request->description,
        'status' => $request->status,
        'due_date' => $request->due_date,
    ]);

    return redirect()->route('tasks.index')
        ->with('success', 'Task added successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $task = Task::findOrFail($id);

    return view('tasks.edit', compact('task'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'task_name' => 'required',
        'description' => 'nullable',
        'status' => 'required',
        'due_date' => 'nullable|date',
    ]);

    $task = Task::findOrFail($id);

    $task->task_name = $request->task_name;
    $task->description = $request->description;
    $task->status = $request->status;
    $task->due_date = $request->due_date;

    $task->save();

    return redirect()->route('tasks.index')
                     ->with('success', 'Task updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $task = Task::findOrFail($id);

    $task->delete();

    return redirect()->route('tasks.index')
                     ->with('success', 'Task deleted successfully!');
}
}
