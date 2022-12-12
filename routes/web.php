<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\Main\IndexController;

use App\Http\Controllers\Admin\Users\UserController;

use  App\Http\Controllers\Admin\Record\RecordController;

use App\Http\Controllers\Admin\PatientCard\PatientCardAdminController;

use App\Http\Controllers\Admin\ExaminationPatient\ExaminationPatientAdminController;

use App\Http\Controllers\Admin\DailyAccountings\DailyAccountingsAdminController;

use App\Http\Controllers\Admin\Services\ServicesController;

use App\Http\Controllers\Admin\Doctor\DoctorInfoController;

use App\Http\Controllers\Admin\Chart\ChartController;

use App\Http\Controllers\Admin\Clinic\ClinicController;





use App\Http\Controllers\Doctor\Main\DoctorController;

use App\Http\Controllers\Doctor\DailyAccountings\DailyAccountingsController;

use App\Http\Controllers\Doctor\PatientCard\PatientCardController;

use App\Http\Controllers\Doctor\ExaminationPatient\ExaminationPatientController;

use App\Http\Controllers\Doctor\Record\RecordDoctorController;


use App\Http\Controllers\User\UsersController;
use Symfony\Component\HttpKernel\DependencyInjection\ServicesResetter;

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

Route::get('/', function () {
    return view('welcome');
 });

//Route::get('/', [IndexController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::get('/admin', [UserController::class, 'index'])->name('admin');

    Route::get('/admin/users/index', [UserController::class, 'index'])->name('users');

    Route::get('/admin/users/create', [UserController::class, 'create'])->name('create-users');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('store-users');

    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('update-users');

    Route::post('/admin/users/destroy/{id}', [UserController::class, 'destroy'])->name('destroy-user');

    Route::get('/admin/record/index', [RecordController::class, 'index'])->name('record');

    Route::get('/admin/record/create', [RecordController::class, 'create'])->name('admin-create-record');
    Route::post('/admin/record/store', [RecordController::class, 'store'])->name('admin-store-record');
    Route::post('/admin/record/ajaxStore', [RecordController::class, 'ajaxStore'])->name('admin-ajaxStore-record');

    Route::post('/admin/record/destroy/{id}', [RecordController::class, 'destroy'])->name('admin-destroy-record');

    Route::get('/admin/record_doctor/index/{day?}/{month?}/{year?}', [RecordController::class, 'record_calendar'])->name('admin-record_doctor');


    Route::get('/admin/record_doctor/edit/{id}', [RecordController::class, 'edit'])->name('admin-edit-record_doctor');
    Route::post('/admin/record_doctor/update/{id}', [RecordController::class, 'update'])->name('admin-update-record_doctor');


    Route::get('/admin/doctor/index', [DoctorInfoController::class, 'index'])->name('admin-doctor');
    Route::get('/admin/doctor/show/{id}', [DoctorInfoController::class, 'show'])->name('admin-show-doctor');

    Route::get('/admin/doctor/create', [DoctorInfoController::class, 'create'])->name('admin-create-doctor');
    Route::post('/admin/doctor/store', [DoctorInfoController::class, 'store'])->name('admin-store-doctor');

    Route::get('/admin/doctor/edit/{id}', [DoctorInfoController::class, 'edit'])->name('admin-edit-doctor');
    Route::post('/admin/doctor/update/{id}', [DoctorInfoController::class, 'update'])->name('admin-update-doctor');

    Route::post('/admin/doctor/destroy/{id}', [DoctorInfoController::class, 'destroy'])->name('admin-destroy-doctor');


    Route::get('/admin/patient_card', [PatientCardAdminController::class, 'index'])->name('admin-patient_card');

    Route::get('/admin/patient_card/show/{id}', [PatientCardAdminController::class, 'show'])->name('admin-show-card');

    Route::get('/admin/patient_card/create', [PatientCardAdminController::class, 'create'])->name('admin-create-card');
    Route::post('/admin/patient_card/store', [PatientCardAdminController::class, 'store'])->name('admin-store-card');

    Route::get('/admin/patient_card/edit/{id}', [PatientCardAdminController::class, 'edit'])->name('admin-edit-card');
    Route::post('/admin/patient_card/update/{id}', [PatientCardAdminController::class, 'update'])->name('admin-update-card');

    Route::post('/admin/patient_card/destroy/{id}', [PatientCardAdminController::class, 'destroy'])->name('admin-destroy-card');


    Route::get('/admin/examination_patient/show/{id}', [ExaminationPatientAdminController::class, 'show'])->name('admin-show-examination');

    Route::get('/admin/examination_patient/create/{idCard}', [ExaminationPatientAdminController::class, 'create'])->name('admin-create-examination');
    Route::post('/admin/examination_patient/store/{idCard}', [ExaminationPatientAdminController::class, 'store'])->name('admin-store-examination');

    Route::get('/admin/examination_patient/edit/{id}', [ExaminationPatientAdminController::class, 'edit'])->name('admin-edit-examination');
    Route::post('/admin/examination_patient/update/{id}', [ExaminationPatientAdminController::class, 'update'])->name('admin-update-examination');

    Route::post('/admin/examination_patient/destroy/{id}', [ExaminationPatientAdminController::class, 'destroy'])->name('admin-destroy-examination');


    Route::get('/admin/daily_accountings', [DailyAccountingsAdminController::class, 'index'])->name('admin-daily_accountings');
    Route::get('/admin/daily_accountings/show/{id}', [DailyAccountingsAdminController::class, 'show'])->name('admin-show-accountings');

    Route::get('/admin/daily_accountings/create', [DailyAccountingsAdminController::class, 'create'])->name('admin-create-accountings');
    Route::post('/admin/daily_accountings/store', [DailyAccountingsAdminController::class, 'store'])->name('admin-store-accountings');

    Route::get('/admin/daily_accountings/edit/{id}', [DailyAccountingsAdminController::class, 'edit'])->name('admin-edit-accountings');
    Route::post('/admin/daily_accountings/update/{id}', [DailyAccountingsAdminController::class, 'update'])->name('admin-update-accountings');

    Route::post('/admin/daily_accountings/destroy/{id}', [DailyAccountingsAdminController::class, 'destroy'])->name('admin-destroy-accountings');


    Route::get('/admin/services', [ServicesController::class, 'index'])->name('admin-services');
    Route::get('/admin/services/show/{id}', [ServicesController::class, 'show'])->name('admin-show-services');

    Route::get('/admin/services/create', [ServicesController::class, 'create'])->name('admin-create-services');
    Route::post('/admin/services/store', [ServicesController::class, 'store'])->name('admin-store-services');

    Route::get('/admin/services/edit/{id}', [ServicesController::class, 'edit'])->name('admin-edit-services');
    Route::post('/admin/services/update/{id}', [ServicesController::class, 'update'])->name('admin-update-services');

    Route::post('/admin/services/destroy/{id}', [ServicesController::class, 'destroy'])->name('admin-destroy-services');


    Route::get('/admin/chart', [ChartController::class, 'index'])->name('admin-chart');

    Route::get('/admin/chart/create', [ChartController::class, 'create'])->name('admin-create-chart');
    Route::post('/admin/chart/store', [ChartController::class, 'store'])->name('admin-store-chart');

    Route::get('/admin/chart/edit/{id}', [ChartController::class, 'edit'])->name('admin-edit-chart');
    Route::post('/admin/chart/update/{id}', [ChartController::class, 'update'])->name('admin-update-chart');

    Route::post('/admin/chart/destroy/{id}', [ChartController::class, 'destroy'])->name('admin-destroy-chart');


    Route::get('/admin/clinic', [ClinicController::class, 'index'])->name('admin-clinic');

    Route::get('/admin/clinic/create', [ClinicController::class, 'create'])->name('admin-create-clinic');
    Route::post('/admin/clinic/store', [ClinicController::class, 'store'])->name('admin-store-clinic');

    Route::get('/admin/clinic/edit/{id}', [ClinicController::class, 'edit'])->name('admin-edit-clinic');
    Route::post('/admin/clinic/update/{id}', [ClinicController::class, 'update'])->name('admin-update-clinic');
});


















Route::group(['middleware' => ['auth', 'doctor']], function() {
    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');

    Route::get('/doctor/daily_accountings', [DailyAccountingsController::class, 'index'])->name('daily_accountings');

    Route::get('/doctor/daily_accountings/show/{id}', [DailyAccountingsController::class, 'show'])->name('show-accountings');

    Route::get('/doctor/daily_accountings/create', [DailyAccountingsController::class, 'create'])->name('create-accountings');
    Route::post('/doctor/daily_accountings/store', [DailyAccountingsController::class, 'store'])->name('store-accountings');

    Route::get('/doctor/daily_accountings/edit/{id}', [DailyAccountingsController::class, 'edit'])->name('edit-accountings');
    Route::post('/doctor/daily_accountings/update/{id}', [DailyAccountingsController::class, 'update'])->name('update-accountings');

    Route::post('/doctor/daily_accountings/destroy/{id}', [DailyAccountingsController::class, 'destroy'])->name('destroy-accountings');


    Route::get('/doctor/patient_card', [PatientCardController::class, 'index'])->name('patient_card');

    Route::get('/doctor/patient_card/show/{id}', [PatientCardController::class, 'show'])->name('show-card');

    Route::get('/doctor/patient_card/create', [PatientCardController::class, 'create'])->name('create-card');
    Route::post('/doctor/patient_card/store', [PatientCardController::class, 'store'])->name('store-card');


    Route::get('/doctor/examination_patient/create/{idCard}', [ExaminationPatientController::class, 'create'])->name('create-examination');
    Route::post('/doctor/examination_patient/store/{idCard}', [ExaminationPatientController::class, 'store'])->name('store-examination');

    Route::get('/doctor/examination_patient/show/{id}', [ExaminationPatientController::class, 'show'])->name('show-examination');


    Route::get('/doctor/record_doctor/index/{day?}/{month?}/{year?}', [RecordDoctorController::class, 'record_calendar'])->name('doctor-record_doctor');

    Route::get('/doctor/record_doctor/edit/{id}', [RecordDoctorController::class, 'edit'])->name('doctor-edit-record_doctor');
    Route::post('/doctor/record_doctor/update/{id}', [RecordDoctorController::class, 'update'])->name('doctor-update-record_doctor');
});


Route::get('/user/index', [UsersController::class, 'index'])->name('user');
Route::get('/user/doctors', [UsersController::class, 'doctors'])->name('doctors');
Route::get('/user/clinic', [UsersController::class, 'clinic'])->name('clinic');
Route::get('/user/services', [UsersController::class, 'services'])->name('services');
Route::get('/user/doctor/{id}', [UsersController::class, 'doctor'])->name('doctor');
Route::get('/user/servic/{id}', [UsersController::class, 'servic'])->name('servic');
Route::get('/user/contacts', [UsersController::class, 'contacts'])->name('contacts');















Auth::routes();


