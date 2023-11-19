<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Supplier;

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
    }

    /**
     * 1. Công ty Việt Tiến đã cung cấp những mặt hàng nào?
     */
    public function exercise1()
    {
        $suppliers = Supplier::with('products')
            ->where('company_name', 'LIKE', '%Công ty%Việt Tiến%')
            ->first();
        dump($suppliers);
    }

    /**
     * 2. Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
     */
    public function exercise2()
    {
        $typeProduct = Supplier::joinProducts()
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->distinct()
            ->where('categories.category_name', '=', 'thực phẩm')
            ->get(['suppliers.company_id', 'suppliers.company_name', 'suppliers.address']);
        dump($typeProduct);
    }

    /**
     * 3. Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
     */
    public function exercise3()
    {
        $customerOrderMilk = Order::joinOrderDetails()
            ->joinCustomers()
            ->join('products', 'products.product_id', '=', 'orderdetails.product_id')
            ->where('products.product_name', 'LIKE', '%Sữa hộp%')
            ->distinct()
            ->get(['customers.transaction_name']);
        dump($customerOrderMilk);
    }

    /**
     * 4. Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm
     * giao hàng là ở đâu?
     */
    public function exercise4()
    {
        $firstOrder = Order::joinCustomers()
            ->joinEmployees()
            ->where('orders.id', '=', 1)
            ->select(['customers.company_name', 'orders.delivery_date', 'orders.destination'])
            ->selectRaw('CONCAT(employees.first_name," ", employees.last_name) as full_name')
            ->get();
        dump($firstOrder);
    }

    /**
     * 5. Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu
     * (lương=lương cơ bản+phụ cấp)?
     */
    public function exercise5()
    {
        $employeesSalary = Employee::select(['id'])
            ->selectRaw('CONCAT(employees.first_name," ", employees.last_name) as full_name')
            ->selectRaw('base_salary + IFNULL(allowance, 0) as salary')
            ->get();
        dump($employeesSalary);
    }

    /**
     * 6. Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải
     * trả cho mỗi mặt hàng là bao nhiêu (số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
     */
    public function exercise6()
    {
        $orderTotalPrice = OrderDetail::joinProducts()
            ->select('products.product_name')
            ->selectRaw('orderdetails.amount * (orderdetails.price - IFNULL(orderdetails.discount, 0)) as total_price')
            ->where('orderdetails.invoice_id', 3)
            ->get();
        dump($orderTotalPrice);
    }

    /**
     * 7. Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho
     * công ty (tức là có cùng tên giao dịch)?
     */
    public function exercise7()
    {
        $customerIsSupplier = Supplier::joinCustomers()
            ->get();
        dump($customerIsSupplier);
    }

    /**
     * 8. Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
     */
    public function exercise8()
    {
        $sameBirthday = Employee::select('birthday')
            ->selectRaw('GROUP_CONCAT(first_name, " ", last_name SEPARATOR ", ") as full_name')
            ->groupBy('birthday')
            ->havingRaw('COUNT(*) > 1')
            ->orderBy('birthday')
            ->get();
        dump($sameBirthday);
    }

    /**
     * 9. Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và
     * những đơn đó là của công ty nào?
     */
    public function exercise9()
    {
        $destinationIsAddress = Order::joinCustomers()
            ->select('orders.id', 'orders.customer_id', 'customers.company_name')
            ->whereRaw('customers.address = orders.destination')
            ->get();
        dump($destinationIsAddress);
    }

    /**
     * 10. Những mặt hàng nào chưa từng được khách hàng đặt mua?
     */
    public function exercise10()
    {
        $deadStock = Product::doesntHave('orderdetails')
            ->get();
        dump($deadStock);
    }

    /**
     * 11. Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
     */
    public function exercise11()
    {
        $badEmployee = Employee::doesntHave('orders')
            ->select('employee_id')
            ->selectRaw('CONCAT(first_name, " ", last_name) as full_name')
            ->get();
        dump($badEmployee);
    }
}
