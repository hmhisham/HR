<?php

//use App\Http\Livewire\Workers\Worker;
use Illuminate\Http\Request;
use App\Models\Workers\Workers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Areas\AreasController;
use App\Http\Controllers\Units\UnitsController;
use App\Http\Controllers\Wives\WivesController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Grades\GradesController;
use App\Http\Controllers\Iaccts\IacctsController;
use App\Http\Controllers\Inputs\InputsController;
use App\Http\Controllers\Itypes\ItypesController;
use App\Http\Controllers\Thanks\ThanksController;
use App\Http\Controllers\Coaches\CoachesController;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\Scaleas\ScaleasController;
use App\Http\Controllers\Scalems\ScalemsController;
use App\Http\Controllers\Workers\WorkersController;
use App\Http\Controllers\Certific\CertificController;
use App\Http\Controllers\Dispatch\DispatchController;
use App\Http\Controllers\Holidays\HolidaysController;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\Linkages\LinkagesController;
use App\Http\Controllers\Precises\PrecisesController;
use App\Http\Controllers\Sections\SectionsController;
use App\Http\Controllers\Services\ServicesController;
use App\Http\Controllers\Childrens\ChildrensController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Districts\DistrictsController;
use App\Http\Controllers\JobTitles\JobTitlesController;
use App\Http\Controllers\Penalties\PenaltiesController;
use App\Http\Controllers\Positions\PositionsController;
use App\Http\Controllers\Trainings\TrainingsController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Infooffice\InfoofficeController;
use App\Http\Controllers\Jobleavers\JobleaversController;
use App\Http\Controllers\Placements\PlacementsController;
use App\Http\Controllers\Specialtys\SpecialtysController;
use App\Http\Controllers\Penalties\WorkerSearchController;
use App\Http\Controllers\Graduations\GraduationsController;
use App\Http\Controllers\Technicians\TechniciansController;
use App\Http\Controllers\Certificates\CertificatesController;
use App\Http\Controllers\Governorates\GovernoratesController;
use App\Http\Controllers\Idepartments\IdepartmentsController;
use App\Http\Controllers\Typeholidays\TypeholidaysController;
use App\Http\Controllers\Typesservices\TypesservicesController;
use App\Http\Controllers\Specializations\SpecializationsController;
use App\Http\Controllers\Users\UsersAccounts\UsersAccountsController;
use App\Http\Controllers\PermissionsRoles\Roles\AccountRolesController;
use App\Http\Controllers\PrivateEmployeeFiles\PrivateEmployeeFilesController;
use App\Http\Controllers\Users\CustomersAccounts\CustomersAccountsController;
use App\Http\Controllers\PermissionsRoles\Permissions\AccountPermissionsController;
use App\Http\Controllers\Users\AdministratorsAccounts\AdministratorsAccountsController;
use App\Http\Controllers\Specializationclassification\SpecializationclassificationController;

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
    });

    // رفع الملفات
    Route::GET('Private-Employee-Files', [PrivateEmployeeFilesController::class, 'index'])->name('PrivateEmployeeFiles');

    // المحافظات
    Route::RESOURCE('Governorates', GovernoratesController::class);
    // الاقضية
    Route::RESOURCE('Districts', DistrictsController::class);
    // النواحي
    Route::RESOURCE('Areas', AreasController::class);
    // مكتب المعلومات
    Route::RESOURCE('Infooffice', InfoofficeController::class);
    //الارتباط
    Route::RESOURCE('Linkages', LinkagesController::class);
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
    //التخصص العام
    Route::RESOURCE('Specialtys', SpecialtysController::class);
    //التخصص الدقيق
    Route::RESOURCE('Precises', PrecisesController::class);
    //الدرجة
    Route::RESOURCE('Grades', GradesController::class);
    //العنوان الوظيفي
    Route::RESOURCE('Jobtitles', JobtitlesController::class);
    // الملاك السلم الوظيفي
    Route::RESOURCE('Scalems', ScalemsController::class);
    // العقود السلم الوظيفي
    Route::RESOURCE('Scaleas', ScaleasController::class);
    // سلم عقود الفنيين
    Route::RESOURCE('Technicians', TechniciansController::class);
    //مجال التدريب
    Route::RESOURCE('Trainings', TrainingsController::class);
    //نوع الاجازة
    Route::RESOURCE('Typeholidays', TypeholidaysController::class);
    //تصنيف التخصص
    Route::RESOURCE('Specializationclassification', SpecializationclassificationController::class);
    //نوع الخدمة
    Route::RESOURCE('Typesservices', TypesservicesController::class);
    // Route::  RESOURCE('Workers', WorkersController::class);
    // الدوائر
    Route::RESOURCE('Department', DepartmentController::class);
    // بيانات الموظف
    Route::GET('Workers', [WorkersController::class, 'index'])->name('Workers');
    Route::GET('AddWorker', [WorkersController::class, 'AddWorker'])->name('AddWorker');

    // التشكرات
    Route::RESOURCE('Thanks', ThanksController::class);
    //   Route::GET('Thanks', [ThanksController::class, 'index'])->name('Workers');


    // عقوبات
    Route::RESOURCE('Penalties', PenaltiesController::class);
    Route::GET('search', [WorkerSearchController::class, 'search'])->name('worker.search');
    // تاركي العمل
    Route::RESOURCE('Jobleavers', JobleaversController::class);
    // الايفادات
    Route::RESOURCE('Dispatch', DispatchController::class);
    // الشهادات
    Route::RESOURCE('Certific', CertificController::class);
    Route::GET('Certifi-Show/{id}', [CertificController::class, 'CertifiShow'])->name('Certifi-Show');
    // الاجازات
    Route::RESOURCE('Holidays', HolidaysController::class);
    // المدربين
    Route::RESOURCE('Coaches', CoachesController::class);
    // الدورات
    Route::RESOURCE('Courses', CoursesController::class);
    // الزوجية
    Route::RESOURCE('Wives', WivesController::class);
    // الاطفال
    Route::RESOURCE('Childrens', ChildrensController::class);
    // التنمسيب
    Route::RESOURCE('Placements', PlacementsController::class);
    Route::GET('Placement-Show/{id}', [PlacementsController::class, 'PlacementShow'])->name('Placement-Show');
    //المنصب
    Route::RESOURCE('Positions', PositionsController::class);
    //الخدمات
    Route::RESOURCE('Services', ServicesController::class);



    //===============المالية==================

    //اليومية
    Route::RESOURCE('Inputs', InputsController::class);
    //الدليل
    Route::RESOURCE('Iaccts', IacctsController::class);
    //الاقسام
    Route::  RESOURCE('Idepartments', IdepartmentsController::class);
    //انواع القيود
    Route::RESOURCE('Itypes', ItypesController::class);



    //استدعاء اسم الموظف في حق الموظف
    /*Route::get('/api/workers', function (Request $request) {
        $search = $request->input('q');
        $workers = Workers::where('full_name', 'LIKE', "%{$search}%")->select('id', 'full_name')->get();
        return response()->json($workers);
    });*/

    Route::get('/api/workers', function (Request $request) {
        $search = $request->input('q');
        $page = $request->input('page', 1);
        $perPage = 20; // عدد السجلات لكل صفحة

        $query = Workers::query();

        if ($search) {
            $query->where('full_name', 'LIKE', "%{$search}%");
        }

        $workers = $query->select('id', 'full_name')
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'items' => $workers->items(),
            'pagination' => [
                'more' => $workers->hasMorePages()
            ]
        ]);
    });
});

// locale
Route::get('language/{locale}', [LanguageController::class, 'swap']);
