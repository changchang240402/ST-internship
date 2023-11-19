<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest\DeleteCustomerRequest;
use App\Http\Requests\CustomerRequest\StoreCustomerRequest;
use App\Http\Requests\CustomerRequest\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();

        return view('sections.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $customer = new Customer();
        if ($customer->create($request->validated())) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::find($id);

        return view('sections.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::find($id);

        return view('sections.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);
        $isUpdated = $customer->update($request->validated());
        if ($isUpdated) {
            session()->flash('status', 'Đã sửa dữ liệu thành công');
        }

        return redirect()->route('customers.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCustomerRequest $request, string $id)
    {
        $customer = Customer::find($id);
        $isDeleted = $customer->delete();
        if ($isDeleted) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('customers.index');
    }
}
