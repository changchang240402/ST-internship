<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\DeleteEmployeeRequest;
use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(5);

        return view('admin.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee();

        if ($employee->create($request->validated())) {
            session()->flash('message', 'Create employee successful!');
        } else {
            session()->flash('error', 'Create new customer failed!');
        }

        return redirect()->route('employees.index');
    }

    public function show(string $id)
    {
    }

    public function edit(int $id)
    {
        $employee = Employee::findOrFail($id);

        return view('admin.employee.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, int $id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->update($request->validated())) {
            session()->flash('message', 'Update employee successful!');
        } else {
            session()->flash('error', 'Update employee failed!');
        }

        return redirect()->route('employees.index');
    }

    public function destroy(DeleteEmployeeRequest $request, int $id)
    {
        $employee = Employee::findOrFail($id);

        if ($employee->delete()) {
            session()->flash('message', 'Delete employee successful!');
        } else {
            session()->flash('error', 'Delete employee failed!');
        }

        return redirect()->route('employees.index');
    }
}
