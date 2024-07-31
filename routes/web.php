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

Route::get("/adi", function() {  
    return "Hello World";
});

Route::redirect("/hello", "/adi");

Route::fallback(function() {
    return "Halaman Tidak Tersedia || 404 Status Not Found";
});

// Route::view("/hello", "hello", ["name" => "Adi"]);
Route::get("/hello", function() {
    return view("hello", ["name" => "Adi"]);
});

Route::view("/world", "hello.world", ["name"=> "Salafudin"]);