<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeExport;
use App\Http\Controllers\EmployeeImportController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//




// customers


Route::middleware(['auth','verified'])->group(function () {


    Route::get('/',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');



    Route::get('employee/create',[\App\Http\Controllers\EmployeeController::class,'create'])->name('employee.create');
    Route::post('employee/store',[\App\Http\Controllers\EmployeeController::class,'store'])->name('employee.store');
    Route::get('employee/list',[\App\Http\Controllers\EmployeeController::class,'list'])->name('employee.list');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
    Route::patch('/employees/{employee}/disable', [EmployeeController::class, 'disable'])->name('employee.disable');
    Route::get('/employees/{employee}/view', [EmployeeController::class, 'show'])->name('employee.view');

    Route::get('/employee/import', [EmployeeImportController::class, 'show'])->name('employee.import.show');
    Route::post('/employee/import', [EmployeeImportController::class, 'store'])->name('employee.import.store');

// export

    Route::get('/employee/export', [\App\Http\Controllers\EmployeeExport::class, 'show'])->name('employee.export.show');
    Route::get('/employee/export/download', [EmployeeExport::class, 'export'])->name('employee.export');

// search
    Route::get('/employees/search', [EmployeeController::class,'search'])
        ->name('employee.search');
// cdd and cdi
    Route::get('/employees/cdd', [EmployeeController::class,'cdd'])->name('employee.cdd');

    Route::get('/employees/cdi', [EmployeeController::class,'cdi'])->name('employee.cdi');

    Route::get('/employees/{id}/fin-contrat', [EmployeeController::class, 'finContrat'])
        ->name('employee.fin.contract');

    Route::get('/employees/{id}/certificat', [EmployeeController::class, 'certificat'])
        ->name('employee.certificat');


});

Route::middleware(['auth','verified'])->group(function () {
    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/{customer}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    });
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/customers/{customer}/invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');
    Route::post('/customers/{customer}/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/customers/search', [CustomerController::class, 'search'])->name('customer.search');
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/invoices/{invoice}/edit', [InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::put('/invoices/{invoice}', [InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('/invoices/{invoice}', [InvoiceController::class, 'destroy'])->name('invoices.destroy');
});

Route::middleware(['auth','verified'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}/update', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('users/search', [UserController::class, 'search'])->name('users.search');
});

Route::middleware(['auth', 'verified'])->group( function () {

    Route::get('/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('roles.index');


    Route::get('/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('roles.create');


    Route::post('/roles', [App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');



    Route::get('/roles/{role}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('roles.edit');


    Route::put('/roles/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('roles.update');


    Route::delete('/roles/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('/users/{user}/permissions', [UserController::class, 'editPermissions'])->name('users.editPermissions');
    Route::put('/users/{user}/permissions', [UserController::class, 'updatePermissions'])->name('users.updatePermissions');


});

require __DIR__.'/auth.php';
