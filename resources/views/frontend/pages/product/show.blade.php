
@extends('frontend.layouts.master')

@section('title')
  {{$product->title}} | TebibyteTech
@endsection
@section('index')
<!-- contain start -->
<div class="container">
  <div class="row">

    <div class="col-sm-4 margin-top-20">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

          @php $i = 1; @endphp
          @foreach($product->images as $image)
          <div class="product-item carousel-item {{ $i == 1 ? 'active': ''}}">
            <img class="d-block w-100" src="{!!asset('images/products/' . $image->image)!!}" alt="First slide">
          </div>
          @php $i++; @endphp
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
    <p>Category <span class="badge badge-info"> {{$product->category-> name}} </span> </p>
    <p>Brand <span class="badge badge-info"> {{$product->brand-> name}} </span> </p>
    </div>

    <div class="col-sm-8 margin-top-20">
      <div class="widget">
          <h1>{{$product->title}}</h1>
          <h2>{{$product->price}} taka
            <span class="badge badge-primary">{{$product->quantity < 1 ? 'product Not Available': $product->quantity.' Available'}}</span>
          </h2>
      <div class="product-description">
        {!! $product->description !!}
      </div>

      </div>
    </div>

  </div>

</div>

@endsection
