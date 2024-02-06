<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
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

// Route::get("/get_cars",[CarsController::class,'get_cars']);
// Route::post("/create_car",[CarsController::class,'create_car']);
// Route::post("/update_car",[CarsController::class,'update_car']);
// Route::post("/delete_car",[CarsController::class,'delete_car']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);
});

Route::group([

    'middleware' => ['api','auth:api'],
    'prefix' => 'auth'

], function ($router) {
    Route::get("/get_cars",[CarsController::class,'get_cars']);
    Route::post("/create_car",[CarsController::class,'create_car']);
    Route::post("/update_car",[CarsController::class,'update_car']);
    Route::post("/delete_car",[CarsController::class,'delete_car']);
});
Route::group(['middleware' => 'jwt'], function () {
    Route::get('/', [CarsController::class,'index']);
    Route::resource(name:'cars', controller:CarsController::class);
});