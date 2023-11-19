<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest\DeleteEmployeeRequest;
use App\Http\Requests\EmployeeRequest\StoreEmployeeRequest;
use App\Http\Requests\EmployeeRequest\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();

        return view('sections.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sections.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = Employee::withTrashed()
            ->where('employee_id', $request->input('employee_id'))
            ->first();
        if ($employee && $employee->trashed()) {
            $employee->restore();
            session()->flash('status', 'Đã khôi phục dữ liệu thành công');
        } elseif ($employee->create($request->validated())) {
            session()->flash('status', 'Đã thêm dữ liệu thành công');
        }

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = DB::table('employees')->where('id', $id)->first();

        return view('sections.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);

        return view('sections.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, string $id)
    {
        $employee = new Employee();
        $isUpdated = $employee->update($request->validated());
        if ($isUpdated) {
            session()->flash('status', 'Đã sửa dữ liệu thành công');
        }

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteEmployeeRequest $request, string $id)
    {
        $employee = Employee::find($id);
        $isDeleted = $employee->delete();
        if ($isDeleted) {
            session()->flash('status', 'Đã xóa dữ liệu thành công');
        }

        return redirect()->route('employees.index');
    }
}
