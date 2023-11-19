<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Exception;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view("admin.pages.customer.index", compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $validated = $request->validated();
        try {
            Customer::create($validated);
        } catch (Exception $e) {
            return back()->with('error', 'Item created failed!');
        }
        return redirect()->route('customers.index')->with('success', 'Item created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view("admin.pages.customer.edit", compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id)
    {
        $validated = $request->validated();
        try {
            Customer::findOrFail($id)->update($validated);
        } catch (Exception $e) {
            return back()->with('error', 'Item update failed!');
        }
        return redirect()->route('customers.index')->with('success', 'Item update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Customer::findOrFail($id)->delete();
        return redirect()->route('customers.index');
    }
}
