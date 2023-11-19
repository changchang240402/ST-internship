@extends('layout.app')

@section('title', 'Edit Category')

@section('content')
    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="p-5">
            <h2 class="text-center">Edit Category</h2>
            <div class="mb-3">
                <label for="inputId" class="form-label">Category ID</label>
                <input value="{{ old('category_id', $category->category_id) }}" type="text" class="form-control"
                    id="inputId" name="category_id">
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Category Name</label>
                <input value="{{ old('category_name', $category->category_name) }}" type="text" class="form-control"
                    id="inputName" name="category_name">
                @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Modal Footer -->
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Edit Category</button>
        </div>

    </form>
@endsection
