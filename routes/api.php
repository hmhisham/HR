<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\API\Login\UsersLoginController;
use \App\Http\Controllers\API\Attendance\AttendanceController;
use App\Http\Controllers\API\Notifications\NotificationsController;
use App\Http\Controllers\API\employees\EmployeesController;



Route::post('/users/login', [UsersLoginController::class, 'login']);
Route::post('/users/update-token', [UsersLoginController::class, 'updateToken']);
Route::post('/users/change-password', [UsersLoginController::class, 'changePassword']);

Route::post('/employees/get-by-computer-number', [EmployeesController::class, 'getEmployeeByComputerNumber']);

Route::post('Notifications/Worker-Notifications', [NotificationsController::class, 'WorkerNotifications']);
Route::post('/Notifications/markAsReadAll', [NotificationsController::class, 'markAsReadAll']);
Route::post('Notifications/WorkerNotificationsCount', [NotificationsController::class, 'WorkerNotificationsCount']);

Route::post('Notifications/UnreadNotifications', [NotificationsController::class, 'UnreadNotifications']);


Route::get('/attendance/{calculator_number}', [AttendanceController::class, 'getAttendance']);


// Route::post('Worker-Unread-Notifications', [NotificationsController::class, 'unreadNotifications']);
// Route::post('markAsRead', [NotificationsController::class, 'markAsRead']);


// Route::POST('Private-Files',[PrivateEmployeeFilesController::class,'PrivateEmployeeFiles']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {});
