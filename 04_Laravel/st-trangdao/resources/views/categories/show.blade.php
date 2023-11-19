@extends('home')
@section('title', 'Show Details Category')
@section('pageName', 'Show Details Category')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Profile Details Category</h5>
        </div>
        <div class="card-body">
            <form href="{{ route('categories.show', ['category' => $category['id']]) }} ">
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">ID : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-categoryid2" class="input-group-text">
                            <i class='bx bx-id-card'></i>
                            {{ $category['id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Category ID : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-categoryid2" class="input-group-text">
                            <i class='bx bxs-barcode'></i>
                            {{ $category['category_id'] }}
                        </span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="html5-text-input" class="col-md-2 col-form-label">Category Name : </label>
                    <div class="col-md-10">
                        <span id="basic-icon-default-categoryname2"class="input-group-text">
                            <i class='bx bx-package'></i>
                            {{ $category['category_name'] }}
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
