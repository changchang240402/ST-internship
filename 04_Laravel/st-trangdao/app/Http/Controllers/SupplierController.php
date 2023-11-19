<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\CreateSupplierRequest;
use App\Http\Requests\Supplier\DeleteSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $suppliers = Supplier::all();

        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSupplierRequest $request)
    {
        $supplier = Supplier::create($request->validated());
        if ($supplier) {
            session()->flash('message', 'Successfully created!');
        } else {
            session()->flash('error', 'New creation failed!');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->validated());
        if ($supplier->wasChanged()) {
            session()->flash('message', 'Successfully updated!');
        } else {
            session()->flash('error', 'No changes made.');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSupplierRequest $request, string $id)
    {
        $supplier = Supplier::findOrFail($id);
        if ($supplier->delete($id)) {
            session()->flash('message', 'Successfully deleted!');
        } else {
            session()->flash('error', 'Deleted failed!');
        }

        return redirect()->route('suppliers.index');
    }

    public function getSuppliersWithProducts()
    {
        $suppliers = Supplier::with('products')->get();

        return SupplierResource::collection($suppliers);
    }
}
