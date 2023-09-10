<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Jobs\JobsController;


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


// Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('app.blade.php');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home ');
Route::get('/admin', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
Route::get('admin', [AdminsController::class, 'index'])->name('admins.dashboard');
Route::group(['prefix' => 'admins', 'middleware' => 'auth:admin'], function () {
    // Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.index');
});
// Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');
// });
Route::post('/jobs/save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
Route::post('/jobs/apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
Route::get('/categories/single/{name}',[App\Http\Controllers\Categories\CategoriesController::class,'singleCategory'])->name('categories.single');


Auth::routes();
// Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/jobs/single/{id}',[App\Http\Controllers\Jobs\JobsController::class,'single'])->name('single.job');

Route::group(['prefix' => 'admins', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.index');
});
