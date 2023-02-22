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
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
});
Route::get('/home-lagi', function() {
    return view('home-lagi',['name' => 'Paijo']);
});

// route dengan redirect
Route::redirect('/home', 'home-lagi');

// fallback
Route::fallback(function(){
    return "404 by PZN";
});

