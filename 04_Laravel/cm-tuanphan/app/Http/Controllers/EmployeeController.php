<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use View;
use App\Http\Requests\Employees\CreateEmployeeRequest;
use App\Http\Requests\Employees\EditEmployeeRequest;

class EmployeeController extends Controller
{
    const DEFAULT_EMPLOYEE_ID = '0001';
    public function __construct()
    {
        View::share('pageTitle', 'Quản lý nhân viên');
    }

    public function index()
    {
        $employees = Employee::get();

        return view("admin.manages.employees.index" , compact("employees"));
    }

    private function generatenextEmployeeID()
    {
        $maxEmployeeID = Employee::max('employee_id');
        if ($maxEmployeeID === null) {
            $nextEmployeeID = DEFAULT_EMPLOYEE_ID;
        } else {
            $nextEmployeeID = str_pad((int)$maxEmployeeID + 1, 4, '0', STR_PAD_LEFT);
        }
        while (Employee::where('employee_id', $nextEmployeeID)->exists()) {
            $nextEmployeeID = str_pad((int)$nextEmployeeID + 1, 4, '0', STR_PAD_LEFT);
        }
    
        return $nextEmployeeID;
    }

    public function store(CreateEmployeeRequest $req)
    {
        $employee = Employee::create(array_merge($req->all() , ['employee_id' => $this->generatenextEmployeeID()]));

        if ($employee) {
            return redirect()->back()->with('success', 'Employee created successfully');
        } else {
            return redirect()->back()->withError('Employee creation failed');
        }
    }

    public function edit(string $employeeID)
    {
        $employees = Employee::get();
        $editingEmployee = Employee::findOrFail($employeeID);

        return view("admin.manages.employees.edit" , compact("employees" , "editingEmployee"));
    }

    public function update(EditEmployeeRequest $req, string $id)
    {
        if(Employee::find($id)->update($req->all())) {
            return redirect()->back()->with('success', 'Edit employee successfully');
        } else {
            return redirect()->back()->withError('Editing employee failed');
        }
    }

    public function destroy(string $id)
    {
        Employee::findOrFail($id)->delete();
        
        return redirect()->back()->with('success', 'Delete Employee With ID ' . $id . ' Successfully');
    }
}
