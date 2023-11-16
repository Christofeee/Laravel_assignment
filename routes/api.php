<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CarsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/get_cars",[CarsController::class,'get_cars']);
Route::post("/create_car",[CarsController::class,'create_car']);
Route::post("/update_car",[CarsController::class,'update_car']);
Route::post("/delete_car",[CarsController::class,'delete_car']);
