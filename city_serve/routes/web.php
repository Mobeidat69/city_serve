<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminsController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login');
Route::post('admin/login', [AdminsController::class, 'checkLogin'])->name('check.login');

Route::group(['prefix' => 'admins', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.index');
});
    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
