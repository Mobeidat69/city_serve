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


Auth::routes();
Route::get('/index.html', [App\Http\Controllers\HomeController::class, 'index'])->name('app.blade.php');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();
// Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

Route::get('/jobs/single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');




// ADMIN DASHBOARD ROUTES


Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login')->middleware('checkforauth');
Route::post('admin/login', [AdminsController::class, 'checkLogin'])->name('check.login');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {

    Route::get('/', [App\Http\Controllers\Admins\AdminsController::class, 'index'])->name('admins.dashboard');

    Route::get('/admins', [App\Http\Controllers\Admins\AdminsController::class, 'admins'])->name('view.admins');
    Route::get('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'createAdmins'])->name('create.admin');
    Route::post('/create-admins', [App\Http\Controllers\Admins\AdminsController::class, 'storeAdmin'])->name('store.admin');

    Route::get('/cetegories', [App\Http\Controllers\Admins\AdminsController::class, 'viewCetegories'])->name('view.cetegories');
    Route::get('/create-category', [App\Http\Controllers\Admins\AdminsController::class, 'createCategory'])->name('create.category');
    Route::post('/create-category', [App\Http\Controllers\Admins\AdminsController::class, 'storeCategory'])->name('store.category');
    
    Route::get('/edit-category/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'viewEditCategory'])->name('edit.category');
    Route::post('/edit-category/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'updateCategory'])->name('update.category');
    
    Route::delete('/delete-category/{id}', [App\Http\Controllers\Admins\AdminsController::class, 'deleteCategory'])->name('delete.category');
    
});
