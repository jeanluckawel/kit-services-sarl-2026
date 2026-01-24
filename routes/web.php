<?php

use App\Http\Controllers\EmployeeController;
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


Route::patch('/employees/{employee}/disable', [EmployeeController::class, 'disable'])
    ->name('employee.disable');
Route::get('/employees/{employee}/view', [EmployeeController::class, 'show'])
    ->name('employee.view');




