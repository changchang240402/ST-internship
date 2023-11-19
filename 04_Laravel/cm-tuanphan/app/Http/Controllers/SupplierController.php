<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use View;
use App\Http\Requests\Suppliers\CreateSupplierRequest;
use App\Http\Requests\Suppliers\EditSupplierRequest;
use DB;

class SupplierController extends Controller
{
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý nhà cung cấp');
    }

    public function index()
    {
        $suppliers = Supplier::get();

        return view("admin.manages.suppliers.index" , compact("suppliers"));
    }

    private function generateNextCompanyID()
    {
        $maxCompanyID = Supplier::max('company_id');
        $nextCompanyID = str_pad((int)$maxCompanyID + 1, 3, '0', STR_PAD_LEFT);

        return $nextCompanyID;
    }

    public function store(CreateSupplierRequest $req)
    {
        // dd(array_merge($req->except("_token") , ["company_id" => $this->generateNextCompanyId()]));
        $supplier = Supplier::create(array_merge($req->all() , ["company_id" => $this->generateNextCompanyID()]));
        if ($supplier) {
            return redirect()->back()->with('success', 'Supplier created successfully');
        } else {
            return redirect()->back()->withError('Supplier creation failed');
        }
    }

    public function edit(string $supplierID)
    {
        $suppliers = Supplier::get();
        $editingSupplier = Supplier::findOrFail($supplierID);

        return view("admin.manages.suppliers.edit" , compact("suppliers" , "editingSupplier"));
    }

    public function update(EditSupplierRequest $req, string $id)
    {
        if(Supplier::find($id)->update($req->all())) {
            return redirect()->back()->with('success', 'Edit supplier successfully');
        } else {
            return redirect()->back()->withError('Editing supplier failed');
        }
    }

    public function destroy(string $id)
    {
        Supplier::findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Delete Supplier With ID ' . $id . ' Successfully');
    }
}
