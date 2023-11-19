<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest\CreateSupplierRequest;
use App\Http\Requests\SupplierRequest\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::get();

        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        $validatedData = $request->validated();

        $existingSupplier = Supplier::onlyTrashed()
            ->where('company_id', $validatedData['company_id'])
            ->first();

        if ($existingSupplier) {
            $existingSupplier->restore();
            $request->session()->flash('success', 'You have input duplicate company_id, restore Supplier successful!');
        } else {
            $supplier = new Supplier();
            $supplier->create($validatedData);
            $request->session()->flash('success', 'Add Supplier successful!');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            abort(404);
        }

        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            abort(404);
        }

        $validatedData = $request->validated();

        if ($supplier->update($validatedData)) {
            $request->session()->flash('success', 'Update Supplier Successful!');
        } else {
            $request->session()->flash('danger', 'Update Supplier Error!');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            abort(404);
        }

        if ($supplier->delete) {
            $request->session()->flash('success', 'Delete Supplier Successful!');
        } else {
            $request->session()->flash('danger', 'Delete Supplier Error!');
        }

        return redirect()->route('suppliers.index');
    }
}
