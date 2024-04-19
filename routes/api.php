<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\MedicineController;
use App\Http\Controllers\Api\PrescriptionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\LtestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'patients' => PatientController::class,
    'doctors' => DoctorController::class,
    'medicines' => MedicineController::class,
    'users' => UserController::class,
    'ltests' => LtestController::class,
    'appointments' => AppointmentController::class,
    'departments' => DepartmentController::class,
    //'categories' => CategoryController::class,
    // 'customers' => CustomerController::class,
    // 'users' => UserController::class,
    //'uoms'=>UoMController::class,
    //'manufacturers'=>ManufacturerController::class,
    //'sections'=>SectionController::class
]);
// Route::get('api/doctors/{id}', 'PrescriptionController@getDoctors');
// Route::get('api/patients/{id}', 'PrescriptionController@getPatients');
// Route::get('api/medicines/{id}', 'PrescriptionController@getmedicines');
// Route::get('api/users/{id}', [UserController::class, 'show']);
// Route::apiResource('ltests', LtestController::class);



// Route::get('/api/patient/findDetails', [PrescriptionController::class, 'findPatientDetails'])->name('api.Patient.findDetails');
