<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\Supplier;

class HomeController extends Controller
{
    public function index($exercise)
    {
        $name = 'exercise' . $exercise;
        echo $this->$name();
    }

    public function exercise1()
    {
        $companyName = 'Việt Tiến';

        $productsBySupplierName = Supplier::where('company_name', 'like', "%$companyName%")
            ->firstOrFail()->products;

        return $productsBySupplierName;
    }

    public function exercise2()
    {
        $categoryName = 'Thực phẩm';

        $suppliersByCategory = Category::where('category_name', $categoryName)
            ->firstOrFail()
            ->products()
            ->with('supplier:company_id,company_name,address')
            ->get()->pluck('supplier');

        return $suppliersByCategory;
    }

    public function exercise3()
    {
        $productName = 'sữa hộp';

        $customersByProductName = Product::where('product_name', $productName)
            ->firstOrFail()
            ->orders()
            ->with('customer:id,transaction_name')
            ->get()->pluck('customer');
        return $customersByProductName;
    }

    public function exercise4()
    {
        $invoiceId = 1;

        $order = Order::find($invoiceId);

        return collect([
            'customer' => $order->customer->company_name,
            'employee' => $order->employee->Fullname,
            'shiping_date' => $order->shipping_date,
            'destination' => $order->destination
        ]);
    }

    public function exercise5()
    {
        $employeeSalaries = Employee::selectRaw('id, CONCAT(last_name, " ", first_name) as full_name, 
            (base_salary + allowance) as total_salary')
            ->get();

        return $employeeSalaries;
    }

    public function exercise6()
    {
        $invoice_id = 3;

        $productsByOrder = Order::find($invoice_id)
            ->products()
            ->selectRaw('products.product_name, 
            orderdetails.amount * (orderdetails.price - orderdetails.discount) as total_price')
            ->get();

        return $productsByOrder;
    }

    public function exercise7()
    {
        $customersIsSupplier = Customer::distinct()
            ->join('suppliers', 'suppliers.transaction_name', '=', 'customers.transaction_name')
            ->select('suppliers.company_name', 'suppliers.transaction_name')->get();

        return $customersIsSupplier;
    }

    public function exercise8()
    {
        $employeesWithSameBirthday = Employee::distinct()->groupBy('birthday')
            ->havingRaw('COUNT(*) > 1')
            ->select('birthday')
            ->selectRaw('GROUP_CONCAT(CONCAT(first_name, " ", last_name) SEPARATOR ", ") as employees')
            ->get();

        return $employeesWithSameBirthday;
    }

    public function exercise9()
    {
        $ordersWithMatchingAddress = Order::join('customers', 'orders.customer_id', '=', 'customers.id')
            ->select('orders.id', 'customers.id as customer_id', 'customers.company_name')
            ->whereColumn('orders.destination', '=', 'customers.address')
            ->get();

        return $ordersWithMatchingAddress;
    }

    public function exercise10()
    {
        $productsNotOrdered = Product::whereDoesntHave('orders')
            ->select('product_id', 'product_name')->get();

        return $productsNotOrdered;
    }

    public function exercise11()
    {
        $employeesNotOrdered = Employee::whereDoesntHave('orders')
            ->select('employee_id', 'last_name', 'first_name')->get();

        return $employeesNotOrdered;
    }
}
