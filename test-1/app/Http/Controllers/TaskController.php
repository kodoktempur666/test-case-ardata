<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'assigned_to' => 'required|exists:employees,id',
            'due_date' => 'required|date',
            'status' => 'required|string|in:done,pending,on progres',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'title' => $request->title,
            'assigned_to' => $request->assigned_to,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit(Task $task)
    {
        $employees = Employee::all();
        return view('tasks.edit', compact('task', 'employees'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'assigned_to' => 'required|exists:employees,id',
            'due_date' => 'required|date',
            'status' => 'required|string|in:done,pending,on progres',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title' => $request->title,
            'assigned_to' => $request->assigned_to,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }

    public function updateStatus(Task $task, $status)
    {
        if (!in_array($status, ['done', 'pending'])) {
            return redirect()->back()->with('error', 'Status tidak valid.');
        }

        $task->status = $status;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Status tugas berhasil diubah ke ' . ucfirst($status));
    }

}
