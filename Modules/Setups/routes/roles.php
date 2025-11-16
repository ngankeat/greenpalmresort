<?php
use Illuminate\Support\Facades\Route;
use Modules\Setups\app\Http\Controllers\RolesController;

Route::controller(RolesController::class)->group(function() {
    Route::get("/roles", 'index')->name("setups.roles.index");
    Route::get("/roles/create", 'create')->name("setups.roles.create");
    Route::post("/roles/store", 'store')->name("setups.roles.store");
    Route::get("/roles/edit/{id}", 'edit')->name("setups.roles.edit");
    Route::post("/roles/update/{id}", 'update')->name("setups.roles.update");
    Route::get("/roles/destroy/{id}", 'destroy')->name("setups.roles.destroy");
    Route::get("/roles/restore/{id}", 'restore')->name("setups.roles.restore");
});
