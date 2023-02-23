<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});
Route::get('/home-lagi', function () {
    return view('home-lagi', ['name' => 'Paijo']);
});

// route dengan redirect
Route::redirect('/home', 'home-lagi');

// fallback
// Route::fallback(function () {
//     return "404 by PZN";
// });

Route::view('/hello', 'hello', ['name' => 'Eko']);

Route::get('/hello-again', function () {
    return view('hello-again', ['name' => 'Eko']);
});

// route parameters

Route::get('/products/{id}', function ($productId) {
    return "Product : " . $productId;
});
Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product : " . $productId . ",Items : " . $itemId;
});
Route::get ('/categories/{id}', function($categoryId){
    return "Category $categoryId";
})->where('id','[0-9]+');


// dari controller
Route::get('/controller/hello',[HelloController::class,'hello']);
Route::get('/controller/hello/request',[\App\Http\Controllers\HelloController::class,'request']);

//Router and test
Route::get('/input/hello',[\App\Http\Controllers\InputController::class,'hello']);
Route::post('/input/hello',[\App\Http\Controllers\InputController::class,'hello']);
Route::post('/input/hello/first',[InputController::class,'helloFirst']);
Route::post('/input/hello/input',[\App\Http\Controllers\InputController::class,'helloInput']);
Route::post('/input/hello/array',[\App\Http\Controllers\InputController::class,'helloArray']);

Route::post('/input/type',[\App\Http\Controllers\InputController::class, 'inputType']);
Route::post('/input/filterOnly',[\App\Http\Controllers\InputController::class, 'filterOnly']);
Route::post('/input/filterExcept',[\App\Http\Controllers\InputController::class, 'filterExcept']);
Route::post('/input/filterExcept',[InputController::class, 'filterExcept']);


// file upload
Route::post('/file/upload',[\App\Http\Controllers\FileController::class, 'upload']);
