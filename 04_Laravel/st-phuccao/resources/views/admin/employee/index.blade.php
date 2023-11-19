@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Employees</a>
@endsection

@section('title')
   <a href="#">Employees</a>
@endsection

@section('content')
<div class="col-12">
    @include('admin.layouts.alerts')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Employees</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Birthday</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Base Salary</th>
                        <th scope="col">Allowance</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($employees as $item)
                    <tr>
                    <th scope="row">{{$loop->index}}</th>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['last_name'] }}</td>
                        <td>{{ $item['first_name'] }}</td>
                        <td>{{ $item['birthday'] }}</td>
                        <td>{{ $item['start_date'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['base_salary'] }}</td>
                        <td>{{ $item['allowance'] }}</td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('employees.edit', ['employee' => $item['id']]) }}"
                                aria-expanded="false">
                                <i class="mdi mdi-account-edit"></i>
                                <span class="hide-menu">Edit</span>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('employees.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach   
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $employees->previousPageUrl() }}'" @if (!$employees->onFirstPage()) style="display:inline-block" @else style="display:none" @endif>
                    Previous
                </button>
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $employees->nextPageUrl() }}'" @if ($employees->hasMorePages()) style="display:inline-block" @else style="display:none" @endif>
                    Next
                </button>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"><a href="{{ route('employees.create') }}">Add Employee</a></button>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
