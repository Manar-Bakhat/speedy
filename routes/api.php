<?php

use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//job routes
Route::middleware('api')->group(function () {
    Route::get('search', [ServiceController::class, 'search'])->name('service.search');

    //pages api
    Route::get('jobber-categories', [JobController::class, 'getCategories'])->name('service.getCategories');
    Route::get('service-titles', [JobController::class, 'getAllByTitle'])->name('service.getAllByTitle');
    Route::get('jobbers', [JobController::class, 'getAllOrganization'])->name('service.getAllOrganization');
});
