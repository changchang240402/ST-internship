<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('admin.pages.dashboard');
});

Route::get('dashboard', function () {
    return view("admin.pages.dashboard");
});

//customer
Route::resource('customers', CustomerController::class);

//category
Route::resource('categories', CategoryController::class);

//employee
Route::resource('employees', EmployeeController::class);

//supplier
Route::resource('suppliers', SupplierController::class);


Route::get('practices/{number}', [HomeController::class, 'practice']);
