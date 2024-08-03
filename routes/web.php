<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\RedirectController;

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
// Route::get("/hello", function() {
//     return view("hello", ["name" => "Adi"]);
// });

Route::view("/world", "hello.world", ["name"=> "Salafudin"]);

Route::get("products/{productId}", function ($productId) {
    return "Product ID : $productId";
})->name("product.detail");

Route::get("products/{productId}/items/{itemId}", function ($productId, $itemId) {
    return "Product ID : $productId, Item $itemId";
})->name("product.item.detail");

Route::get("categories/{id}/tags/{tagId}", function($categoryId, $tags) {
    return "Category ID : $categoryId with the tags : $tags";
})->where("id", "[0-9]+")->where("tagId", "[a-z]")->name("category.detail");

Route::get("/user/{id?}", function($id = "404") {
    return "User ID : $id";
})->where("id", "[0-9]")->name("user.detail");

Route::get("/conflict/{name}", function($name){
    return "Conflict $name";
});

Route::get("conflict/eko", function(){
    return "Conflict Eko Kurniawan Khannedy";
});

Route::get("/produk/{productId}", function($productId) {
    $link = route("product.detail", ["productId" => $productId]);
    return "Link $link";
});

Route::get("/produk-redirect/{id}", function($productId) {
    return redirect()->route("product.detail", ["productId" => $productId]);
});

Route::get("controller/hello/{name}", [HelloController::class, "hello"]);

Route::get("controller/request", [HelloController::class, "request"]);

Route::get("input/hello", [InputController::class , "hello"]);
Route::post("input/hello", [InputController::class , "hello"]);

Route::post("input/helloFirst", [InputController::class , "helloFirstName"]);

Route::post("input/helloInput", [InputController::class , "helloInput"]);
Route::get("input/helloInput", [InputController::class , "helloInput"]);

Route::post("/input/name", [InputController::class, "arrayInput"]);

Route::post("input/type", [InputController::class, "inputType"]);

Route::post("input/filter/only", [InputController::class, "filterOnly"]);
Route::post("input/filter/except", [InputController::class, "filterExcept"]);

Route::post("input/filter/merge", [InputController::class, "filterMerge"]);

Route::post("file/upload", [FileController::class, "upload"]);

Route::get("hello/response", [ResponseController::class, "response"]);
Route::get("hello/header", [ResponseController::class, "header"]);

Route::get("hello/view", [ResponseController::class, "responseView"]);
Route::get("hello/json", [ResponseController::class, "responseJson"]);
Route::get("hello/file", [ResponseController::class, "responseFile"]);
Route::get("hello/file/download", [ResponseController::class, "responseDownload"]);

Route::get("/cookie/set", [CookieController::class, "createCookie"]);
Route::get("/cookie/get", [CookieController::class, "getCookie"]);
Route::get("/cookie/clear", [CookieController::class, "clearCookie"]);

Route::get("/redirect/from", [RedirectController::class, "redirectFrom"]);
Route::get("/redirect/to", [RedirectController::class, "redirectTo"]);

Route::get("/redirect/name", [RedirectController::class, "redirectName"]);
Route::get("/redirect/name/{name}", [RedirectController::class, "redirectHello"])->name("redirect-hello");
Route::get("/redirect/action", [RedirectController::class, "redirectAction"]);
Route::get("/redirect/youtube", [RedirectController::class, "redirectAway"]);


