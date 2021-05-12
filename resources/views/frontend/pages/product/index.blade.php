
@extends('frontend.layouts.master')


@section('index')
<!-- contain start -->
<div class="container">
  <div class="row">

    <div class="col-md-4">
      @include('frontend.partials.side-bar')
    </div>

    <div class="col-md-8">
      <h1>All Product</h1>
      <div class="widget">

        @include('frontend.pages.product.partials.all_products')


      </div>
    </div>

  </div>

</div>
<!-- contain end -->

@endsection
