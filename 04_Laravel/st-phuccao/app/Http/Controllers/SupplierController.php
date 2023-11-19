<?php

namespace App\Http\Controllers;

use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Http\Requests\Supplier\UpdateSupplierRequest;
use App\Models\Supplier;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Number of records displayed per page
        $perPage = 10;
        $suppliers = Supplier::paginate($perPage);
        return view('admin.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        try {
            Supplier::create($request->validated());
            session()->flash('success', 'Successfully added supplier!');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while adding supplier!');
        }
        return redirect()
            ->route('suppliers.create');
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
    public function edit(int $id)
    {
        return view('admin.supplier.edit', ['supplier' => Supplier::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, int $id)
    {
        try {
            $supplier = Supplier::findOrFail($id);
            $supplier->update($request->validated());
            session()->flash('success', 'Updated supplier information successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Updating employee information failed, Please try again!');
        }
        return redirect()
            ->route('suppliers.edit',$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Supplier::findOrFail($id)->delete();
            session()->flash('success', 'Supplier has been deleted successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Failed to delete customer. An error occurred. Please try again!');
        }
        return redirect()
            ->route('suppliers.index');
    }
}
