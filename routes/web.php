<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    echo "Hello World";
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('authenticate');


Route::middleware("auth")->group(function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        echo "Dashboard";
    })->name('dashboard');


    Route::resource('users', UserController::class);
});
Route::resource('products', ProductController::class);

// Route::prefix("/users")->group(function(){
//     Route::get("", [UserController::class, "index"])->name("users.index");
//     Route::get("/create", [UserController::class, "create"])->name("users.create");
//     Route::get("/{id}/edit", [UserController::class, "edit"])->name("users.edit");
//     Route::put("/{id}/update", [UserController::class, "update"])->name("users.update");
//     Route::post("", [UserController::class, "store"])->name("users.store");
//     Route::get("/{id}", [UserController::class, "destroy"])->name("users.destroy");
// });

// Route::get("/users", [UserController::class, "index"]);
// Route::get("/users/create", [UserController::class, "create"]);
// Route::get("/users/{id}/edit", [UserController::class, "edit"]);
// Route::put("/users/{id}/update", [UserController::class, "update"]);
// Route::post("/users", [UserController::class, "store"]);
// Route::get("/users/{id}", [UserController::class, "destroy"]);
