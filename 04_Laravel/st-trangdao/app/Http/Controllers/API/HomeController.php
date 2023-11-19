<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function practice()
    {
        //1. Công ty Việt Tiến đã cung cấp những mặt hàng nào?
        $question1 = Supplier::with('products:company_id,product_name')
            ->where('company_name', 'LIKE', 'Công ty%Việt Tiến%')
            ->select('company_id', 'company_name')
            ->get();

        //2. Loại hàng thực phẩm do những công ty nào cung cấp, địa chỉ của công ty đó?
        $question2 = Product::joinCategory()
            ->joinSupplier()
            ->where('category_name', 'Thực phẩm')
            ->select('company_name', 'address')
            ->distinct()
            ->get();

        //3. Những khách hàng nào (tên giao dịch) đã đặt mua mặt hàng sữa hộp của công ty?
        $question3 = OrderDetail::joinOrder()
            ->joinProduct()
            ->join('customers', 'customers.id', 'orders.customer_id')
            ->where('product_name', 'LIKE', '%Sữa%')
            ->where('unit', 'Hộp')
            ->select('customers.id', 'company_name', 'transaction_name')
            ->distinct()
            ->get();

        //4. Đơn đặt hàng số 1 do ai đặt và do nhân viên nào lập, thời gian và địa điểm giao hàng là ở đâu?
        $question4 = Order::joinCustomer()
            ->joinEmployee()
            ->where('orders.id', 1)
            ->selectRaw("CONCAT(last_name,' ',first_name) AS employee, shipping_date, destination")
            ->get();

        //5. Hãy cho biết số tiền lương mà công ty phải trả cho mỗi nhân viên là bao nhiêu (lương=lương cơ bản+phụ cấp)?
        $question5 = Employee::selectRaw("CONCAT(last_name,' ',first_name) AS employee, (base_salary + allowance) AS salary ")
            ->get();

        //6. Trong đơn đặt hàng số 3 đặt mua những mặt hàng nào và số tiền mà khách hàng phải trả cho mỗi mặt hàng là bao nhiêu(số tiền phải trả=số lượng x giá bán – số lượng x mức giảm giá)?
        $question6 = OrderDetail::joinProduct()
            ->where('invoice_id', 3)
            ->selectRaw("product_name, (orderdetails.amount * (orderdetails.price - discount)) as money")
            ->get();

        //7. Hãy cho biết có những khách hàng nào lại chính là đối tác cung cấp hàng cho công ty (tức là có cùng tên giao dịch)?
        $question7 = Customer::joinSupplier()
            ->select('customers.company_name')
            ->get();

        //8. Trong công ty có những nhân viên nào có cùng ngày tháng năm sinh?
        $question8 = Employee::selectRaw("GROUP_CONCAT(last_name,' ',first_name SEPARATOR ' ,') AS employee, birthday")
            ->groupBy('birthday')
            ->havingRaw("count(*)>1")
            ->get();

        //9. Những đơn hàng nào yêu cầu giao hàng ngay tại công ty đặt hàng và những đơn đó là của công ty nào?
        $question9 = Order::joinCustomer()
            ->select('orders.id', 'company_name')
            ->whereRaw('customers.address = orders.destination')
            ->get();

        //10. Những mặt hàng nào chưa từng được khách hàng đặt mua?
        $question10 = Product::leftJoinOrderDetail()
            ->select('product_name')
            ->whereNull('orderdetails.product_id')
            ->get();

        //11. Những nhân viên nào của công ty chưa từng lập hóa đơn đặt hàng nào?
        $question11 = Employee::leftJoinOrder()
            ->whereNull('orders.employee_id')
            ->selectRaw("CONCAT(last_name,' ',first_name) AS employee")
            ->get();

        $results = [
            'question 1' => $question1,
            'question 2' => $question2,
            'question 3' => $question3,
            'question 4' => $question4,
            'question 5' => $question5,
            'question 6' => $question6,
            'question 7' => $question7,
            'question 8' => $question8,
            'question 9' => $question9,
            'question 10' => $question10,
            'question 11' => $question11,
        ];

        return response()->json($results);
    }
}
