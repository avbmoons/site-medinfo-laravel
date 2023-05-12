<?php

declare(strict_types=1);

// это рабочие юзы до установки бриз
use App\Http\Controllers\DBTestController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\DrugController as AdminDrugController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ClinicController as AdminClinicController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\Doctor_reviewController as AdminDoctor_reviewController;
use App\Http\Controllers\Admin\MeetingController as AdminMeetingController;
use App\Http\Controllers\Admin\OrganizationController as AdminOrganizationController;
use App\Http\Controllers\Admin\OrganizationTypesController as AdminOrganizationTypesController;
use App\Http\Controllers\Admin\PatientController as AdminPatientController;
use App\Http\Controllers\Admin\PharmacyController as AdminPharmacyController;
use App\Http\Controllers\Admin\ReceiptController as AdminReceiptController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SpecialityController as AdminSpecialityController;
use App\Http\Controllers\Admin\Video_callController as AdminVideo_callController;
use App\Http\Controllers\Admin\DiagnosisController as AdminDiagnosisController;

use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\MessageController;

// при установке бриз был только этот юз
use Illuminate\Support\Facades\Route;



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
    return ['Laravel' => app()->version()];
});

require __DIR__ . '/auth.php';

Route::get('/', [MainController::class, 'index'])->name('main');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], static function () {
    Route::get('/', [AdminIndexController::class, 'index'])->name('admin');
    Route::resource('main', AdminMainController::class);
    Route::resource('drugs', AdminDrugController::class);
    Route::resource('messages', AdminMessageController::class);
    Route::resource('clinics', AdminClinicController::class);
    Route::resource('doctors', AdminDoctorController::class);
    Route::resource('doctor_reviews', AdminDoctor_reviewController::class);
    Route::resource('meetings', AdminMeetingController::class);
    Route::resource('organizations', AdminOrganizationController::class);
    Route::resource('organization_types', AdminOrganizationTypesController::class);
    Route::resource('patients', AdminPatientController::class);
    Route::resource('pharmacies', AdminPharmacyController::class);
    Route::resource('receipts', AdminReceiptController::class);
    Route::resource('services', AdminServiceController::class);
    Route::resource('specialities', AdminSpecialityController::class);
    Route::resource('video_calls', AdminVideo_callController::class);
    Route::resource('diagnoses', AdminDiagnosisController::class);

    Route::resource('users', AdminUserController::class);
});

Route::get('/drugs', [DrugController::class, 'index'])->name('drugs');
Route::get('/messages', [MessageController::class, 'index'])->name('messages');

Route::get('dbtest', DBTestController::class);
