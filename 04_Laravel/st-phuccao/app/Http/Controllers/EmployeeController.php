<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = 10; // Number of records displayed per page
        $employees = Employee::paginate($perPage); 
        return view('admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        try {
            Employee::create($request->validated());
            session()->flash('success', 'Successfully added employee!');
        } catch (Exception $e) {
            session()->flash('error', 'An error occurred while adding employee!');
        }
        return redirect()
            ->route('employees.index');
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
        return view('admin.employee.edit', ['employee' => Employee::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, int $id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->update($request->validated());
            session()->flash('success', 'Updated employee information successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Updating employee information failed, Please try again!');
        }
        return redirect()
            ->route('employees.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            Employee::findOrFail($id)->delete();
            session()->flash('success', 'Employee has been deleted successfully!');
        } catch (ModelNotFoundException $e) {
            session()->flash('error', 'Failed to delete customer. An error occurred. Please try again!');
        }
        return redirect()
            ->route('employees.index');
    }
}
