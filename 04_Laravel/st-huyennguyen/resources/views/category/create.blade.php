@extends('layout.app')
@section('title', 'Create Category')
@section('PageName', 'Create Category')
@section('content')
    <div class="card-header pb-0">
        <h6>Create New Category</h6>
    </div>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category ID</label>
            @error('category_id')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="category_id" class="form-control" type="text" value="{{ old('category_id') }}"
                placeholder="Enter category ID">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category Name</label>
            @error('category_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="category_name" class="form-control" type="text" value="{{ old('category_name') }}"
                placeholder="Enter category name">
        </div>
        <div class="form-group col-12 row">
            <div class="col-6">
                <a href="{{ url()->previous() }}" type="button" class="btn bg-gradient-danger">Cancel</a>
            </div>
            <div class="col-6 text-end">
                <input type="submit" value="submit" class="btn bg-gradient-dark mb-0">
            </div>
        </div>
    </form>
@endsection
