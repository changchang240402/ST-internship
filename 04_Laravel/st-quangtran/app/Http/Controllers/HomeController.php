<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Supplier;
use DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice($number)
    {
        $numberExercise = 'exercise' . $number;

        return $this->$numberExercise();
    }

    // 1. Công ty Việt Tiến đã cung cấp những mặt hàng nào?
    public function exercise1()
    {
        $companyName = 'Công Ty Việt Tiến';

        $product = Supplier::with('products')
            ->where('company_name', 'LIKE', "%$companyName%")
            ->get();

        return $product;
    }

    // 2. Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
    public function exercise2()
    {
        $categoryName = 'Thực phẩm';

        $suppliers = Supplier::join('products', 'suppliers.company_id', '=', 'products.company_id')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where('categories.category_name', 'LIKE', '%' . $categoryName . '%')
            ->distinct()
            ->get();

        return $suppliers;
    }

    // 3. Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
    public function exercise3()
    {
        $productName = 'quasi';

        $customers = Customer::join('orders', 'customers.id', '=', 'orders.customer_id')
            ->join('order_details', 'orders.id', '=', 'order_details.invoice_id')
            ->join('products', 'order_details.product_id', '=', 'products.product_id')
            ->where('products.product_name', 'LIKE', '%' . $productName . '%')
            ->distinct()
            ->get();

        return $customers;
    }

    // 4. Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
    public function exercise4()
    {
        $invoiceId = 1;

        $firstOrder = Order::join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('employees', 'employees.id', '=', 'orders.customer_id')
            ->where('orders.id', '=', $invoiceId)
            ->select(['customers.company_name', 'orders.delivery_date', 'orders.destination'])
            ->selectRaw('CONCAT(employees.first_name," ", employees.last_name) as full_name')
            ->get();

        return $firstOrder;
    }

    // 5. Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)?
    public function exercise5()
    {
        $employeesWithSalary = Employee::selectRaw('id, CONCAT(first_name, " ", last_name) as full_name, (base_salary + allowance) as salary')->get();

        return $employeesWithSalary;
    }

    // 6. Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu(số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
    public function exercise6()
    {
        $orderNumber = 3;

        $results = OrderDetail::selectRaw('invoice_id, product_id, (price - discount ) * amount as totalPrice')
            ->where('invoice_id', $orderNumber)
            ->get();

        return $results;
    }

    // 7.Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty (tức là có cùng tên giao dịch)?
    public function exercise7()
    {
        $customerIsSupplier = Customer::join('suppliers', 'customers.transaction_name', '=', 'suppliers.transaction_name')->get();

        return $customerIsSupplier;
    }

    // 8. Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
    public function exercise8()
    {
        $employees = Employee::selectRaw('birthday, GROUP_CONCAT(CONCAT(first_name, " ", last_name)) as full_names')
            ->groupBy('birthday')
            ->havingRaw('COUNT(*) > 1')
            ->get();

        return $employees;
    }

    // 9.Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
    public function exercise9()
    {
        $orders = Order::join('customers', 'orders.destination', '=', 'customers.address')
            ->select('orders.*')
            ->with('customer')
            ->get();

        return $orders;
    }

    // 10. Những mặt hàng nào chưa từng được khách hàng đặt mua?
    public function exercise10()
    {
        $productsNotOrdered = Product::leftJoin('order_details', 'products.product_id', '=', 'order_details.product_id')
            ->whereNull('order_details.invoice_id')
            ->select('products.*')
            ->get();

        return $productsNotOrdered;
    }

    // 11. Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
    public function exercise11()
    {
        $employeesWithoutOrders = Employee::leftJoin('orders', 'employees.employee_id', '=', 'orders.employee_id')
            ->whereNull('orders.id')
            ->select('employees.employee_id')
            ->selectRaw('CONCAT(first_name, " ", last_name) as full_name')
            ->get();

        return $employeesWithoutOrders;
    }
}
