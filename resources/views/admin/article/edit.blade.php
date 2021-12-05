@extends('admin.index')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link active" href="{{route('article.edit',$article->id)}}">Edit Post</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('article.index')}}">View All Posts</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-8">
                <form action=" {{route('article.update',$article->id)}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="" class="form-label">Post Photo</label>
                        <input type="file" class="form-control" name="photo" value="{{$article->photo}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Title</label>
                        <input type="text" class="form-control" name="title" value="{{$article->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Item</label>
                        <select name="category_id" id="" class="form-select" >
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$category->id ==$article->category_id ? "selected" : ""}}>{{$category->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Price</label>
                        <input type="text" class="form-control" name="price" value="{{$article->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Post Sale</label>
                        <select name="sale" id="" class="form-select">
                            <option value="promotion">Promotion</option>
                            <option value="limited">Limited</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Update Post">
                </form>
            </div>
        </div>
    </div>
@endsection