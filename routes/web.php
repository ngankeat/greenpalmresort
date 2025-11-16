<?php

use App\Livewire\Pages\ActionPages;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::controller(HomeController::class)->group(function() {
//         Route::get("/", 'index')->name("home.index");
//         //Route::get("offer/SpecialOffer", 'SpecialOffer')->name("offer.SpecialOffer");
//     });




Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    } else {
        return view('auth.login');
    }
});

Route::middleware(['auth', 'system'])->get("setups/pages/menus/{id}", ActionPages::class)->name("setups.pages.actions");
