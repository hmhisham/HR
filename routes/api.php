<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\API\Login\LoginController;
use \App\Http\Controllers\API\Attendance\AttendanceController;

Route::POST('Login',[LoginController::class,'login']);
// Route::POST('Attendance',[AttendanceController::class,'attendance']);
Route::get('/attendance/{calculator_number}', [AttendanceController::class, 'getAttendance']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});
