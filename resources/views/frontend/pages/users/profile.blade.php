@extends('frontend.pages.users.master')

@section('sub-content')
  <div class="container">
    <div class="card-body mb-5">
        <form method="POST" action="{{ route('user.profile.update') }}">
            @csrf

            <div class="form-group row">
                <label for="first_name" class="col-sm-4 col-form-label text-sm-right">{{ __('First Name') }}</label>

                <div class="col-sm-6">
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-4 col-form-label text-sm-right">{{ __('Last Name') }}</label>

                <div class="col-sm-6">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-4 col-form-label text-sm-right">{{ __('Username') }}</label>

                <div class="col-sm-6">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-sm-right">{{ __('E-Mail Address') }}</label>

                <div class="col-sm-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user-> email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_no" class="col-sm-4 col-form-label text-sm-right">{{ __('Mobile Number') }}</label>

                <div class="col-sm-6">
                    <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{ $user->phone_no }}" required autocomplete="phone_no">

                    @error('phone_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="division_id" class="col-sm-4 col-form-label text-sm-right">{{ __('Division') }}</label>
                <div class="col-sm-6">
                  <select class="form-control" name="division_id">
                    <option value="">Please select your division</option>
                    @foreach ($divisions as $division)
                      <option value="{{ $division->id}}" {{ $user->division_id == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="district_id" class="col-sm-4 col-form-label text-sm-right">{{ __('District') }}</label>
                <div class="col-sm-6">
                  <select class="form-control" name="district_id">
                    <option value="">Please select your district</option>
                    @foreach ($districts as $district)
                      <option value="{{ $district->id}}"{{ $user->district_id == $district->id ? 'selected' : ''}}>{{$district->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>


            <div class="form-group row">
                <label for="street_address" class="col-sm-4 col-form-label text-sm-right">{{ __('Street Address') }}</label>

                <div class="col-sm-6">
                    <input id="street_address" type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ $user->street_address }}" required>

                    @error('street_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="shipping_address" class="col-sm-4 col-form-label text-sm-right">{{ __('Shipping Address') }}</label>

                <div class="col-sm-6">
                    <textarea id="shipping_address" rows="4" cols="80" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address" value=""> {{ $user->shipping_address }}</textarea>
                    @error('shipping_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
              <label for="password" class="col-sm-4 col-form-label text-sm-right">{{ __('New Password (Optional)') }}</label>
                <div class="col-sm-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-sm-6 offset-sm-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update Profile') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
@endsection
