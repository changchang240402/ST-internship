@extends('layouts.auth')

@section('content')
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 mb-2 text-gray-800">Add Function</h1>
            <div class="p-5">
                <form class="user" method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="category_id" class="form-control form-control-user"
                            placeholder="Category Id" value="{{ old('category_id') }}">
                        @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" name="category_name" class="form-control form-control-user"
                            placeholder=" Name" value="{{ old('category_name') }}">
                        @error('category_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="button-container">
                        <button type="submit" class="btn btn-primary">
                            Add
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </html>
@endsection
