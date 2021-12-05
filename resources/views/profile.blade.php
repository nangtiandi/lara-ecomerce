@extends('layouts.app')
@section('content')
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link" href=" {{url('/editInfo')}} ">Upload Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link active" href=" {{url('/profile')}} ">View Info</a>
            </li>
        </ul>
        <div class="row">
            <div class="col-md-8 mt-2">
                <div class="card border-0 shadow">
                    <div class="card-body">
                        <img src="{{asset('storage/img/'.Auth::user()->photo)}}" alt="" class="img-thumbnail" width="100">
                        <h4>Name : <span class="fw-bolder">{{Auth::user()->name}}</span> </h4>
                        <p>Email : <span>{{Auth::user()->email}}</span></p>
                        <p>Phone : <span>{{Auth::user()->phone}}</span></p>
                        <p>Gender : <span>{{Auth::user()->gender}}</span></p>
                        <p>Age : <span>{{Auth::user()->age}}</span></p>
                        <p>Location : <span>{{Auth::user()->country}}</span> <span>{{Auth::user()->city}}</span> & Postal-code is : <span>{{Auth::user()->postal_code}}</span></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection