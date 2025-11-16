<?php
use Illuminate\Support\Facades\Route;
use Modules\ApiApp\app\Http\Controllers\v01\FAQsApiController;

Route::prefix('faqs/')->group(function () {
    Route::controller(FAQsApiController::class)
        ->prefix('categories')
        ->group(function() {
            Route::get('dashboard', 'categoriesDashboard')->name("faqs.categories.dashboard");
            Route::post('list-questions', 'categoriesListQuestion')->name('faqs.categories.questions');
        });

    Route::controller(FAQsApiController::class)
        ->prefix('questions')
        ->group(function() {
            Route::post('detail', 'questionsDetail')->name('faqs.questions.details');
        });

    Route::controller(FAQsApiController::class)
        ->prefix('search')
        ->group(function() {
            Route::post('list', 'listResult')->name("faqs.search.list");
        });
});

