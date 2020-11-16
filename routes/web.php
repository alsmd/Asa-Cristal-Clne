<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $helloWorld = 'Hello World';
    return view('index.home',compact('helloWorld'));
});

Route::get('/criar', function(){
    //$user = new \App\Models\User;
    $user = \App\Models\User::find(1);
    $user->name = 'Banana';

    $user->save();
    return $user;
});