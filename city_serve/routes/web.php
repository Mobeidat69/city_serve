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


// Auth::routes();
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
    Route::get('/', [AdminsController::class, 'index'])->name('admins.dashboard');
    // ADMIN PAGE ROUTES
    Route::get('/admins', [AdminsController::class, 'admins'])->name('view.admins');
    Route::get('/create-admins', [AdminsController::class, 'createAdmins'])->name('create.admin');
    Route::post('/create-admins', [AdminsController::class, 'storeAdmin'])->name('store.admin');
    // END OF ADMIN PAGE ROUTES

    // USER PAGE ROUTES
    Route::get('/users', [AdminsController::class, 'users'])->name('view.users');
    Route::get('/create-users', [AdminsController::class, 'createUsers'])->name('create.user');
    Route::post('/create-users', [AdminsController::class, 'storeUser'])->name('store.user');
    Route::get('/edit-user /{id}', [AdminsController::class, 'viewEditUser'])->name('edit.user');
    Route::post('/edit-user /{id}', [AdminsController::class, 'updateuser'])->name('update.user');
    Route::delete('/delete-user /{id}', [AdminsController::class, 'deleteuser'])->name('delete.user');
    //   END OF USER PAGE ROUTES


    // CATEGORIES PAGE ROUTES
    Route::get('/cetegories', [AdminsController::class, 'viewCetegories'])->name('view.cetegories');
    Route::get('/create-category', [AdminsController::class, 'createCategory'])->name('create.category');
    Route::post('/create-category', [AdminsController::class, 'storeCategory'])->name('store.category');
    Route::get('/edit-category/{id}', [AdminsController::class, 'viewEditCategory'])->name('edit.category');
    Route::post('/edit-category/{id}', [AdminsController::class, 'updateCategory'])->name('update.category');
    Route::delete('/delete-category/{id}', [AdminsController::class, 'deleteCategory'])->name('delete.category');
    // END OF CATEGORIES PAGE ROUTES


    // Tasks PAGE ROUTES
    Route::get('/tasks', [AdminsController::class, 'viewTasks'])->name('view.tasks');
    Route::get('/task/{id}', [AdminsController::class, 'viewTask'])->name('view.task');
    Route::get('/create-tasks', [AdminsController::class, 'createTasks'])->name('create.task');
    Route::post('/create-tasks', [AdminsController::class, 'storeTasks'])->name('store.task');
    Route::get('/edit-tasks/{id}', [AdminsController::class, 'viewEditTasks'])->name('edit.task');
    Route::post('/edit-tasks/{id}', [AdminsController::class, 'updateTasks'])->name('update.task');
    Route::delete('/delete-tasks/{id}', [AdminsController::class, 'deleteTasks'])->name('delete.task');
    // END OF Tasks PAGE ROUTES

    Route::get('/applications', [AdminsController::class, 'viewApplications'])->name('view.applications');
    
    Route::get('/confirm-applection/{id}', [AdminsController::class, 'confirmApplications'])->name('application.confirm');

    Route::get('/applications/{id}', [AdminsController::class, 'rejectApplications'])->name('application.reject');

});
