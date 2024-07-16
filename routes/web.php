<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationsController;

//Route::get('/', function () {return view('welcome');})->middleware('verified');

//site routes

Route::get('index', [FrontPageController::class,'index'])->name('index');



Auth::routes(['verify'=>true]);
Route::get('/logout', function () { Auth::logout(); return redirect('login'); })->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['verified', 'checkActive'])    //users page
                                                          ->name('dashboard'); 


Route::prefix('admin')->middleware(['verified', 'checkActive'])->group(function () {

//beverages resource routes
Route::get('beverages',[BeverageController::class, 'index'])->name('beverages');
Route::get('addBeverage',[BeverageController::class, 'create'])->name('addBeverage');
Route::post('insertBeverage', [BeverageController::class,'store'])->name('insertBeverage');
Route::get('editBeverage/{id}', [BeverageController::class, 'edit'])->name('editBeverage');
Route::put('updateBeverage/{id}', [BeverageController::class, 'update'])->name('updateBeverage');
Route::delete('deleteBeverage', [BeverageController::class, 'destroy'])->name('deleteBeverage');

//user resource routes
Route::get('addUser',[UserController::class, 'create'])->name('addUser');
Route::post('insertUser', [UserController::class,'store'])->name('insertUser');
Route::get('editUser/{id}', [UserController::class, 'edit'])->name('editUser');
Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser');

//category resource routes
Route::get('categories',[CategoryController::class, 'index'])->name('categories');
Route::get('addCategory',[CategoryController::class, 'create'])->name('addCategory');
Route::post('insertCategory', [CategoryController::class,'store'])->name('insertCategory');
Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
Route::put('updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
Route::delete('deleteCategory', [CategoryController::class, 'destroy'])->name('deleteCategory');

//messages resource routes
Route::get('messages',[EmailController::class, 'index'])->name('messages');
Route::post('insertMessage', [EmailController::class,'store'])->name('insertMessage');
Route::get('showMessage/{id}', [EmailController::class, 'show'])->name('showMessage');
Route::delete('deleteMessage', [EmailController::class, 'destroy'])->name('deleteMessage');

// reading Notification route
Route::post('/notifications/mark-as-read',[NotificationsController::class, 'markAsRead'])->name('notifications.markAsRead');

});




