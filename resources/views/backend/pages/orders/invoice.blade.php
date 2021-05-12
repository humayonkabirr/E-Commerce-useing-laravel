<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="viewport"
  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice-#TBT{{$order->id}}</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="css/invoice.css"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <style media="screen">
  .invoice-header{
    padding: 10px 20px 10px 20px;
    border-right: 5px solid #078bc6;
    border-bottom: 1px solid #078bc6;
  }
  .invoice-right-top h1{
    color: #078bc6;
  }
  .invoice-left-top{
    border-left: 5px solid #078bc6;
    padding-left: 20px;
    padding-top: 20px;
  }
  thead{
    background: #078bc6;
    color: white;
  }
  .authority h5{
    margin-top: -10px;
    margin-left: 60px;
    color: black;
  }

  .thanks h4{
    color: #078bc6;
    font-size: 25px;
    font-weight: normal;
    font-family: serif;
    margin-top: 20px;
  }
  .site-address p{
    line-height: 6px;
    font-weight: 300;
  }

  .address{
    line-height: 8px;
    font-weight: 300;
  }
</style>

</head>
<body>
  <div class="invoice-header">
    <div class="float-left site-logo">
      <img src="{{asset('images/tebibyte.png')}}" alt="" style="width: 230px;">
    </div>
    <div class="float-right site-address">
      <h4>Tebibyte Tech</h4>
      <p>Bornali Mor, Rajshahi</p>
      <p>Phone: <a href="#">+880 1303-078946</a> </p>
      <p>Email: <a href="mailto:info@tebibytetceh.com">info@tebibytetceh.com</a> </p>
    </div>
    <div class="clearfix">
    </div>
  </div>




  <div class="invoice-description">
    <div class="invoice-left-top float-left">
      <strong>Invoice to</strong>
      <p><h4>{{$order->name}}</h4></p>
      <div class="address">
        <p>
          Address: {{ $order->shipping_address}}
        </p>
        <p>Phone: {{$order->phone_no}}</p>
        <p>Email: <a href="mailto:{{$order->email}}">{{$order->email}}</a> </p>
      </div>
    </div>
    <div class="invoice-right-top float-right">
      <h1>Invoice #TBT{{$order->id}}</h1>
      <p>{{$order->created_at}}</p>
    </div>
    <div class="clearfix">

    </div>
  </div>

  <h3>Products Information</h3>
  @if ($order->carts->count() >0)
    <table class="table table-bordered table-stripe">
      <thead>
        <tr>
          <th>No.</th>
          <th>Product Title</th>
          <th>Product Quantity</th>
          <th>Unit Price</th>
          <th>Total Price</th>
        </tr>
      </thead>
      <tbody>
        @php
        $total_price = 0;
        @endphp
        @foreach ($order->carts as $cart)
          <tr>
            <td>{{ $loop->index + 1}}</td>
            <td>
              <a href="{{route('products.show',$cart->product->slug)}}">{{ $cart->product->title}}</a>
            </td>
            <td>
              {{$cart->product_quantity}}
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
          </tr>
        @endforeach
        <tr>
          <td colspan="3"></td>
          <td> <strong>Discount:</strong> </td>
          <td colspan="2">
            <strong>{{ $order->custom_discount }} Taka</strong>
          </td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td> <strong>Shipping Charge:</strong> </td>
          <td colspan="2">
            <strong>{{ $order->shipping_charge }} Taka</strong>
          </td>
        </tr>
        <tr>
          <td colspan="3"></td>
          <td> <strong>Total Amount:</strong> </td>
          <td colspan="2">
            <strong>{{ ($total_price + $order->shipping_charge) - $order->custom_discount}} Taka</strong>
          </td>
        </tr>
      </tbody>
    </table>
  @endif

  <div class="thanks mt3">
    <h4>Thank you for your Orders...</h4>
  </div>
  <br>
  <div class="authority float-right mt-5 center">
    <b>--------------------------------------------------</b>
    <h5>Authority Signature</h5>
  </div>
  <!-- main-panel ends -->

</body>
</html>
