<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Supplier;

class HomeController extends Controller
{
    public function handleChooseQuestion($number)
    {
        $choosedQuestion = 'cau' . $number;
        return $this->$choosedQuestion();
    }

    /**
     * Công ty Việt Tiến đã cung cấp những mặt hàng nào ?
     */
    public function cau1()
    {
        $products = Supplier::where('company_name', 'Công ty Việt Tiến')->first()->products;
        return $products;
    }

    /**
     * Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó ?
     */
    public function cau2()
    {
        $suppliers = Supplier::whereHas('products.category', function ($query) {
            $query->where('category_name', 'LIKE', '%Thực phẩm%');
        })->get();
        return $suppliers;
    }

    /**
     * Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
     */
    public function cau3()
    {
        $suppliers = Customer::whereHas('orders.orderDetails.product', function ($query) {
            $query->where([
                ['product_name', 'LIKE', '%Sữa%'],
                ['unit', 'LIKE', '%Hộp%'],
            ]);
        })->get();
        return $suppliers;
    }

    /**
     * Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
     */
    public function cau4()
    {
        $order = Order::select('id', 'customer_id', 'employee_id', 'shipping_date')
            ->with('customer:id,company_name,address', 'employee:id,employee_id')
            ->where('id', 1)
            ->get();
        return $order;
    }

    /**
     * Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu
     * (lương=lương cơ bản+phụ cấp)
     */
    public function cau5()
    {
        $salaryForeachEmployee = Employee::selectRaw('last_name ,first_name, base_salary + allowance as salary')->get();
        return $salaryForeachEmployee;
    }

    /**
     * Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu
     */
    public function cau6()
    {
        $order = OrderDetail::selectRaw('invoice_id, product_id, (price - discount )*amount as totalPrice')
        ->where('invoice_id', 3)
        ->get();
        return $order;
    }


    /**
     * Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty
     */
    public function cau7()
    {
        $customers = Customer::join('suppliers', 'customers.transaction_name', '=', 'suppliers.transaction_name')
        ->get();
        return $customers;
    }

    /**
     * Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh
     */
    public function cau8()
    {
        $customers = Employee::selectRaw('birthday, GROUP_CONCAT(CONCAT(last_name, " ", first_name)) AS ListNhanVien')
            ->groupBy('birthday')
            ->havingRaw('COUNT(last_name) > 1')
            ->get();
        return $customers;
    }

    /**
     * Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào
     */
    public function cau9()
    {
        $orders = Order::join('customers',  'orders.customer_id', '=', 'customers.id')
            ->whereColumn('orders.destination', '=', 'customers.address')
            ->get();
        return $orders;
    }

    /**
     * Những mặt hàng nào chưa từng được khách hàng đặt mua
     */
    public function cau10()
    {
        $products = Product::doesntHave('orderDetails')->get();
        return $products;
    }

    /**
     * Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào
     */
    public function cau11()
    {
        $employees = Employee::doesntHave('orders')->get();
        return $employees;
    }
}
