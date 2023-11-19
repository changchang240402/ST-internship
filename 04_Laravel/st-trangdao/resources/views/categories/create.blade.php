@extends('home')
@section('title', 'Create Category')
@section('pageName', 'Create Category')
@section('content')
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Create New Category</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-categoryid">Category ID</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-categoryid2" class="input-group-text">
                            <i class='bx bxs-barcode'></i>
                        </span>
                        <input type="text" class="form-control" id="basic-icon-default-categoryid" name="category_id"
                            value="{{ old('category_id') }}" placeholder="TP" aria-label="TP"
                            aria-describedby="basic-icon-default-categoryid2" />
                        @error('category_id')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-icon-default-categoryname">Category Name</label>
                    <div class="input-group input-group-merge">
                        <span id="basic-icon-default-categoryname2" class="input-group-text">
                            <i class='bx bx-package'></i>
                        </span>
                        <input type="text" id="basic-icon-default-categoryname" class="form-control"
                            name="category_name" value="{{ old('category_name') }}" placeholder="Thực phẩm"
                            aria-label="Thực phẩm" aria-describedby="basic-icon-default-categoryname2" />
                        @error('category_name')
                            <div class="invalid-feedback" style="display: block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route('categories.index') }}" type="button"
                    class="btn rounded-pill btn-outline-warning">Cancel</a>
                <button type="submit" class="btn rounded-pill btn-outline-success">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection
