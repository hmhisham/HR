<?php

use Illuminate\Support\Facades\Route;
use App\Models\Graduations\Graduations;
use App\Http\Controllers\Areas\AreasController;
use App\Http\Controllers\Links\LinksController;

use App\Http\Controllers\Units\UnitsController;

use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\language\LanguageController;

use App\Http\Controllers\Sections\SectionsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Districts\DistrictsController;

use App\Http\Controllers\Employees\EmployeesController;

use App\Http\Controllers\Infooffice\InfoofficeController;
use App\Http\Controllers\Graduations\GraduationsController;
use App\Http\Controllers\Certificates\CertificatesController;
use App\Http\Controllers\Governorates\GovernoratesController;
use App\Http\Controllers\Specializations\SpecializationsController;
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

        // بيانات الموظف
        Route::RESOURCE('Employees', EmployeesController::class);
        // المحافظات I
        Route::RESOURCE('Governorates', GovernoratesController::class);
        // الاقضية I
        Route::RESOURCE('Districts', DistrictsController::class);
        // النواحي
        Route::RESOURCE('Areas', AreasController::class);
        // مكتب المعلومات
        Route::RESOURCE('Infooffice', InfoofficeController::class);
        //الارتباط
        Route::RESOURCE('Links', LinksController::class);
        //القسم
        Route::RESOURCE('Sections', SectionsController::class);
        //الشعبة
        Route::RESOURCE('Branch', BranchController::class);
        //الوحدات
        Route::RESOURCE('Units', UnitsController::class);
        //الشهادة
        Route::RESOURCE('Certificates', CertificatesController::class);
        //التخرج
        Route::RESOURCE('Graduations', GraduationsController::class);
        //الاختصاص
        Route::RESOURCE('Specializations', SpecializationsController::class);
    });
});

// locale
Route::get('language/{locale}', [LanguageController::class, 'swap']);
