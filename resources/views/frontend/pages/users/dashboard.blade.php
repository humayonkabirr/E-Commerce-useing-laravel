@extends('frontend.pages.users.master')

@section('sub-content')
  <div class="container">
    <h1>Welcome {{ $user->first_name . ' ' . $user->last_name}}</h1>
    <p>this is dashboard</p>
    <hr>

    <div class="row">
      <div class="col-sm-4">
        <div class="card card-body mt-2 pointer" onclick="location.href='{{route('user.profile')}}'">
          <h4>Update Profile</h4>
        </div>
      </div>
    </div>
  </div>
@endsection
