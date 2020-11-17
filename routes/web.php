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
    return view('index.home');
});
Route::get('/forum', function () {
    return view('forum.home');
});


Route::get('/criar', function(){
    //$user = new \App\Models\User;

    return \App\Models\User::paginate(10);
});