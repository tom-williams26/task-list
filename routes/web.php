<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index'); // Index is used for returning a list of tasks.

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit'); // show is used for returning a single task.

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show'); // show is used for returning a single task.

Route::post('/tasks', function (TaskRequest $request) {

    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', [
        'task' => $task->id
        ])
        ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('tasks.show', [
        'task' => $task->id
        ])
        ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success', 'Task deleted successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (task $task) {
    $task->completed = !$task->completed;
    $task->save();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-complete');

Route::fallback(function () {
    return 'Still got somewhere!';
});

// GET - Read data, fetch documents/sites.
// POST - Store new data (e.g. forms).
// PUT - To modify existing data.
// DELETE - Delete data.
