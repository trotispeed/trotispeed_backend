<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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


Route::post('/dashboard-login', [DashboardController::class, 'post_login']);
Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/reservations/report', [DashboardController::class, 'reservations']);
    Route::get('/reservations/queued', [DashboardController::class, 'queued'])->name('queued');
    Route::get('/reservations/uploadcin/{id}', [DashboardController::class, 'uploadcin'])->name('uploadcin');
    Route::post('/reservations/uploadcin', [DashboardController::class, 'post_cin'])->name('post_cin');
    Route::get('/users', [DashboardController::class, 'users']);
    Route::get('/roles', [DashboardController::class, 'roles']);
    Route::get('/scooter', [DashboardController::class, 'scooter'])->name('scooter_list');
    Route::post('/scooter', [DashboardController::class, 'add_scooter'])->name("add_scooter");
    Route::post('/scooter/update', [DashboardController::class, 'update_scooter'])->name("update_scooter");
    Route::post('/scooter/{id}/delete', [DashboardController::class, 'delete_scooter'])->name("delete_scooter");
    Route::get('/scooter/{id}/edit', [DashboardController::class, 'edit_scooter'])->name("edit_scooter");
});

Route::get('/toriti-speed-login', [DashboardController::class, 'login']);

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
