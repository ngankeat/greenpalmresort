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
Route::prefix('setups')->middleware(['auth', 'system'])->group(function () {
    require_once __DIR__ . '/modules.php';
    require_once __DIR__ . '/pages.php';
    require_once __DIR__ . '/roles.php';
    require_once __DIR__ . '/users.php';
});

