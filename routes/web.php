<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/tifor',function(){
    return "Hello Titip Informatika";
});

Route::redirect('/youtube',"/tifor");

Route::fallback(function(){
    return "404 by Titip Informatika";
});


// view nested
Route::view("/world","admin.profile",["name"=>"Asep Admn"]);
Route::get("/world-lagi",function(){
   return view("admin.hello",["name"=>"Rendi Apriandi"]);
});