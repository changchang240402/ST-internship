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
                <h1 class="h3 mb-2 text-gray-800">Category Information</h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Category Table</h6>
                        <div class="ml-4">
                            <button type="button" class="btn btn-primary"
                                onclick="window.location.href = '{{ route('categories.create') }}';">Add</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Create at</th>
                                        <th>Update at</th>
                                        <th>Button</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $category['category_id'] }}</td>
                                            <td>{{ $category['category_name'] }}</td>
                                            <td>{{ $category['created_at'] }}</td>
                                            <td>{{ $category['updated_at'] }}</td>
                                            <td>
                                                <div class="d-flex justify-content-around">
                                                    <button type="button" class="btn btn-primary"
                                                        onclick="window.location.href = '{{ route('categories.edit', ['category' => $category['id']]) }}';">Edit</button>
                                                    <form class="user" method="POST"
                                                        action="{{ route('categories.destroy', ['category' => $category['id']]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
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
