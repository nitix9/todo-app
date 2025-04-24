<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class TodoController extends Controller
{
    //
    public function index()
    {
        $tasks= Task::all();
        return view('todo', ['tasks' => $tasks]);
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);
        Task::create([
            'title' => $request->title
        ]);

        return redirect()->route('todo')->with('success', 'Task created successfully.');
    }
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('todo')->with('success', 'Task deleted successfully.');
    }
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->completed = !$task->completed;
        $task->save();

        return redirect()->route('todo')->with('success', 'Task status updated successfully.');
    }
    public function updateTitle(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:60'
        ]);
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->save();

        return redirect()->route('todo')->with('success', 'Task title updated successfully.');
    }
}
