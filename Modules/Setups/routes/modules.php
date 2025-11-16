<?php
use Illuminate\Support\Facades\Route;
use Modules\Setups\app\Http\Controllers\ModulesController;

Route::controller(ModulesController::class)->group(function() {
    Route::get("/modules", 'index')->name("modules.index");
    Route::get("/modules/create", 'modulesCreate')->name("modules.create");
    Route::post("/modules/store", 'modulesStore')->name("modules.store");
    Route::get("/modules/edit/{id}", 'modulesEdit')->name("modules.edit");
    Route::post("/modules/update/{id}", 'modulesUpdate')->name("modules.update");
    Route::post("/modules/update/{id}", 'modulesUpdate')->name("modules.update");
    Route::get("/modules/destroy/{id}", 'modulesDestroy')->name("modules.destroy");
    Route::get("/modules/restore/{id}", 'modulesRestore')->name("modules.restore");
});
