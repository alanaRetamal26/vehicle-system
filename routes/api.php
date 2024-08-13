<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::post('vehicle', [VehicleController::class, 'store']);  // Ruta para POST
Route::get('vehicle/search', [VehicleController::class, 'search']);  // Ruta para GET búsqueda
Route::get('vehicles', [VehicleController::class, 'index']);  // Ruta para GET listar todos los vehículos
