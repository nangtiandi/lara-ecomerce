@extends('layouts.app')
@section('content')

    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
            <a class="nav-link active" href=" {{url('/editInfo')}} ">Upload Info</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href=" {{url('/profile')}} ">View Info</a>
            </li>
        </ul>
        @if (session('status'))
            <div class="alert alert-success">  {{session('status')}} </div>
        @endif
        <div class="row my-2">
            <div class="col-md-6">
                <form action=" {{route('home.update')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <img src="{{asset('storage/img/'.Auth::user()->photo)}}" alt="" height="80">
                            <div>
                                <a href="https://www.facebook.com/profile.php?id=100062814686150">
                                    <img src="data:image/png;base64,{{DNS2D::getBarcodePNG('09403179169', 'QRCODE')}}" alt="barcode" />
                                </a>
                                
                            </div>
                        </div>
                        <label for="" class="form-label mt-2">Upload Photo</label>
                        <input type="file" class="form-control" name="photo">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Phone</label>
                        <input type="tel" class="form-control" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" min="12" max="100">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Gender : </label>
                        <input type="radio" value="male" name="gender"> Male
                        <input type="radio" value="female" name="gender"> Female
                    </div>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="" class="form-label">Country</label>
                            <select name="country" id="" class="form-select">
                                <option value="myanmar">Myanmar</option>
                                <option value="singapore">Singapore</option>
                                <option value="japan">Japan</option>
                                <option value="thai">Thai</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">City</label>
                            <input type="text" class="form-control" name="city">
                        </div>
                        <div class="col-4">
                            <label for="" class="form-label">Postal code</label>
                            <input type="number" class="form-control" name="postal_code">
                        </div>
                    </div>
                    <input type="submit" class="btn btn-outline-dark" value="Upload Profile">
                </form>
            </div>
        </div>
    </div>
@endsection