<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    return redirect('/login');
}) -> name('start');

Route::get('/login', [LoginController::class, 'main']) -> name('login');
Route::post('/login', [LoginController::class, 'authentification']) -> name('login_post');

Route::get('/quit', [LoginController::class, 'quit']) -> name('quit') -> middleware('auth');

Route::get('/registration', function () {
    return view('static.reg');
}) -> name('reg');
Route::post('/registration', [LoginController::class, 'registration']) -> name('reg_post');

Route::get('/main', [ToDoController::class, 'main']) -> name('main') -> middleware('auth');

Route::get('/createToDo', [ToDoController::class, 'ToDoForm']) -> name('ToDoform') -> middleware('auth');
Route::post('/createToDo', [ToDoController::class, 'createToDo']) -> name('create_ToDo') -> middleware('auth');

Route::post('/delete/{task_id}', [ToDoController::class, 'deleteToDo']) -> name('delete_ToDo') -> middleware('auth');
Route::post('/complete/{task_id}', [ToDoController::class, 'completeToDo']) -> name('complete_ToDo') -> middleware('auth');