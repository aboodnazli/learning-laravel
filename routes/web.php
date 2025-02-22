<?php

use Illuminate\Support\Facades\Route;

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
