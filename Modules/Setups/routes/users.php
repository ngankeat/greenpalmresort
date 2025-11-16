<?php
use Illuminate\Support\Facades\Route;
use Modules\Setups\app\Http\Controllers\UsersController;

Route::controller(UsersController::class)->group(function() {
    Route::get("/users", 'index')->name("setups.users.index");
    Route::get("/users/create", 'create')->name("setups.users.create");
    Route::post("/users/store", 'store')->name("setups.users.store");
    Route::get("/users/edit/{id}", 'edit')->name("setups.users.edit");
    Route::post("/users/update/{id}", 'update')->name("setups.users.update");
    Route::get("/users/destroy/{id}", 'destroy')->name("setups.users.destroy");
    Route::get("/users/restore/{id}", 'restore')->name("setups.users.restore");
    Route::get("/users/password", 'password')->name("setups.users.password");
    Route::post("/users/password-change", 'passwordChange')->name("setups.users.change");
});
