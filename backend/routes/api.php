<?php

use App\Models\Enterprise;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\Api\SensorController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\EnterpriseController;
use App\Http\Controllers\Api\SensorDataController;
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


Route::group([
    'prefix' => 'auth'
], function() {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register']);
});

Route::middleware('auth:api')->group(function (){
    Route::get('/users',[UserController::class,'users']);
    // Route::get('/enterprises/{location}',[EnterpriseController::class,'locations'] );
});

Route::get('/enterprises',[EnterpriseController::class,'enterprises']);
Route::get('/locations',[LocationController::class,'locations']);
Route::get('/sensors',[SensorController::class,'sensors']);

Route::get('enterprises/{id}/locations',[LocationController::class,'locationEnt']);

Route::get('locations/{id}/sensors',[SensorController::class,'sensorLoc']);

Route::get('sensors/{id}/data',[SensorDataController::class,'dataSen']);

//fechafiltro

Route::get('filter_by_date',[SensorDataController::class,'filter_by_date']);

// Route::get('filterByDate/{$sensors_id}/{$startDate}/{$endDate}',[SensorDataController::class,'filtroFecha']);




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('empresa', [empresaController::class, 'index']);
// Route::get('/users',[ApiController::class, 'users']);
// Route::post('/login',[ApiController::class, 'login']);
    
// Route::post('/register',[UserController::class,'register']);
// Route::post('/login',[UserController::class,'userLogin']);  

