<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/brands', [\App\Http\Controllers\ModelBrandController::class, 'all']);
Route::get('/scooters', [\App\Http\Controllers\ScooterController::class, 'all']);
Route::get('/scooters/category/{brand_id}', [\App\Http\Controllers\ScooterController::class, 'find_by_brand']);
Route::get('/scooter/{id}', [\App\Http\Controllers\ScooterController::class, 'scooter_info']);
Route::post('/validation', [\App\Http\Controllers\ReservationController::class, 'validate_reservation']);

