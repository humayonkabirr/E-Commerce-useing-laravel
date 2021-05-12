<div class="row">

@foreach($products as $product)

  <div class="col-sm-4">
    <div class="card">

      @php $i = 1; @endphp
      @foreach($product->images as $image)
        @if($i>0)
        <a href="{!! route('products.show', $product->slug)!!}">
                <img class="card-img-top future-image" src="{{asset('images/products/' . $image->image)}}" alt="{{$product->title}}">
        </a>

        @endif
        @php $i--; @endphp
      @endforeach
      <div class="card-body">
        <h4 class="card-title">
          <a href="{!! route('products.show', $product->slug)!!}">  {{$product->title}} </a>
        </h4>
        <p class="card-text">Price- {{$product->price}}</p>
        @include('frontend.pages.product.partials.cart-button')
      </div>
    </div>
  </div>

@endforeach

</div>

<div class="pagination">
  {{ $products->links() }}
</div>
