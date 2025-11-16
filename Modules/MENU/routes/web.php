<?php

use Illuminate\Support\Facades\Route;
use Modules\MENU\app\Http\Controllers\MENUController;

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

Route::prefix('menu')->middleware(['auth', 'system'])->group(function () {
    Route::controller(MENUController::class)->group(function() {
        Route::get("/", 'topIndex')->name("menu.top.index");

    });
});
