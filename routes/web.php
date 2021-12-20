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

//User routes
Route::get('user/login', [UserController::class, 'login'])->name('user.login');
Route::post('user/customLogin', [UserController::class, 'customLogin'])->name('user.customLogin'); 
Route::get('user/logout',[UserController::class, 'logout'])->name('user.logout');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('user', UserController::class);
    Route::get('users', [UserController::class, 'index'])->middleware('admin')->name('user.index');
    Route::post('user/confirm',[UserController::class, 'confirm'])->name('user.confirm');
    Route::post('user/updateConfirm',[UserController::class, 'updateConfirm'])->name('user.updateConfirm');
    Route::get('user',[UserController::class, 'userSearch'])->name('user.userSearch');
    Route::get('password',[UserController::class, 'password'])->name('user.password');
    Route::post('password',[UserController::class, 'changePassword'])->name('user.changePassword');
});

//Reset Password routes
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forgotPassword.showForgetPasswordForm');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgotPassword.submitForgetPasswordForm'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('forgotPassword.showResetPasswordForm');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('forgotPassword.submitResetPasswordForm');

//Post routes and CSV routes
Route::get('/',[PostController::class, 'index'])->name('post.index');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('post', PostController::class);
    Route::get('posts', [PostController::class, 'index'])->name('post.index');
    Route::post('post/confirm',[PostController::class, 'confirm'])->name('post.confirm');
    Route::post('post/updateConfirm',[PostController::class, 'updateConfirm'])->name('post.updateConfirm');
});
Route::get('post',[PostController::class, 'search'])->name('post.search');
Route::get('csvUpload', [ExcelCSVController::class, 'index'])->name('excelCSVController.csvUpload');
Route::post('import-excel-csv-file', [ExcelCSVController::class, 'importExcelCSV'])->name('excelCSVController.importExcelCSV');
Route::get('export-excel-csv-file/{slug}', [ExcelCSVController::class, 'exportExcelCSV'])->name('excelCSVController.exportExcelCSV');