<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\Login\LoginController;
use \App\Http\Controllers\API\Attendance\AttendanceController;
/*Attendance
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::POST('Attendance',[AttendanceController::class,'attendance']);
Route::POST('Login',[LoginController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});
