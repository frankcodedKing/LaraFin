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
Route::get('/approveddeposits', [App\Http\Controllers\adminController::class, 'approveddeposits'])->name('approveddeposits');
Route::get('/pendingdeposits', [App\Http\Controllers\adminController::class, 'pendingdeposits'])->name('pendingdeposits');
Route::get('/referrals', [App\Http\Controllers\adminController::class, 'userreferrals'])->name('userreferrals');
Route::get('/withdrawalrequests', [App\Http\Controllers\adminController::class, 'withdrawalrequests'])->name('withdrawalrequests');
Route::get('/runninginvestments', [App\Http\Controllers\adminController::class, 'runninginvestments'])->name('runninginvestments');
Route::get('/viewuser', [App\Http\Controllers\adminController::class, 'viewuser'])->name('viewuser');
