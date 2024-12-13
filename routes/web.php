<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index', [
        'tasks' => \App\Models\Task::latest()->get()
    ]);
})->name('tasks.index'); // Index is used for returning a list of tasks.

Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => \App\Models\Task::findOrFail($id)]);
})->name('tasks.show'); // show is used for returning a single task.

// Route::get('/hello', function () {
//     return 'Hello';
// })->name('hello');

// Route::get('/hallo', function () {
//     return redirect('/hello')->route('hello');
// });

// Route::get('/greet/{name}', function ($name) {
//     return 'Hello ' . $name . '!';
// });

Route::fallback(function () {
    return 'Still got somewhere!';
});

// GET - Read data, fetch documents/sites.
// POST - Store new data (e.g. forms).
// PUT - To modify existing data.
// DELETE - Delete data.
