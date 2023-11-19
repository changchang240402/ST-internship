@extends('layout.app')
@section('title', 'Edit Category')
@section('PageName', 'Edit Category')
@section('content')
    <div class="card-header pb-0">
        <h6>Edit Category</h6>
    </div>
    <form action="{{ route('categories.update', ['category' => $category['id']]) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="hidden" name="id" value="{{ $category['id'] }}">
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category ID</label>
            @error('category_id')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="category_id" class="form-control" type="text"
                value="{{ old('category_id', $category['category_id']) }}">
        </div>
        <div class="form-group">
            <label for="example-text-input" class="form-control-label">Category Name</label>
            @error('category_name')
                <span class="text-danger fst-italic fs-7">{{ $message }}</span>
            @enderror
            <input name="category_name" class="form-control" type="text"
                value="{{ old('category_name', $category['category_name']) }}">
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
