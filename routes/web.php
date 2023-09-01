<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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

Route::view("/hello","hello",['name'=>"Asep Riki"]);
Route::get('/hello-lagi',function(){
    return view("hello",["name"=>"Rendi Apriandi"]);
});

// rooute parameter
Route::get('/product/{id}',function($id){
    return "Product : $id";
})->name("product-detail");

Route::get("/products/{id}/categories/{idCategory}",function($idProduct,$idCategory){
    return "Product : $idProduct Category: $idCategory";
});

Route::get("/category/{id}",function($categoryId){
    return "Category Id : $categoryId";
})->where("id","[0-9]+");


// Routing conflict
Route::get("/conflict/{name}",function($name){
    return "conflict $name";
});

Route::get("/conflict/riki",function(){
    return "conflict Asep Riki";
});

// pemanggilan Router name
Route::get("produk/{id}",function($id){
    $link = route("product-detail",['id'=>$id]);
    echo "Produk : $id </br>";
    return $link;
});

Route::get('/produk-redirect/{id}',function($id){
    return redirect(route("product-detail",["id"=>$id]));
});

// controller
Route::get("/controller/hello/request",[HelloController::class,'request']);
Route::get("/controller/hello/{name}",[HelloController::class,'hello']);

// controller input
Route::get("/input/hello",[InputController::class,"hello"]);
Route::post("/input/hello",[InputController::class,"hello"]);

// controler input nested
Route::post('/input/hello/nested',[InputController::class,"helloFirst"]);

// controller get all input
Route::post("/input/hello/input",[InputController::class,"helloInput"]);

// controller get input array all
Route::post("/input/hello/array",[InputController::class,"arrayInput"]);