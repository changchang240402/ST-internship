@extends('layout.app')

@section('title', 'Employees Management')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Employees Management
            <a class="btn btn-primary mx-5" href="{{ route('employees.create') }}">
                Add Employee
            </a>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('danger'))
            <div class="alert alert-danger" role="alert">
                {{ session('danger') }}
            </div>
        @endif
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Employee Id</th>
                        <th>last_name</th>
                        <th>first_name</th>
                        <th>birthday</th>
                        <th>start_date</th>
                        <th>address</th>
                        <th>phone date</th>
                        <th>base_salary</th>
                        <th>allowance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Employee Id</th>
                        <th>last_name</th>
                        <th>first_name</th>
                        <th>birthday</th>
                        <th>start_date</th>
                        <th>address</th>
                        <th>phone</th>
                        <th>base_salary</th>
                        <th>allowance</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->birthday }}</td>
                            <td>{{ $employee->start_date }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->base_salary }}</td>
                            <td>{{ $employee->allowance }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-success mx-3"
                                        href="{{ route('employees.edit', ['employee' => $employee->id]) }}">Edit</a>
                                    <form method="POST"
                                        action="{{ route('employees.destroy', ['employee' => $employee->id]) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this employee?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
