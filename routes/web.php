<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'name'=> 'Tom'
    ]);
});

Route::get('/hello', function () {
    return 'Hello';
})->name('hello');

Route::get('/hallo', function () {
    return redirect('/hello')->route('hello');
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello ' . $name . '!';
});

Route::fallback(function () {
    return 'Still got somewhere!';
});

// GET - Read data, fetch documents/sites.
// POST - Store new data (e.g. forms).
// PUT - To modify existing data.
// DELETE - Delete data.
