@extends('frontend.layouts.master')

@section('index')
  <div class="container">
    <div class="row mt-3">
      <div class="col-sm-4 ">
        <div class="list-group">
          <a href="#" class="list-group-item">
            <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="images round" style="width:100px;">
          </a>
          <a href="{{route('user.dashboard')}}" class="list-group-item {{Route::is('user.dashboard')? 'active' : ''}}">Dashboard</a>
          <a href="{{route('user.profile')}}" class="list-group-item {{Route::is('user.profile')? 'active' : ''}}">Update Profile</a>
          <a href="#" class="list-group-item">Login</a>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="card card-body">
          @yield('sub-content')
        </div>
      </div>
    </div>
  </div>
@endsection
