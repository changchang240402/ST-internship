<?php

use App\Http\Controllers\API\HomeController;
use App\Models\Category;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use App\Models\Order;
use App\Models\Product;

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
    return view('home');
})->name('home');

Route::resource('customers', CustomerController::class);

Route::resource('categories', CategoryController::class);

Route::resource('suppliers', SupplierController::class);

Route::resource('employees', EmployeeController::class);

//test relationships
Route::get('/chang', function () {
    $product = Product::find(3)->orderDetails;
    $orderdetail = Order::find(1)->orderDetails;
    $employee = Employee::find(5)->orders;
    $productByCategory = Category::find(4)->products;
    $results = [
        'product' => $product,
        'orderdetail' => $orderdetail,
        'employee' => $employee,
        'productByCategory' => $productByCategory
    ];
    return response()->json($results);
});

Route::get('/supplierWithProduct', [SupplierController::class, 'getSuppliersWithProducts']);

Route::get('/homeController', [HomeController::class, 'practice']);
