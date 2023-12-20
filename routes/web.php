<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;


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
//     return view('child');
// });



Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('employees/create',[EmployeeController::class,'create']) ->name('employees.create');

Route::post('employees',[EmployeeController::class,'store'])->name('employees.store');
Route::get('employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');

Route::put('employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
Route::delete('employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');


// Route::get('add_department', [DepartmentController::class, 'add_department']);
// Route::get('add_employee/{id}', [EmployeeController::class, 'add_employee']);


      
