<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {

    Route::get('/tasks/create', [TodoController::class, 'create'])->name('tasks.create');
    Route::post('/tasks', [TodoController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{id}', [TodoController::class, 'delete'])->name('tasks.delete');
    Route::put('/tasks/{id}', [TodoController::class, 'update'])->name('tasks.update');
    Route::put('/tasks/title/{id}', [TodoController::class, 'updateTitle'])->name('tasks.update.title');});



Route::get('/tasks', [TodoController::class, 'index'])->middleware(['auth', 'verified'])->name('todo');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
