@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('categories.index') }}">Categories</a> / </span>Details</h4>

    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Category details</h5>
            <a href="{{ route('categories.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <p>{{ $category->id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category ID</label>
                <div class="col-sm-10">
                    <p>{{ $category->category_id }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-10">
                    <p>{{ $category->category_name }}</p>
                </div>
            </div>
        </div>
    </div>

@stop
