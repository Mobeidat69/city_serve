<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminsController;
use Illuminate\Support\Facades\Auth;



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



Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('app.blade.php');
Auth::routes();
Route::get('/index.html', [App\Http\Controllers\HomeController::class, 'index'])->name('app.blade.php');
Route::get('/admin', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
Route::get('admin', [AdminsController::class, 'index'])->name('admins.dashboard');
Route::group(['prefix' => 'admins', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.index');
});