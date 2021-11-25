<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ExcelCSVController;
use App\Http\Controllers\ForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Project Name : SCM OJT Bulletin Board
| Description  : User routes, Post routes, Password reset routes and CSV routes
|
*/

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/custom-login', [UserController::class, 'customLogin'])->name('login.custom'); 
Route::get('/logout',[UserController::class, 'logout'])->name('logout');
Route::get('/',[PostController::class, 'index'])->middleware('auth');

//Reset Password routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

//User routes
Route::group(['middleware' => 'auth'], function() {
    Route::resource('user', UserController::class);
    Route::get('/users', [UserController::class, 'index'])->middleware('admin')->name('user.index');
    Route::post('user/confirm/',[UserController::class, 'confirm'])->name('user.confirm');
    Route::post('user/update_confirm/',[UserController::class, 'updateConfirm'])->name('user.updateConfirm');
    Route::get('userSearch/',[UserController::class, 'userSearch'])->name('user.user_search');
    Route::get('change-password/',[UserController::class, 'password'])->name('user.password');
    Route::post('change-password/',[UserController::class, 'changePassword'])->name('user.passwordChange');
});

//Post routes and CSV routes
Route::group(['middleware' => 'auth'], function() {
    Route::resource('post', PostController::class);
    Route::get('posts', [PostController::class, 'index'])->name('posts.index');
    Route::post('post/confirm/',[PostController::class, 'confirm'])->name('post.confirm');
    Route::post('post/update_confirm/',[PostController::class, 'updateConfirm'])->name('post.updateConfirm');
    Route::get('search/',[PostController::class, 'search'])->name('post.search');
    Route::get('csvUpload', [ExcelCSVController::class, 'index'])->name('csvUpload');
    Route::post('import-excel-csv-file', [ExcelCSVController::class, 'importExcelCSV']);
    Route::get('export-excel-csv-file/{slug}', [ExcelCSVController::class, 'exportExcelCSV']);
});