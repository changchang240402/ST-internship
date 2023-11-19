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
                <h1 class="h3 mb-2 text-gray-800">Supplier Information</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Supplier Table</h6>
                        <div style="position: absolute; top: 10px; right: 0 ">
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href = '{{ route('suppliers.create') }}';">Add</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Company Id</th>
                                        <th>Company Name</th>
                                        <th>Transaction Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Fax</th>
                                        <th>Email</th>
                                        <th>Button</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $supplier['company_id'] }}</td>
                                            <td>{{ $supplier['company_name'] }}</td>
                                            <td>{{ $supplier['transaction_name'] }}</td>
                                            <td>{{ $supplier['address'] }}</td>
                                            <td>{{ $supplier['phone'] }}</td>
                                            <td>{{ $supplier['fax'] }}</td>
                                            <td>{{ $supplier['email'] }}</td>
                                            <td>
                                                <div class ="d-flex justify-content-around">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="window.location.href = '{{ route('suppliers.edit', ['supplier' => $supplier['id']]) }}';">Edit</button>
                                                    <form class="user" method="POST"
                                                        action="{{ route('suppliers.destroy', ['supplier' => $supplier['id']]) }}">
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
        </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
@endsection
