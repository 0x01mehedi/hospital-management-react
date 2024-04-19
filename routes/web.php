<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\LtestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
   
//     //return view('welcome');
// });

// Route::get('/',[UserController::class,'login']);
// Route::get('/dashboard',[HomeController::class,'dashboard']);


Route::resources([
    'users' => UserController::class,   
    'roles' => RoleController::class,   
    'patients' => PatientController::class,   
    'doctors' => DoctorController::class,   
    'prescriptions' => PrescriptionController::class,   
    'medicines' => MedicineController::class,   
    'appointments' => AppointmentController::class,   
    'departments' => DepartmentController::class,   
    'beds' => BedController::class,   
    'ltests' => LtestController::class   
]);

//Route::get("/roles/delete/{id}",[RoleController::class,"delete"]);
Route::get("/roles/delete/{id}",[RoleController::class,"delete"]);

Route::get("/patients/delete/{id}",[PatientController::class,"delete"]);

Route::get("/medicines/delete/{id}",[MedicineController::class,"delete"]);

Route::get("/appointments/delete/{id}",[AppointmentController::class,"delete"]);

Route::get("/doctors/delete/{id}",[DoctorController::class,"delete"]);
Route::get("/beds/delete/{id}",[BedController::class,"delete"]);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Route::get('api/doctors/{id}', 'PrescriptionController@getDoctors');
// Route::get('api/patients/{id}', 'PrescriptionController@getPatients');
// Route::get('api/medicines/{id}', 'PrescriptionController@getmedicines');
// Route::get('/api/users/{id}', [UserController::class, 'getUsers']);


// Route::get('/prescriptions', 'PrescriptionController@index')->name('prescriptions.index');


// Route::get('/api/doctors', 'ApiController@getDoctorInfo');
// Route::get('/api/patients', 'ApiController@getPatientInfo');

// Route::get('dropdownlist/getdoctors/{id}', [PrescriptionController::class , 'findDoctor']);
// Route::get('dropdownlist/getpatients/{id}', [PrescriptionController::class , 'findPatientDetails']);

