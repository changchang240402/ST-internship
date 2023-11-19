<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest\DeleteSupplierRequest;
use App\Http\Requests\SupplierRequest\StoreSupplierRequest;
use App\Http\Requests\SupplierRequest\UpdateSupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return view('sections.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        $supplier = Supplier::withTrashed()
            ->where('company_id', $request->input('company_id'))
            ->first();
        if ($supplier && $supplier->trashed()) {
            $supplier->restore();
            session()->flash('status', 'Đã khôi phục dữ liệu thành công');
        } elseif ($supplier->create($request->validated())) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('sections.supplier.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);

        return view('sections.supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, string $id)
    {
        $supplier = Supplier::find($id);
        $isUpdated = $supplier->update($request->validated());
        if ($isUpdated) {
            session()->flash('status', 'Đã sửa dữ liệu thành công');
        }

        return redirect()->route('suppliers.index', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteSupplierRequest $request, string $id)
    {
        $supplier = Supplier::find($id);
        $isDeleted = $supplier->delete();
        if ($isDeleted) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('suppliers.index');
    }
}
