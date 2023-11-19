<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest\CreateEmployeeRequest;
use App\Http\Requests\EmployeeRequest\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::get();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $validatedData = $request->validated();

        $existingEmployee = Employee::onlyTrashed()
            ->where('employee_id', $validatedData['employee_id'])
            ->first();

        if ($existingEmployee) {
            $existingEmployee->restore();
            $request->session()->flash('success', 'You have input duplicate employee_id, restore Employee successful!');
        } else {
            $employee = new Employee();
            $employee->create($validatedData);
            $request->session()->flash('success', 'Add Employee successful!');
        }

        return redirect()->route('employees.index');
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
        $employee = Employee::find($id);

        if (!$employee) {
            abort(404);
        }

        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            abort(404);
        }

        $validatedData = $request->validated();

        if ($employee->update($validatedData)) {
            $request->session()->flash('success', 'Update Employee Successful!');
        } else {
            $request->session()->flash('danger', 'Update Employee Error!');
        }

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            abort(404);
        }

        if ($employee->delete()) {
            $request->session()->flash('success', 'Delete Employee Successful!');
        } else {
            $request->session()->flash('danger', 'Delete Employee Error!');
        }

        return redirect()->route('employees.index');
    }
}
