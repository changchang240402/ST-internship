<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\DeleteCustomerRequest;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::paginate(5);

        return view('admin.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customer.create');
    }

    public function store(StoreCustomerRequest $request)
    {
        $customer = new Customer();

        if ($customer->create($request->validated())) {
            session()->flash('message', 'Create new customer was successful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('customers.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customer.edit', compact('customer'));
    }

    public function update(UpdateCustomerRequest $request, int $id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->update($request->validated())) {
            session()->flash('message', 'Update the customer was successful!');
        } else {
            session()->flash('error', 'Update the customer failed!');
        }

        return redirect()->route('customers.index');
    }

    public function destroy(DeleteCustomerRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer->delete()) {
            session()->flash('message', 'Delete the customer was successful!');
        } else {
            session()->flash('error', 'Delete the customer failed!');
        }

        return redirect()->route('customers.index');
    }
}
