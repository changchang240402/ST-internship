@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Add Category</a>
@endsection

@section('title')
   <a href="#">Add Category</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4" method="POST" action="{{ route('categories.store') }}">
                @csrf
                <div class="form-group">
                    <label for="category_name">Category ID</label>
                    <input type="text" class="form-control" id="category_id" name="category_id" value = "{{ old('category_id') }}">
                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" value = "{{ old('category_name') }}">
                    @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white" type="submit">Add</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
