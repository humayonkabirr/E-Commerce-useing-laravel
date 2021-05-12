@extends('frontend.layouts.master')

@section('index')

  <div class="container">
      <h1>Carts Items</h1>
      @if (App\Models\Cart::totalItems() >0)
      <table class="table table-bordered table-stripe">
        <thead>
          <tr>
            <th>No.</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          @php
            $total_price = 0;
          @endphp
          @foreach (App\Models\Cart::totalCarts() as $cart)
          <tr>
            <td> {{ $loop->index + 1}} </td>
            <td>
              <a href="{{route('products.show',$cart->product->slug)}}">{{ $cart->product->title}}</a>
            </td>
            <td>
              @if($cart->product->images->count() > 0)
                <img src="{{ asset('images/products/'. $cart->product->images->first()->image)}}" alt="Product Image" style="width:80px;">
              @endif
            </td>
            <td>
              <form class="form-inline" action="{{route('carts.update', $cart->id)}}" method="post">
                @csrf
                <input type="number" class="form-control" name="product_quantity" value="{{ $cart->product_quantity}}">
                <button type="submit" class="btn btn-success">Update</button>
              </form>
            </td>
            <td>
              {{$cart->product->price}} Taka
            </td>
            <td>
              @php
                $total_price += $cart->product->price * $cart->product_quantity;
              @endphp
              {{$cart->product->price * $cart->product_quantity}} Taka
            </td>
            <td>
              <form class="form-inline" action="{{route('carts.delete', $cart->id)}}" method="post">
                @csrf
                <input type="hidden" name="cart_id">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
          <tr>
            <td colspan="4"></td>
            <td> Total Amount: </td>
            <td colspan="2">
              <strong>{{ $total_price }} Taka</strong>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="float-right">
        <a href="{{'products'}}" class="btn btn-info btn-lg">Continue Shopping</a>
        <a href="{{'checkout'}}" class="btn btn-warning btn-lg">Checkout</a>
      </div>
      @else
        <div class="alert alert-warning">
          <strong>There is no item in your cart.</strong>
          <br>
          <a href="{{'products'}}" class="btn btn-info btn-lg">Continue Shopping</a>
        </div>
      @endif
  </div>
@endsection
