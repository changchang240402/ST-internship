<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice()
    {
        return $this->exciseFour();
    }

    public function exciseOne()
    {
        $companyName = 'Công ty may mặc Việt Tiến';
        return Supplier::with('products')
            ->where('company_name', 'LIKE', "%$companyName%")
            ->get();
    }

    public function exciseTwo()
    {
        return Supplier::whereHas('products.category', function ($query) {
                $query->where('category_name', 'LIKE', '%Thực phẩm%');
            })
            ->select('company_id', 'company_name', 'address')
            ->get();
    }

    public function exciseThree()
    {
        return Customer::whereHas('orders.orderDetails.product', function ($query) {
            $query->where('product_name', 'LIKE', '%Sữa hộp%');
        })->distinct('transaction_name')->pluck('transaction_name');
    }

    public function exciseFour()
    {
        $order = Order::with(['customer','employee'])->find(1); 
        return [
            'Customer' => $order->customer,
            'Employee' => $order->employee,
            'Delivery Time' => $order->delivery_date,
            'Delivery Location' => $order->destination,
        ];
    }

    public function exciseFive()
    {
        return Employee::selectRaw(
            'id,
            first_name,
            last_name,
            (base_salary + allowance) AS total_salary'
        )
        ->get();
    }

    public function exciseSix()
    {
        $orderNumber = 3;
        return OrderDetail::where('invoice_id', $orderNumber)
        ->join('products', 'orderdetails.product_id', '=', 'products.product_id')
        ->selectRaw('products.product_name, orderdetails.amount * (orderdetails.price - orderdetails.discount) as total_amount')
        ->get();
    }

    public function exciseSeven()
    {
        return Customer::distinct()
            ->join('suppliers', 'customers.transaction_name' , '=' , 'suppliers.transaction_name')
            ->pluck('suppliers.company_name');
    }

    public function exciseEight()
    {
        return Employee::select('birthday')
            ->selectRaw('GROUP_CONCAT(CONCAT(first_name,last_name)) as name_employees')
            ->groupBy('birthday')
            ->havingRaw('COUNT(*) > 1')
            ->get();
    }

    public function exciseNine()
    {
        return Order::with('customer')
            ->whereHas('customer', function ($query) {
                $query->whereColumn('customers.address', '=', 'orders.destination');
            })
            ->get();
    }

    public function exciseTen()
    {
        return Product::doesntHave('orderDetails')->get();
    }

    public function exciseEleven()
    {
        return Employee::doesntHave('orders')->get();
    }
}
