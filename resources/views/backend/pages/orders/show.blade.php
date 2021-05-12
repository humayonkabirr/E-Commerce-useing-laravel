@extends('backend.layouts.master')

@section('contain')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          View Orders #TBT{{$order->id}}
        </div>
        <div class="card-body">
          @include('backend.partials.messages')

          <h3>Order Information</h3>
          <div class="row">
            <div class="col-md-6 border-right">
              <p> <strong>Orderer Name: </strong>{{ $order->name}} </p>
              <p> <strong>Orderer Phone: </strong>{{ $order->phone_no}} </p>
              <p> <strong>Orderer Email: </strong>{{ $order->email}} </p>
              <p> <strong>Orderer Shipping Address: </strong>{{ $order->shipping_address}} </p>
            </div>
            <div class="col-md-6">
              <p> <strong>Orderer Payment Method:</strong> {{$order->payment->name}}</p>
              <p> <strong>Orderer Payment Transaction:</strong> {{$order->transaction_id}}</p>
            </div>
          </div>
          <hr>
          <h3>Ordered Items</h3>
          @if ($order->carts->count() >0)
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
                @foreach ($order->carts as $cart)
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
          @endif
          <hr>
          <form class="form-inline" action="{{route('admin.order.charge', $order->id)}}" method="post">
            @csrf
            <label for="shipping_charge">Shipping Charge</label>
            <input type="text" class="form-control" id="shipping_charge" name="shipping_charge" value="{{ $order->shipping_charge}}">
            <label for="custom_discount">Discount</label>
            <input type="text" class="form-control" id="custom_discount" name="custom_discount" value="{{ $order->custom_discount}}">

            <button type="submit" class="btn btn-success ml-2">Update</button>
            <a href="{{route('admin.order.invoice', $order->id)}}" class="btn btn-info ml-2" target="_blank">Generate Invoice</a>

          </form>
          <hr>
          <form class="form-inline" action="{{route('admin.order.completed',$order->id)}}" method="post" style="display:inline-block!importan;">
            @csrf
            @if ($order->is_completed)
                <input type="submit" name="" class="btn btn-danger" value="Cancel Order">
            @else
                <input type="submit" name="" class="btn btn-success" value="Complete Order">
            @endif
          </form>
          <form class="form-inline" action="{{route('admin.order.paid',$order->id)}}" method="post" style="display:inline-block!importan;">
            @csrf
            @if ($order->is_paid)
                <input type="submit" name="" class="btn btn-danger" value="Cancel Payment">
            @else
                <input type="submit" name="" class="btn btn-success" value="Paid Order">
            @endif
          </form>
          </div>
        </div>

      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="http://www.tebibytetech.com/" target="_blank">Tebibyte Tech</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  @endsection
