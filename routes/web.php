<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Auth\AuthController;

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

Route::controller(\App\Http\Controllers\ImportExportController::class)->group(function(){
    Route::get('/', 'welcome');
    Route::get('import_export', 'importExport');
    Route::post('import', 'import')->name('import');
   // Route::post('employee/store', 'employeeStore')->name('employees.store');
});




Route::controller(AuthController::class)->group(function () {
    Route::get('/admin', 'loginForm');
    Route::post('/admin/login', 'login')->name('admin.login');
    Route::post('register', 'register');
    Route::get('logout', 'logout')->name('logout');
});

Route::resource('employee', EmployeeController::class);
Route::post('employee/search', [EmployeeController::class, 'employeeSearch'])->name('employee.search');


//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
