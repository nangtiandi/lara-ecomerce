@extends('admin.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link" href="{{route('article.create')}}">Create New Post</a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" href="{{route('article.index')}}">View All Posts</a>
    </li>
</ul>
<div class="container my-2">
    @if (session('delete'))
            <div class="alert alert-danger">{{session('delete')}}</div>
        @endif
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center fw-bolder">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Photo</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th colspan="2">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="text-center">
                            <td>{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->category->category}}</td>
                            <td><img src=" {{asset('storage/images/'.$article->photo)}} " alt="" height="100"></td>
                            <td>{{$article->sale}}</td>
                            <td>{{$article->price}}</td>
                            <td><a href=" {{route('article.edit',$article->id)}} " class="btn btn-warning">Edit</a></td>
                            <td>
                                <form action=" {{route('article.destroy',$article->id)}} " method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection