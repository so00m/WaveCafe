<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\BeverageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;




//Route::get('/', function () {return view('welcome');});



//site routes
Route::get('/index', [FrontPageController::class,'index']);



//Authantication routes
Auth::routes(['verify'=>true]);
Route::get('/logout', function () { Auth::logout(); return redirect('login'); })->name('logout');

//dashboard routes->middleware('verified')

Route::prefix('admin')->group(function () {

//beverages routes
Route::get('beverages',[BeverageController::class, 'index'])->name('beverages');
Route::get('addBeverage',[BeverageController::class, 'create'])->name('addBeverage');
Route::post('insertBeverage', [BeverageController::class,'store'])->name('insertBeverage');
Route::get('editBeverage/{id}', [BeverageController::class, 'edit'])->name('editBeverage');
Route::put('updateBeverage/{id}', [BeverageController::class, 'update'])->name('updateBeverage');
Route::delete('deleteBeverage', [BeverageController::class, 'destroy'])->name('deleteBeverage');

//user routes
Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('users');
Route::get('addUser',[UserController::class, 'create'])->name('addUser');
Route::post('insertUser', [UserController::class,'store'])->name('insertUser');
Route::get('editUser/{id}', [UserController::class, 'edit'])->name('editUser');
Route::put('updateUser/{id}', [UserController::class, 'update'])->name('updateUser');


//category routes
Route::get('categories',[CategoryController::class, 'index'])->name('categories');
Route::get('addCategory',[CategoryController::class, 'create'])->name('addCategory');
Route::post('insertCategory', [CategoryController::class,'store'])->name('insertCategory');
Route::get('editCategory/{id}', [CategoryController::class, 'edit'])->name('editCategory');
Route::put('updateCategory/{id}', [CategoryController::class, 'update'])->name('updateCategory');
Route::delete('deleteCategory', [CategoryController::class, 'destroy'])->name('deleteCategory');

//messages routes
Route::get('messages',[MessageController::class, 'index'])->name('messages');
Route::get('addMessage',[MessageController::class, 'create'])->name('addMessage');
Route::post('insertMessage', [MessageController::class,'store'])->name('insertMessage');
Route::get('editMessage/{id}', [MessageController::class, 'edit'])->name('editMessage');
Route::get('showMessage/{id}', [MessageController::class, 'show'])->name('showMessage');
Route::delete('deleteMessage', [MessageController::class, 'destroy'])->name('deleteMessage');

});













