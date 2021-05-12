
@extends('frontend.layouts.master')


@section('index')
<!-- contain start -->
<div class="container">
  <div class="row">

    <div class="col-sm-4">
      @include('frontend.partials.side-bar')
    </div>

    <div class="col-sm-8">
      <h1>All Product in <span class="badge badge-info">{{ $category->name}} </span> </h1>
      <div class="widget">
        @php
          $products = $category->products()->paginate(9);
        @endphp
        @if($products->count()>0)
          @include('frontend.pages.product.partials.all_products')
        @else
          <div class="alert alert-warning">
            now Product empty!!
          </div>
        @endif

      </div>
    </div>

  </div>

</div>
<!-- contain end -->

@endsection
