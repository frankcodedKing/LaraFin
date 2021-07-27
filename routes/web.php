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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\VisitorController::class, 'index'])->name('index');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//ADMIN
Route::get('/nanoadmin', [App\Http\Controllers\adminController::class, 'adminindex'])->name('adminindex');
Route::get('/pages', [App\Http\Controllers\adminController::class, 'pages'])->name('pages');
Route::get('/users', [App\Http\Controllers\adminController::class, 'users'])->name('users');
Route::get('/pendingwithdrawals', [App\Http\Controllers\adminController::class, 'pendingwithdrawals'])->name('pendingwithdrawals');
Route::get('/approvedwithdrawals', [App\Http\Controllers\adminController::class, 'approvedwithdrawals'])->name('approvedwithdrawals');
Route::get('/approveddeposits', [App\Http\Controllers\adminController::class, 'approveddeposits'])->name('approveddeposits');
Route::get('/pendingdeposits', [App\Http\Controllers\adminController::class, 'pendingdeposits'])->name('pendingdeposits');
Route::get('/referrals', [App\Http\Controllers\adminController::class, 'userreferrals'])->name('userreferrals');
Route::get('/runninginvestments', [App\Http\Controllers\adminController::class, 'runninginvestments'])->name('runninginvestments');

Route::get('/viewuser/{id}', [App\Http\Controllers\adminController::class, 'viewuser'])->name('viewuser');


Route::get('/viewfaqs', [App\Http\Controllers\adminController::class, 'viewfaqs'])->name('viewfaqs');

//routes to preven error
Route::get('/savecompanydetails', [App\Http\Controllers\adminController::class, 'pages'])->name('savecompanydetaills');
Route::get('/savecompanyabout', [App\Http\Controllers\adminController::class, 'pages'])->name('savecompanyabout');
Route::get('/savecompanyfaq', [App\Http\Controllers\adminController::class, 'pages'])->name('savecompanyfaq');




//admin post request
Route::post('/savecompanydetails', [App\Http\Controllers\adminController::class, 'savecompanydetails'])->name('savecompanydetails');
Route::post('/savecompanyabout', [App\Http\Controllers\adminController::class, 'savecompanyabout'])->name('savecompanyabout');
Route::post('/savecompanyfaq', [App\Http\Controllers\adminController::class, 'savecompanyfaq'])->name('savecompanyfaq');

//faqs delete and edit
Route::post('/delcompanyfaq', [App\Http\Controllers\adminController::class, 'deletecompanyfaq'])->name('deletcompanyfaq');
Route::post('/editcompanyfaq', [App\Http\Controllers\adminController::class, 'editcompanyfaq'])->name('editcompanyfaq');

Route::get('/admingetrdelete/{id}', [App\Http\Controllers\adminController::class, 'adminuserdelete'])->name('adminuserdelete');
Route::get('/admingetlock/{id}', [App\Http\Controllers\adminController::class, 'adminunblock'])->name('adminunblock');
Route::get('/admingetck/{id}', [App\Http\Controllers\adminController::class, 'adminblock'])->name('adminblock');



