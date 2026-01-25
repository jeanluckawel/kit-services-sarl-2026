<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeExport;
use App\Http\Controllers\EmployeeImportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');

// Employee

Route::get('employee/create',[\App\Http\Controllers\EmployeeController::class,'create'])->name('employee.create');
Route::post('employee/store',[\App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
Route::get('employee/list',[\App\Http\Controllers\EmployeeController::class,'list'])->name('employee.list');
// web.php
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employee.update');



Route::patch('/employees/{employee}/disable', [EmployeeController::class, 'disable'])
    ->name('employee.disable');
Route::get('/employees/{employee}/view', [EmployeeController::class, 'show'])
    ->name('employee.view');

// import

Route::get('/employee/import', [EmployeeImportController::class, 'show'])->name('employee.import.show');
Route::post('/employee/import', [EmployeeImportController::class, 'store'])->name('employee.import.store');

// export

Route::get('/employee/export', [\App\Http\Controllers\EmployeeExport::class, 'show'])->name('employee.export.show');
Route::get('/employee/export/download', [EmployeeExport::class, 'export'])->name('employee.export');




