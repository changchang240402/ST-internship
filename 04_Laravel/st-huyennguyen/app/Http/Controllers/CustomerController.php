<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customers\CreateCustomerRequest;
use App\Http\Requests\Customers\DeleteCustomerRequest;
use App\Http\Requests\Customers\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected const PAGINATE_DEFAULT = 15;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(self::PAGINATE_DEFAULT);
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCustomerRequest $request)
    {
        $customer = new Customer();
        if ($customer->create($request->all())) {
            session()->flash('message', 'Create new customer was successful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = Customer::findOrFail($id);
        if ($customer->update($request->all())) {
            session()->flash('message', 'Update the customer was successful!');
        } else {
            session()->flash('error', 'Update the customer failed!');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
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
