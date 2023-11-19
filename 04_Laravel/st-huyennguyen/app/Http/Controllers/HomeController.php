<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Supplier;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function practice($id)
    {
        match ($id) {
            '1' => $this->exercise1(),
            '2' => $this->exercise2(),
            '3' => $this->exercise3(),
            '4' => $this->exercise4(),
            '5' => $this->exercise5(),
            '6' => $this->exercise6(),
            '7' => $this->exercise7(),
            '8' => $this->exercise8(),
            '9' => $this->exercise9(),
            '10' => $this->exercise10(),
            '11' => $this->exercise11(),
            default => dump("Not found exercise")
        };
        die();
    }

    // 1. Công ty Việt Tiến đã cung cấp những mặt hàng nào?
    public function exercise1()
    {
        $companyName = 'Việt Tiến';
        $suppliers = Supplier::with('products:company_id,product_name')
                                ->companyName($companyName)->get();

        foreach ($suppliers as $supplier) {
            dump('Company: ' . $supplier->company_name);
            foreach ($supplier->products as $product) {
                dump('Product name: ' . $product->product_name);
            }
        }
    }

    // 2. Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
    public function exercise2()
    {
        $categoryName = 'Thực phẩm';
        $suppliers = Supplier::distinct()
                                ->whereHas('products.category', fn ($query) => (
                                    $query->categoryName($categoryName)))
                                ->select('company_name', 'address')
                                ->get();

        foreach ($suppliers as $supplier) {
            dump('Company name: ' . $supplier->company_name . ' - Address: ' . $supplier->address);
        }
    }


    // 3. Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
    public function exercise3()
    {
        $productName = 'Sữa hộp';
        $orders = Order::whereHas('products', fn ($query) => (
                            $query->productName($productName)))
                        ->with('customer:id,transaction_name')
                        ->get();

        foreach ($orders as $order) {
            dump('Transaction name: ' . $order->customer?->transaction_name);
        }
    }


    // 4. Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
    public function exercise4()
    {
        $orderId = 1;
        $order = Order::with(['customer:id,transaction_name',
                                'employee:id,employee_id,last_name,first_name'])
                        ->find($orderId);

        $delivery_date = Carbon::parse($order->delivery_date)->format('H:i:s d/m/Y');
        dump('Customer name: ' . $order->customer->transaction_name);
        dump('Employee name: ' . $order->employee->full_name);
        dump('Delivery in: ' . $delivery_date);
        dump('Destination: ' . $order->destination);
    }

    /**
     * 5. Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu
     * (lương=lương cơ bản+phụ cấp)?
     */
    public function exercise5()
    {
        $employees = Employee::select('employee_id', 'last_name', 'first_name', 'base_salary', 'allowance')->get();

        foreach ($employees as $employee) {
            dump('Employee ID: ' . $employee->employee_id);
            dump('Employee name: ' . $employee->full_name);
            dump('Salary: ' . number_format($employee->salary));
        }
    }

    /**
     * 6. Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng
     * phải trả cho mỗi mặt hàng là bao nhiêu
     * (số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
     */
    public function exercise6()
    {
        $orderId = 3;
        $order = Order::with('products:id,product_id,product_name')
                                ->find($orderId);

        foreach ($order->products as $product) {
            dump('Product name: ' . $product->product_name . ', Price: ' . number_format($product->price_total));
        }
    }

    /**
     * 7. Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty?
     * (tức là có cùng tên giao dịch)
     */
    public function exercise7()
    {
        /**
         * Solution 1: join table
         */
        $companies = Customer::join('suppliers', 'suppliers.transaction_name', 'customers.transaction_name')
                                ->get();

        foreach ($companies as $company) {
            dump('Company name: ' . $company->company_name);
            dump('Transaction name: ' . $company->transaction_name);
        }

        /**
         * Solution 2:
         */
        $suppliers = Supplier::select('transaction_name')->get();
        $companies = Customer::select('transaction_name', 'company_name')
                                ->whereIn('transaction_name', $suppliers)
                                ->get();

        foreach ($companies as $company) {
            dump('Company name: ' . $company->company_name);
            dump('Transaction name: ' . $company->transaction_name);
        }
    }


    // 8. Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
    public function exercise8()
    {
        $employees = Employee::select('birthday')
                            ->selectRaw('GROUP_CONCAT(last_name, " " , first_name SEPARATOR ", ") AS list_employees')
                            ->groupBy('birthday')
                            ->havingRaw('COUNT(birthday) > 1')
                            ->orderBy('birthday')
                            ->get();

        foreach ($employees as $employee) {
            dump('Birthday: ' . $employee->birthday . ' - List Employee: ' . $employee->list_employees);
        }
    }

    /**
     * 9. Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
     * whereHas: retrieve all order that have destination like address customer.
     */
    public function exercise9()
    {
        $orders = Order::whereHas('customer', fn ($query) => (
                            $query->whereRaw('orders.destination = customers.address')))
                        ->with('customer:id,transaction_name')
                        ->get();

        foreach ($orders as $order) {
            dump('Order ID: ' . $order->id . ', Customer: ' . $order->customer->transaction_name);
        }
    }

    /**
     * 10. Những mặt hàng nào chưa từng được khách hàng đặt mua?
     * doesnHave('orders'): retrieve all products that don't have any orders.
     */
    public function exercise10()
    {
        $products = Product::doesntHave('orders')
                            ->select('product_id', 'product_name')
                            ->get();

        foreach ($products as $product) {
            dump('Product ID: ' . $product->product_id . ' - Product Name: ' . $product->product_name);
        }
    }

    /**
     * 11. Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
     * doesnHave('orders'): retrieve all employees that don't have any orders.
     */
    public function exercise11()
    {
        $employees = Employee::doesntHave('orders')
                                ->select('employee_id', 'last_name', 'first_name')
                                ->get();

        foreach ($employees as $employee) {
            dump('Employee ID: ' . $employee->employee_id . ' - Employee Name:' . $employee->full_name);
        }
    }
}
