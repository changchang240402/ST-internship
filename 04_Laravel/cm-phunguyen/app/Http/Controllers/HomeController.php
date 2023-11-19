<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($id)
    {
        return $this->{'exercise' . $id}();
    }

    public function exercise1()
    {
        return Supplier::with('products')->where('company_name', 'like', '%' . 'Việt Tiến' . '%')->first();
    }

    public function exercise2()
    {
        return Product::select('company_name', 'address')
            ->distinct()
            ->whereHas('products.category', function ($query) {
                $query->where('category_name', 'Thực phẩm');
            })->get();
    }

    public function exercise3()
    {
        return Customer::select('transaction_name')
            ->whereHas('orders.orderDetails.product', function ($query) {
                $query->where('product_name', 'like', '%' . 'Sữa hộp' . '%');
            })->get();
    }

    public function exercise4()
    {
        return Order::select('id', 'customer_id', 'employee_id', 'shipping_date', 'destination')
            ->with('customer:id,address', 'employee:id,employee_id,first_name,last_name')
            ->where('id', 1)
            ->get();
    }

    public function exercise5()
    {
        return Employee::select('employee_id', 'first_name', 'last_name')
            ->selectRaw('base_salary + allowance as total_salary')
            ->get();
    }

    public function exercise6()
    {
        return Orderdetail::select('product_id')
            ->selectRaw('amount*price - amount*discount as paid_money')
            ->where('invoice_id', 3)
            ->get();
    }

    public function exercise7()
    {
        return Customer::distinct()->join(
            'suppliers',
            'customers.transaction_name',
            '=',
            'suppliers.transaction_name'
        )->pluck('suppliers.company_name');
    }

    public function exercise8()
    {
        return Employee::select('birthday')
            ->selectRaw('GROUP_CONCAT(CONCAT(first_name,last_name)) as name_employee')
            ->groupBy('birthday')
            ->havingRaw('COUNT(*) > 1')
            ->get();
    }

    public function exercise9()
    {
        return Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->whereColumn('customers.address', '=', 'orders.destination')
            ->select('customers.company_name')
            ->get();
    }

    public function exercise10()
    {
        return Product::select('products.product_name')
            ->leftJoin('orderdetails', 'products.product_id', '=', 'orderdetails.product_id')
            ->whereNull('orderdetails.product_id')
            ->get();
    }

    public function exercise11()
    {
        return Employee::leftJoin('orders', 'employees.employee_id', '=', 'orders.employee_id')
            ->whereNull('orders.id')
            ->select('*')
            ->get();
    }
}
