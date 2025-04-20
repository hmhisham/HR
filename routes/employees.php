<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employees\EmployeesController;

Route::group(['prefix' => 'employees', 'as' => 'employees.'], function () {
    Route::get('/', [EmployeesController::class, 'index'])->name('index');
    Route::get('/import', [EmployeesController::class, 'import'])->name('import');
    Route::get('/list', [EmployeesController::class, 'list'])->name('list');
    Route::get('/{employee}', [EmployeesController::class, 'show'])->name('show');
});
