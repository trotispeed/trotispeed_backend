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


Route::post('/dashboard-login' , [DashboardController::class, 'post_login']);
Route::prefix('/dashboard')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/reservations/report' , [DashboardController::class, 'reservations']);
    Route::get('/reservations/queued' , [DashboardController::class, 'queued']);
    Route::get('/users' , [DashboardController::class, 'users']);
    Route::get('/roles' , [DashboardController::class, 'roles']);
    Route::get('/scooter' , [DashboardController::class, 'scooter']);
});

Route::get('/toriti-speed-login', [DashboardController::class, 'login']);

//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
