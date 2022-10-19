<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');


Route::get('/drivers', [DriverController::class, 'showDrivers'])->name('drivers');
Route::delete('/destroy/driver/{id}', [DriverController::class, 'destroy'])->name('driver.destroy');
Route::get('/driver/create', [DriverController::class, 'createDriver'])->name('driver.create');
Route::get('/driver/edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
Route::get('/driver/{id}', [DriverController::class, 'showDriver'])->name('driver');
Route::post('/store/driver', [DriverController::class, 'driverStore'])->name('driver.store');


Route::get('/vehicles', [VehicleController::class, 'showVehicles'])->name('vehicles');
