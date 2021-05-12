
@extends('frontend.layouts.master')


@section('index')
  <div class="our-slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        @foreach ($sliders as $slider)
          <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0 ? 'active' : ''}}"></li>
        @endforeach
      </ol>
      <div class="carousel-inner">
        @foreach ($sliders as $slider)
          <div class="carousel-item {{$loop->index == 0 ? 'active' : ''}}">
            {{-- <img class="d-block w-100" src="{!! asset('images/sliders/'.$slider->image) !!}" alt="Second slide" style="height: 440px;"> --}}
            <img class="d-block w-100" src="{!! asset('images/sliders/'.$slider->image) !!}" alt="Second slide" style="height: 440px;">
            <div class="carousel-caption d-md-block">
              <h5>{{$slider->title}}</h5>
              @if ($slider->button_text)
                <a href="{{$slider->button_link}}" target="_blank" class="btn btn-info"> {{$slider->button_text}} </a>
              @endif
            </div>
          </div>
        @endforeach

      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <hr>

<!-- contain start -->
<div class="container">
  <div class="row">
    <div class="col-sm-4">
        @include('frontend.partials.side-bar')
    </div>

    <div class="col-sm-8">
      <h1>All Product</h1>
      <div class="widget">

        @include('frontend.pages.product.partials.all_products')

      </div>
    </div>

  </div>

</div>
<!-- contain end -->

@endsection
