@extends('admin.index')
@section('content')
<ul class="nav nav-tabs">
    <li class="nav-item">
    <a class="nav-link" href="{{route('category.create')}}">Create New Category</a>
    </li>
    <li class="nav-item">
    <a class="nav-link active" href="{{route('category.index')}}">View All Categories</a>
    </li>
</ul>
<div class="container my-2">
    @if (session('delete'))
        <div class="alert alert-danger">{{session('delete')}}</div>
    @endif
    
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Created Time</th>
                        <th colspan="2">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category}}</td>
                        <td>{{$category->created_at}}</td>
                        <td><a href="  {{route('category.edit',$category->id)}} " class="btn btn-warning">Edit</a></td>
                        <td>
                            <form action=" {{route('category.destroy',$category->id)}} " method="POST">
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
