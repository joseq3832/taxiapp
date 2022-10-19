<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/driver/{id}', [DriverController::class, 'show']);
Route::get('drivers', [DriverController::class, 'index']);
Route::post('driver/store', [DriverController::class, 'store']);

Route::get('/vehicle/{id}', [VehicleController::class, 'show']);
Route::get('/vehicles', [VehicleController::class, 'index']);
/* Route::resource('driver', DriverController::class); */
