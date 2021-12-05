@extends('admin.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link active" href="{{route('article.create')}}">Create New Post</a>
    </li>
    <li class="nav-item">
    <a class="nav-link" href="{{route('article.index')}}">View All Posts</a>
    </li>
</ul>
    <div class="container my-2">
        @if (session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        @if (session('update'))
            <div class="alert alert-success">{{session('update')}}</div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <form action=" {{route('article.store')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Post Photo</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo">
                        @error('photo')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Item</label>
                        <select name="category_id" id="" class="form-select">
                            @foreach ($categories as $category)
                                <option value=" {{$category->id}} ">{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                        @error('price')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Sale</label>
                        <select name="sale" id="" class="form-select">
                            <option value="promotion">Promotion</option>
                            <option value="limited">Limited</option>
                        </select>
                        @error('sale')
                            <div class="text-danger"> {{$message}} </div>
                        @enderror
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Create Post">
                </form>
            </div>
        </div>
    </div>
@endsection