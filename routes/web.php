<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    $name = 'Abdallah';
    $departments=[
        '1'=>'Computer Science',
        '2'=>'Information Systems',
        '3'=>'Information Technology',
    ];

    return view('about' ,compact('name','departments'));
});

Route::post('/about', function () {
    $name=$_POST['name'];
    $departments=[
        '1'=>'Computer Science',
        '2'=>'Information Systems',
        '3'=>'Information Technology',
    ];
    return view('about' ,compact('name','departments'));

});


Route::get('tasks', [TaskController::class, 'index']);

Route::post('create', [TaskController::class, 'create']);

Route::post('delete/{id}', [TaskController::class, 'destroy']);

Route::post('edit/{id}', [TaskController::class, 'edit']);

Route::post('update', [TaskController::class, 'update']);

Route::get('app', function () {
    return view('layouts.app');
});

Route::get('users', [UsersController::class, 'index']);

Route::post('createUser', [UsersController::class, 'create']);

Route::post('deleteUser/{id}', [UsersController::class, 'destroy']);

Route::get('editUser/{id}', [UsersController::class, 'edit']);

Route::patch('updateUser', [UsersController::class, 'update']);


