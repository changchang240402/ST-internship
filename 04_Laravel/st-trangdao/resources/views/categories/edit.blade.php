@extends('home')
@section('title', 'Edit Category')
@section('pageName', 'Edit Category')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-header">Edit Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.update', ['category' => $category['id']]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ID</label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-categoryid2" class="fab fa-angular fa-lg text-danger me-1">
                            {{ $category['id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Category ID</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="category_id"
                            value="{{ old('category_id', $category['category_id']) }}" id="html5-text-input" />
                        @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="html5-search-input" class="col-md-2 col-form-label">Category Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="category_name"
                            value="{{ old('category_name', $category['category_name']) }}" id="html5-search-input" />
                        @error('category_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="" type="button" class="btn rounded-pill btn-outline-warning">Cancel</a>
                <input type="hidden" name="id" value="{{ $category['id'] }}">
                <button type="submit" class="btn rounded-pill btn-outline-success">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
