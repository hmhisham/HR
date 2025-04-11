<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\Login\UsersLoginController;
use \App\Http\Controllers\API\Attendance\AttendanceController;
use App\Http\Controllers\API\Notifications\NotificationsController;



Route::post('/users/login', [UsersLoginController::class, 'login']);

 Route::post('Notifications/Worker-Notifications', [NotificationsController::class, 'WorkerNotifications']);
  Route::post('/Notifications/markAsReadAll', [NotificationsController::class, 'markAsReadAll']);
Route::post('Notifications/WorkerNotificationsCount', [NotificationsController::class, 'WorkerNotificationsCount']);

Route::post('Notifications/UnreadNotifications', [NotificationsController::class, 'UnreadNotifications']);


Route::get('/attendance/{calculator_number}', [AttendanceController::class, 'getAttendance']);


// Route::post('Worker-Unread-Notifications', [NotificationsController::class, 'unreadNotifications']);
// Route::post('markAsRead', [NotificationsController::class, 'markAsRead']);


// Route::POST('Private-Files',[PrivateEmployeeFilesController::class,'PrivateEmployeeFiles']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {

});
