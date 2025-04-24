<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/tasks', [TodoController::class, 'index'])->name('todo');
Route::get('/tasks/create', [TodoController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{id}', [TodoController::class, 'delete'])->name('tasks.delete');
Route::put('/tasks/{id}', [TodoController::class, 'update'])->name('tasks.update');
Route::put('/tasks/title/{id}', [TodoController::class, 'updateTitle'])->name('tasks.update.title');