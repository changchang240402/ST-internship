@extends('layouts.auth')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Customer Information</h1>
                @if (session()->has('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Customer Table</h6>
                        <div class="ml-4">
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href = '{{ route('customers.create') }}';">Add</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Customer_Id</th>
                                        <th>Company Name</th>
                                        <th>Transaction Name</th>
                                        <th>Address</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Fax</th>
                                        <th>Button</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $customer['id'] }}</td>
                                            <td>{{ $customer['company_name'] }}</td>
                                            <td>{{ $customer['transaction_name'] }}</td>
                                            <td>{{ $customer['address'] }}</td>
                                            <td>{{ $customer['email'] }}</td>
                                            <td>{{ $customer['phone'] }}</td>
                                            <td>{{ $customer['fax'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="window.location.href = '{{ route('customers.edit', ['customer' => $customer['id']]) }}';">Edit</button>
                                                    <form class="user" method="POST"
                                                        action="{{ route('customers.destroy', ['customer' => $customer['id']]) }}">
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
                    </div>
                </div>

            </div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
@endsection
