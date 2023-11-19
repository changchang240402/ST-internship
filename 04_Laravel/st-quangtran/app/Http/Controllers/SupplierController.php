<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\DeleteSupplierRequest;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(5);

        return view('admin.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(StoreSupplierRequest $request)
    {
        $supplier = new Supplier();

        if ($supplier->create($request->validated())) {
            session()->flash('message', 'Create new customer was successful!');
        } else {
            session()->flash('error', 'Create new supplier failed!');
        }

        return redirect()->route('suppliers.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(UpdateSupplierRequest $request, int $id)
    {
        $supplier = Supplier::findOrFail($id);

        if ($supplier->update($request->validated())) {
            session()->flash('message', 'Update the supplier was successful!');
        } else {
            session()->flash('error', 'Update the supplier failed!');
        }

        return redirect()->route('suppliers.index');
    }

    public function destroy(DeleteSupplierRequest $request, int $id)
    {
        $supplier = Supplier::findOrFail($id);
        
        if ($supplier->delete()) {
            session()->flash('message', 'Delete the supplier was successful!');
        } else {
            session()->flash('error', 'Delete the supplier failed!');
        }

        return redirect()->route('suppliers.index');
    }
}
