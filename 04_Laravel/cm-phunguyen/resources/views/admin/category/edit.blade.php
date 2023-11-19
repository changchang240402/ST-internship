@extends('layouts.auth')

@section('content')

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <h1 class="h3 mb-2 text-gray-800">Edit Function</h1>
                <div class="p-5">
                    <form class="user" method="POST"
                        action="{{ route('categories.update', ['category' => $category['id']]) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <h6>Category Id</h6>
                            <input type="text" name="category_id" class="form-control form-control-user"
                                placeholder="Category Id" value="{{ old('category_id', $category['category_id']) }}">
                            @error('category_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <h6>Category Name</h6>
                            <input type="text" name="category_name" class="form-control form-control-user"
                                placeholder="Category Name" value="{{ old('category_name', $category['category_name']) }}">
                            @error('category_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="button-container">
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                            <button type="button" class="btn btn-secondary"
                                onclick="window.location.href = '{{ route('categories.index') }}';">
                                Cancel
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
