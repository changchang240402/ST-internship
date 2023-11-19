@extends('layout.app')

@section('title', 'suppliers Management')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            suppliers Management
            <a class="btn btn-primary mx-5" href="{{ route('suppliers.create') }}">
                Add supplier
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
                        {{-- <th>ID</th> --}}
                        <th>company_id</th>
                        <th>company_name</th>
                        <th>transaction_name</th>
                        <th>address</th>
                        <th>email</th>
                        <th>phone_number</th>
                        <th>fax</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>company_id</th>
                        <th>company_name</th>
                        <th>transaction_name</th>
                        <th>address</th>
                        <th>email</th>
                        <th>phone_number</th>
                        <th>fax</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->company_id }}</td>
                            <td>{{ $supplier->company_name }}</td>
                            <td>{{ $supplier->transaction_name }}</td>
                            <td>{{ $supplier->address }}</td>
                            <td>{{ $supplier->email }}</td>
                            <td>{{ $supplier->phone_number }}</td>
                            <td>{{ $supplier->fax }}</td>
                            <td>
                                <div class="d-flex">
                                    <a class="btn btn-success mx-3"
                                        href="{{ route('suppliers.edit', ['supplier' => $supplier->id]) }}">Edit</a>
                                    <form method="POST"
                                        action="{{ route('suppliers.destroy', ['supplier' => $supplier->id]) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this supplier?')">
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
