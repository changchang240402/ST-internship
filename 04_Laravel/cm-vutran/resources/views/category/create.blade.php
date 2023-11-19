@extends('layout.app')

@section('title', 'Add Category')

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="p-5">
            <h2 class="text-center">Add Category</h2>
            <div class="mb-3">
                <label for="inputId" class="form-label">Category ID</label>
                <input value="{{ old('category_id') }}" type="text" class="form-control" id="inputId" name="category_id">
                @error('category_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Category Name</label>
                <input value="{{ old('category_name') }}" type="text" class="form-control" id="inputName"
                    name="category_name">
                @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="addEmployeeBtn">Add Category</button>
        </div>

    </form>
@endsection
