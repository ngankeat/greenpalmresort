<?php

use Illuminate\Support\Facades\Route;
use Modules\FAQs\app\Http\Controllers\FAQsController;

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

Route::prefix('faqs')->middleware(['auth', 'system'])->group(function () {
    Route::controller(FAQsController::class)->group(function() {
        Route::get("/category", 'categoryIndex')->name("faqs.category.index");
        Route::get("/category/create", 'categoryCreate')->name("faqs.category.create");
        Route::post("/category/store", 'categoryStore')->name("faqs.category.store");
        Route::get("/category/edit/{id}", 'categoryEdit')->name("faqs.category.edit");
        Route::post("/category/update/{id}", 'categoryUpdate')->name("faqs.category.update");
        Route::get("/category/destroy/{id}", 'categoryDestroy')->name("faqs.category.destroy");
        Route::get("/category/restore/{id}", 'categoryRestore')->name("faqs.category.restore");

        /*
         * Question
         */
        Route::get("/question", 'questionIndex')->name("faqs.question.index");
        Route::get("/question/view/{id}", 'questionView')->name("faqs.question.view");
        Route::get("/question/create", 'questionCreate')->name("faqs.question.create");
        Route::post("/question/store", 'questionStore')->name("faqs.question.store");
        Route::get("/question/edit/{id}", 'questionEdit')->name("faqs.question.edit");
        Route::post("/question/update/{id}", 'questionUpdate')->name("faqs.question.update");
        Route::get("/question/destroy/{id}", 'questionDestroy')->name("faqs.question.destroy");
        Route::get("/question/restore/{id}", 'questionRestore')->name("faqs.question.restore");

          /*
         * banner
         */
        Route::get("/banner", 'bannerIndex')->name("faqs.banner.index");
        Route::get("/banner/view/{id}", 'bannerView')->name("faqs.banner.view");

        /*
         * contact
         */
        Route::get("/contact", 'contactIndex')->name("faqs.contact.index");
        Route::get("/contact/view/{id}", 'contactView')->name("faqs.contact.view");
        Route::get("/contact/create", 'contactCreate')->name("faqs.contact.create");
        Route::post("/contact/store", 'contactStore')->name("faqs.contact.store");
        Route::get("/contact/edit/{id}", 'contactEdit')->name("faqs.contact.edit");
        Route::post("/contact/update/{id}", 'contactUpdate')->name("faqs.contact.update");
        Route::get("/contact/destroy/{id}", 'contactDestroy')->name("faqs.contact.destroy");
        Route::get("/contact/restore/{id}", 'contactRestore')->name("faqs.contact.restore");

         /*
         * gallery
         */
        Route::get("/gallery", 'galleryIndex')->name("faqs.gallery.index");
        Route::get("/gallery/view/{id}", 'galleryView')->name("faqs.gallery.view");
        Route::get("/gallery/create", 'galleryCreate')->name("faqs.gallery.create");
        Route::post("/gallery/store", 'galleryStore')->name("faqs.gallery.store");
        Route::get("/gallery/edit/{id}", 'galleryEdit')->name("faqs.gallery.edit");
        Route::post("/gallery/update/{id}", 'galleryUpdate')->name("faqs.gallery.update");
        Route::get("/gallery/destroy/{id}", 'galleryDestroy')->name("faqs.gallery.destroy");
        Route::get("/gallery/restore/{id}", 'galleryRestore')->name("faqs.gallery.restore");

         /*
         * Room type
         */
        Route::get("/roomType", 'roomTypeIndex')->name("faqs.roomType.index");
        Route::get("/roomType/view/{id}", 'roomTypeView')->name("faqs.roomType.view");
        Route::get("/roomType/create", 'roomTypeCreate')->name("faqs.roomType.create");
        Route::post("/roomType/store", 'roomTypeStore')->name("faqs.roomType.store");
        Route::get("/roomType/edit/{id}", 'roomTypeEdit')->name("faqs.roomType.edit");
        Route::post("/roomType/update/{id}", 'roomTypeUpdate')->name("faqs.roomType.update");
        Route::get("/roomType/destroy/{id}", 'roomTypeDestroy')->name("faqs.roomType.destroy");
        Route::get("/roomType/restore/{id}", 'roomTypeRestore')->name("faqs.roomType.restore");

    });
});
