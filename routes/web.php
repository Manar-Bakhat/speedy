<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthorController;
use App\Http\Controllers\JobberCategoryController;
use App\Http\Controllers\JobberController;
use App\Http\Controllers\CarServiceApplicationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\savedServiceController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

//public routes
Route::get('/', [PostController::class, 'index'])->name('post.index');
Route::get('/service/{service}', [PostController::class, 'show'])->name('post.show');
Route::get('employer/{employer}', [AuthorController::class, 'employer'])->name('account.employer');
Route::post('update-photo', [AccountController::class, 'photo'])->name('update-photo');
//return vue page
Route::get('/search', [ServiceController::class, 'index'])->name('service.index');
Route::get('/resultat', [ServiceController::class, 'search'])->name('service-search');
Route::get('/resultats', [PostController::class, 'searchPost'])->name('service-searche');




//auth routes
Route::middleware('auth')->prefix('account')->group(function () {
  //every auth routes AccountController
  Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');
  Route::get('overview', [AccountController::class, 'index'])->name('account.index');
  Route::get('deactivate', [AccountController::class, 'deactivateView'])->name('account.deactivate');
  Route::get('change-password', [AccountController::class, 'changePasswordView'])->name('account.changePassword');
  Route::delete('delete', [AccountController::class, 'deleteAccount'])->name('account.delete');
  Route::put('change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');
  //savedServices

  Route::get('my-saved-services', [savedServiceController::class, 'index'])->name('savedService.index');
  Route::get('my-saved-services/{id}', [savedServiceController::class, 'store'])->name('savedService.store');
  Route::delete('my-saved-services/{id}', [savedServiceController::class, 'destroy'])->name('savedService.destroy');


  //Admin Role Routes
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('account.dashboard');
    Route::get('view-all-users', [AdminController::class, 'viewAllUsers'])->name('account.viewAllUsers');
    Route::delete('view-all-users', [AdminController::class, 'destroyUser'])->name('account.destroyUser');
    Route::delete('comment/{comment}', [AdminController::class, 'destroyComment'])->name('destroy-comment');
    Route::delete('progile-jobber/{comment}', [AdminController::class, 'destroyComment'])->name('destroy-comment');


    Route::get('category/{category}/edit', [JobberCategoryController::class, 'edit'])->name('category.edit');
    Route::post('category', [JobberCategoryController::class, 'store'])->name('category.store');
    Route::put('category/{id}', [JobberCategoryController::class, 'update'])->name('category.update');
    Route::get('category/{id}', [JobberCategoryController::class, 'destroy'])->name('category.destroy');



});

  //Author Role Routes
  Route::group(['middleware' => ['role:author']], function () {
    Route::get('author-section', [AuthorController::class, 'authorSection'])->name('account.authorSection');

    Route::get('service-application/{id}', [CarServiceApplicationController::class, 'show'])->name('serviceApplication.show');
    Route::delete('service-application', [CarServiceApplicationController::class, 'destroy'])->name('serviceApplication.destroy');
    Route::get('service-application', [CarServiceApplicationController::class, 'index'])->name('serviceApplication.index');

    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    //Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
    //Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
    //Route::post('company', [CompanyController::class, 'store'])->name('company.store');
    //Route::get('company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    //Route::delete('company', [CompanyController::class, 'destroy'])->name('company.destroy');


    Route::get('jobber/create', [JobberController::class, 'create'])->name('jobber.create');
    Route::put('jobber/{id}', [JobberController::class, 'update'])->name('jobber.update');
    Route::post('jobber', [JobberController::class, 'store'])->name('jobber.store');
    Route::get('jobber/edit', [JobberController::class, 'edit'])->name('jobber.edit');
    Route::delete('jobber', [JobberController::class, 'destroy'])->name('jobber.destroy');




  });

  //User Role routes
   Route::group(['middleware' => ['role:user']], function () {
    Route::get('become-employer', [AccountController::class, 'becomeEmployerView'])->name('account.becomeEmployer');
    Route::post('become-employer', [AccountController::class, 'becomeEmployer'])->name('account.becomeEmployer');
});
});
Route::get('/Jobber',function(){
    return view('Jobber');
});

Route::post('user/{post}',[PostController::class, 'created'])->name('comment-user');





