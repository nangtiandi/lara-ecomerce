@extends('admin.index')
@section('content')
    <ul class="nav nav-tabs">
        <li class="nav-item">
        <a class="nav-link active" href="{{route('category.create')}}">Create New Category</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="{{route('category.index')}}">View All Categories</a>
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
            <div class="col-md-6">
                <form action=" {{route('category.store')}} " method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Category</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <input type="submit" class="btn btn-outline-primary" value="Create Category">
                </form>
            </div>
        </div>
    </div>
@endsection