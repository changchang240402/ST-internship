@extends('default')

@section('content')

    <h4 class="py-3 mb-4"><span class="text-muted fw-light"><a
                href="{{ route('categories.index') }}">Categories</a> / </span>Create</h4>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">New category</h5>
            <a href="{{ route('categories.index') }}"><i class='bx bx-arrow-back'></i></a>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('categories.store')}}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="category_id">Category ID</label>
                    <input value="{{ old('category_id') }}" name="category_id" type="text" class="form-control"
                           id="category_id"
                           placeholder="MP"/>
                    @error('category_id')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="category_name">Category Name</label>
                    <input value="{{ old('category_name') }}" name="category_name" type="text" class="form-control"
                           id="category_name"
                           placeholder="Mỹ phẩm"/>
                    @error('category_name')
                    <div class="invalid-feedback" style="display:block;">
                        {{ $message }}
                    </div>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@stop
