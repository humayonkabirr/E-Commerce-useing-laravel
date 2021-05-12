@extends('frontend.layouts.master')

@section('index')

<div class="container mt-3">
  <div class="card card-body ">
    <h1>Confrim Items</h1>
    <hr>
    <div class="row">
      <div class="col-sm-7">
        @foreach (App\Models\Cart::totalCarts() as $cart)
          <p>
            {{$cart->product->title}} -
             <strong> {{$cart->product->price}} Taka</strong>
             - {{$cart->product_quantity}} Items
             </p>
        @endforeach
      </div>
      <div class="col-sm-5">
        @php
          $total_price =0;
        @endphp
        @foreach (App\Models\Cart::totalCarts() as $cart)
          @php
            $total_price += $cart->product->price * $cart->product_quantity;
          @endphp
        @endforeach
        <p>Total Price: <strong>{{$total_price}}</strong> Taka</p>
        <p>Total Price with shipping cost: <strong>{{$total_price + App\Models\Setting::first()->shipping_cost  }}</strong> Taka</p>
      </div>
    </div>

    <p>
      <a href="{{route('carts')}}">Change Cart Items</a>
    </p>
  </div>

  <div class="card card-body mt-3">
    <h1>Shipping address</h1>
    <div class="container">
      <form action="{{route('checkouts.store')}}" method="post">
          @csrf

          <div class="form-group row">
              <label for="name" class="col-sm-4 col-form-label text-sm-right">{{ __('Reviced Name') }}</label>

              <div class="col-sm-6">
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::check() ? Auth::user()->first_name.' '.Auth::user()->last_name: '' }}" required autocomplete="name" autofocus>

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>


          <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-sm-right">{{ __('E-Mail Address') }}</label>

              <div class="col-sm-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::check() ? Auth::user()->email   : '' }}" required autocomplete="email">

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
                  <input id="phone_no" type="text" class="form-control @error('phone_no') is-invalid @enderror" name="phone_no" value="{{Auth::check() ? Auth::user()->phone_no   : ''  }}" required autocomplete="phone_no">

                  @error('phone_no')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="additional_messages" class="col-sm-4 col-form-label text-sm-right">{{ __('Additional Message (Optional)') }}</label>

              <div class="col-sm-6">
                  <textarea id="additional_messages" rows="4" cols="80" class="form-control @error('additional_messages') is-invalid @enderror" name="message" value=""></textarea>
                  @error('additional_messages')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="shipping_address" class="col-sm-4 col-form-label text-sm-right">{{ __('Shipping Address (*)') }}</label>

              <div class="col-sm-6">
                  <textarea id="shipping_address" rows="4" cols="80" class="form-control @error('shipping_address') is-invalid @enderror" name="shipping_address">{{ Auth::check() ? Auth::user()->shipping_address   : ''  }} </textarea>
                  @error('shipping_address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="payment_method" class="col-sm-4 col-form-label text-sm-right">{{ __('Select payment Method') }}</label>

              <div class="col-sm-6">
                  <select class="form-control" name="payment_method_id" required id="payments">
                    <option value="" >Select a payment method Please</option>
                    @foreach ($payments as $payment)
                      <option value="{{ $payment->short_name}}">{{$payment->name}}</option>
                    @endforeach
                  </select>

                  @foreach ($payments as $payment)

                      @if ($payment->short_name == 'Cash-in')
                        <div class="alert alert-success text-center mt-2 hidden" id="payment_{{ $payment->short_name}}">
                          <h4>For cash in there is nothing necessary. Just click Finish Order.</h4>
                          <br>
                          <small>
                            you will get your product in two or three Business days.
                          </small>
                        </div>
                        @else
                          <div class="mt-2 text-center hidden" id="payment_{{ $payment->short_name}}">
                            <h4>{{$payment->name}} Payment</h4>
                            <p>
                              <strong>{{ $payment->name}} No: {{ $payment->no}}</strong>
                              <br>
                              <strong>Account Type: {{ $payment->type}}</strong>
                            </p>
                            <div class="alert alert-success">
                              Please send the above money to this {{ $payment->name}} no and your transaction code below there.

                            </div>
                          </div>
                      @endif

                  @endforeach
                    <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" value="" placeholder="Enter transaction code">

              </div>
          </div>

          <div class="form-group row mb-0">
              <div class="col-sm-6 offset-sm-4">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Confrim order') }}
                  </button>
              </div>
          </div>
      </form>
    </div>
  </div>

</div>

@endsection

@section('scripts')
<script type="text/javascript">
  $("#payments").change(function(){
    $payment_method =$("#payments").val();
    // alert($payment_method);
    if ($payment_method == "Cash-in") {
      $("#payment_Cash-in").removeClass('hidden');
      $("#payment_bKash").addClass('hidden');
      $("#payment_Rocket").addClass('hidden');
      $("#transaction_id").addClass('hidden');
    }else if ($payment_method == "bKash") {
      $("#payment_bKash").removeClass('hidden');
      $("#payment_Cash-in").addClass('hidden');
      $("#payment_Rocket").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }else if ($payment_method == "Rocket") {
      $("#payment_Rocket").removeClass('hidden');
      $("#payment_Cash-in").addClass('hidden');
      $("#payment_bKash").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }

  })
</script>
@endsection
