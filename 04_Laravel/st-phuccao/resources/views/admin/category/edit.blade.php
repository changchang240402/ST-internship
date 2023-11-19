@extends('admin.layouts.main')

@section('pageName')
   <a href="#">Edit Category</a>
@endsection

@section('title')
   <a href="#">Edit Category</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-body">
            <form class="form-horizontal mt-4" method="POST" action="{{ route('categories.update',['category' => $category['id']]) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" name="category_name" value = "{{ old('category_name',$category['category_name']) }}">
                    @error('category_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success text-white" type="submit">Update</button>
                    </div>
                </div>               
            </form>
        </div>
    </div>
</div>
@endsection
