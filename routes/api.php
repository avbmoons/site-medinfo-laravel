<?php

declare(strict_types=1);

// это рабочие юзы до установки бриз
use App\Http\Controllers\Api\DoctorApiController;
use App\Http\Controllers\DoctorSpecialityController;
use App\Http\Controllers\PharmaciesHasDrugsController;
use App\Http\Resources\DrugCollection;
use App\Models\Drug;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DrugController;
use \App\Http\Resources\PharmacyCollection;
use \App\Models\Subjects\Pharmacy;
use \App\Http\Resources\DoctorsCollection;
use \App\Models\Subjects\Doctor;
use \App\QueryBuilders\DrugsQueryBuilder;
use \App\Http\Controllers\Api\PharmacyApiController;
use \App\Http\Controllers\Api\PatientApiController;


// при установке бриз были только эти юзы
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/drugs', function () {
    return DrugCollection::collection(Drug::all());
});

Route::get('/doctors', [DoctorApiController::class, 'index']);

Route::get('/doctors/speciality/{id}', [DoctorApiController::class, 'getDoctorsWithSpeciality']);

Route::get('/doctors/{id}/receipts', [DoctorApiController::class, 'getDoctorWithReceipts']);

Route::get('/doctors/{id}/patients', [DoctorApiController::class, 'getDoctorWithPatientsWithReceipts']);


Route::get('/pharmacies', [PharmacyApiController::class, 'index']);

Route::get('/pharmacies/{id}/drugs', [PharmacyApiController::class, 'getDrugsWithPharmacy']);

Route::get('/pharmacies/drugs/{id}', [PharmacyApiController::class, 'getPharmaciesWithDrugs']);


Route::get('/patients', [PatientApiController::class, 'index']);

Route::get('/patients/{id}/receipts', [PatientApiController::class, 'getReceiptsWithPatient']);

Route::get('/receipts/{id}/pharmacies', [PatientApiController::class, 'getPharmaciesWithReceipt']);
