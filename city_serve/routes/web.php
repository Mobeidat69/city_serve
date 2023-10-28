<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admins\AdminsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Jobs\JobsController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|        $this->middleware('auth');

*/


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/support', function(){
    return view('pages.support');
})->name('support');
Route::get('/privacy', function(){
    return view('pages.privacy');
})->name('privacy');
Route::get('/terms', function(){
    return view('pages.terms');
})->name('terms');

Route::group(['prefix' => 'jobs', 'middleware' => 'auth:web'], function () {
    Route::post('save', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
    Route::post('apply', [App\Http\Controllers\Jobs\JobsController::class, 'jobApply'])->name('apply.job');
});
Route::get('jobs/single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'single'])->name('single.job');
Route::any('jobs/search', [App\Http\Controllers\Jobs\JobsController::class, 'search'])->name('search.job');

Route::group(['prefix' => 'users', 'middleware' => 'auth:web'], function () {
    Route::get('profile', [App\Http\Controllers\Users\UserController::class, 'profile'])->name('profile');
    Route::get('applications', [App\Http\Controllers\Users\UserController::class, 'applications'])->name('applications');
    Route::get('savedjobs', [App\Http\Controllers\Users\UserController::class, 'savedJobs'])->name('saved.jobs');
    Route::get('edit-details', [App\Http\Controllers\Users\UserController::class, 'editDetails'])->name('edit.Details');
    Route::post('edit-details', [App\Http\Controllers\Users\UserController::class, 'updateDetails'])->name('update.details');
    Route::post('edit-image', [App\Http\Controllers\Users\UserController::class, 'updateImage'])->name('update.image');
});
Route::get('/categories/single/{id}', [App\Http\Controllers\Categories\CategoriesController::class, 'singleCategory'])->name('categories.single');
Route::get('/categories', [App\Http\Controllers\Categories\CategoriesController::class, 'allCategories'])->name('categories');

Auth::routes();



Route::get('/23423', function(){
    return view('admin.about');
});




// ADMIN DASHBOARD ROUTES

Route::get('admin/login', [AdminsController::class, 'viewLogin'])->name('view.login')->middleware('CheckForAuth');
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
// Route::post('admins/logout', 'Admins\AdminsController@logout')->name('admins.logout');


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

    Route::get('/confirm-application/{id}/{appId}', [MailController::class, 'confirmation'])->name('application.confirm');

    Route::get('/applications/{id}/{appId}', [MailController::class, 'reject'])->name('application.reject');
});
