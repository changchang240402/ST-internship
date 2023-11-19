<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use App\Models\Customer;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Number of records displayed per page
        $perPage = 10;
        $customers = Customer::paginate($perPage);
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        try {
            Customer::create($request->validated());
            session()->flash('success', 'Successfully added customer!');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while adding customer!');
        }
        return redirect()
            ->route('customers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.customer.edit', ['customer' => Customer::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, int $id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->update($request->validated());
            session()->flash('success', 'Updated customer information successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Updating customer information failed, Please try again!');
        }
        return redirect()
            ->route('customers.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Customer::findOrFail($id)->delete();
            session()->flash('success', 'Customer has been deleted successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash->with('error', 'Failed to delete customer. An error occurred. Please try again!');
        }
        return redirect()
            ->route('customers.index');
    }
}
