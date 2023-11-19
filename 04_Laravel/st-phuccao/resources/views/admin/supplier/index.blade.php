@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Suppliers</a>
@endsection

@section('title')
   <a href="#">Supplier</a>
@endsection

@section('content')
<div class="col-12">
    @include('admin.layouts.alerts')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">List Suppliers</h4>
        </div>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Company ID</th>
                        <th scope="col">Company Name</th>
                        <th scope="col">Transaction Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Fax</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($suppliers as $item)
                    <tr>
                        <th scope="row">{{$loop->index}}</th>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['company_name'] }}</td>
                        <td>{{ $item['transaction_name'] }}</td>
                        <td>{{ $item['address'] }}</td>
                        <td>{{ $item['email'] }}</td>
                        <td>{{ $item['phone'] }}</td>
                        <td>{{ $item['fax'] }}</td>
                        <td>
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('suppliers.edit', ['supplier' => $item['id']]) }}"
                                aria-expanded="false">
                                <i class="mdi mdi-account-edit"></i>
                                <span class="hide-menu">Edit</span>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('suppliers.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this supplier?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
                </tbody>
            </table>
            <div class="text-center">
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $suppliers->previousPageUrl() }}'" @if (!$suppliers->onFirstPage()) style="display:inline-block" @else style="display:none" @endif>
                    Previous
                </button>
                <button class="btn btn-success text-white" onclick="window.location.href='{{ $suppliers->nextPageUrl() }}'" @if ($suppliers->hasMorePages()) style="display:inline-block" @else style="display:none" @endif>
                    Next
                </button>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <button class="btn btn-success text-white"> <a href="{{ route('suppliers.create') }}">Add Supplier</a> </button>
                </div>
            </div>   
        </div>
    </div>
</div>
@endsection
