@extends('admin.index')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" href=" {{route('category.edit',$category->id)}} ">Edit Category</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href=" {{route('category.index')}} ">View All Categories</a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action=" {{route('category.update',$category->id)}} " method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value=" {{$category->category}} ">
                        @error('category')
                            <div class="text-danger">  {{$message}} </div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Update Category">
                </form>
            </div>
        </div>
    </div>
@endsection