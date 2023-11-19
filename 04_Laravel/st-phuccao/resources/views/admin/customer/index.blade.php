@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Customers</a>
@endsection

@section('title')
   <a href="#">Customer</a>
@endsection

@section('content')
<div class="col-12">
    @include('admin.layouts.alerts')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Customers</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Transaction Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($customers as $item)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['company_name'] }}</td>
                        <td>{{ $item['transaction_name'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['fax'] }}</td>
                        <td>{{ $item['created_at'] }}</td>
                        <td>{{ $item['updated_at'] }}</td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('customers.edit', ['customer' => $item['id']]) }}"
                                aria-expanded="false">
                                <i class="mdi mdi-account-edit"></i>
                                <span class="hide-menu">Edit</span>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('customers.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $customers->previousPageUrl() }}'" @if (!$customers->onFirstPage()) style="display:inline-block" @else style="display:none" @endif>
                    Previous
                </button>
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $customers->nextPageUrl() }}'" @if ($customers->hasMorePages()) style="display:inline-block" @else style="display:none" @endif>
                    Next
                </button>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"><a href="{{ route('customers.create') }}">Add Customer</a></button>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
