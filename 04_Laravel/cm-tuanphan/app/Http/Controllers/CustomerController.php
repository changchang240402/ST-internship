<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use View;
use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\EditCustomerRequest;

class CustomerController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý khách hàng');
    }

    public function index()
    {
        $customers = Customer::get();

        return view("admin.manages.customers.index" , compact("customers"));
    }

    public function store(CreateCustomerRequest $req)
    {
        $customer = Customer::create($req->all());

        if ($customer) {
            return redirect()->back()->with('success', 'Customer created successfully');
        } else {
            return redirect()->back()->withError('Customer creation failed');
        }
    }

    public function edit(string $customerID)
    {
        $customers = Customer::get();
        $editingCustomer = Customer::findOrFail($customerID);

        return view("admin.manages.customers.edit" , compact("customers" , "editingCustomer"));
    }

    public function update(EditCustomerRequest $req, string $id)
    {
        if(Customer::find($id)->update($req->all())) {
            return redirect()->back()->with('success', 'Edit customer successfully');
        } else {
            return redirect()->back()->withError('Editing customer failed');
        }
    }

    public function destroy(string $id)
    {
        Customer::findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Delete Customer With ID ' . $id . ' Successfully');
    }
}
