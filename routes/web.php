<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Events\EventsController;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\Settings\SettingsController;
use App\Http\Controllers\Customers\CustomersController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Districts\DistrictsController;
use App\Http\Controllers\Employees\EmployeesController;
use App\Http\Controllers\Slideshow\SlideshowController;
use App\Http\Controllers\Governorates\GovernoratesController;
use App\Http\Controllers\Users\UsersAccounts\UsersAccountsController;
use App\Http\Controllers\PermissionsRoles\Roles\AccountRolesController;
use App\Http\Controllers\Users\CustomersAccounts\CustomersAccountsController;
use App\Http\Controllers\PermissionsRoles\Permissions\AccountPermissionsController;
use App\Http\Controllers\Users\AdministratorsAccounts\AdministratorsAccountsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Dashboard


Route::middleware(['auth', config('jetstream.auth_session'), 'verified'])->group(function () {
Route::GET('/', [DashboardController::class, 'index'])->name('Dashboard');

    // Middleware Owners
    Route::middleware(['role:OWNER|Administrator|Supervisor'])->group(function () {
        // Roles & Permission
        Route::GROUP(['prefix' => 'Permissions&Roles'], function () {
            Route::RESOURCE('Account-Permissions', AccountPermissionsController::class);
            Route::RESOURCE('Account-Roles', AccountRolesController::class);
        });

        // Users Accounts
        Route::RESOURCE('Administrators-Accounts', AdministratorsAccountsController::class);
        Route::RESOURCE('Users-Accounts', UsersAccountsController::class);
        Route::RESOURCE('Customers-Accounts', CustomersAccountsController::class);

         // Employees Info
        Route::  RESOURCE('Employees', EmployeesController::class);
         // Governorates I
        Route::  RESOURCE('Governorates', GovernoratesController::class);
          // Districts I
        Route::  RESOURCE('Districts', DistrictsController::class);
    });
});

// locale
Route::get('language/{locale}', [LanguageController::class, 'swap']);
