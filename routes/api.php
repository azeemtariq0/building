<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\OracleController;
use App\Http\Controllers\API\SMAAppController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

//apis to encapsulate sma app getuserinfo api
Route::post('storesmaapptoken', [SMAAppController::class, 'storeSMAAppToken']);
Route::get('getuserinfo/{fund_code}', [OracleController::class, 'getUserInfo']);
//end - apis to encapsulate sma app getuserinfo api

Route::apiResource('projects', ProjectController::class)->middleware('auth:api');
Route::apiResource('clientinfo', ProjectController::class)->middleware('auth:api');

//testing
Route::post('authenticateterminaluser', [OracleController::class, 'authenticateTerminalUser']);