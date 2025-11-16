<?php
use Illuminate\Support\Facades\Route;
use Modules\Setups\app\Http\Controllers\PagesController;

Route::controller(PagesController::class)->group(function() {
    Route::get("/pages", 'index')->name("setups.pages.index");
    Route::get("/pages/create", 'create')->name("setups.pages.create");
    Route::post("/pages/store", 'store')->name("setups.pages.store");
    Route::get("/pages/view/{id}", 'view')->name("setups.pages.view");
    Route::get("/pages/edit/{id}", 'edit')->name("setups.pages.edit");
    Route::post("/pages/update/{id}", 'update')->name("setups.pages.update");
    Route::get("/pages/destroy/{id}", 'destroy')->name("setups.pages.destroy");
    Route::get("/pages/restore/{id}", 'restore')->name("setups.pages.restore");
});
