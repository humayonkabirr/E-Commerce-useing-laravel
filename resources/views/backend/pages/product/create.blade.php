@extends('backend.layouts.master')

@section('contain')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Add Product
      </div>
      <div class="card-body">
        <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('backend.partials.messages')
           <div class="form-group">
             <label for="Title">Title:</label>
             <input type="text" name="title" class="form-control" id="Title">
           </div>
           <div class="form-group">
             <label for="price">Price:</label>
             <input type="text" name="price" class="form-control" id="price">
           </div>
           <div class="form-group">
             <label for="quentity">Quantity:</label>
             <input type="text" name="quantity" class="form-control" id="quentity">
           </div>
           <div class="form-group">
             <label for="quentity">Select Category:</label>
             <select class="form-control" name="category_id">
               <option value="">Please Select Cagegory</option>
               @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
                 <option value="{{ $parent->id}}">{{$parent->name}}</option>

                 @foreach(App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
                    <option value="{{ $child->id}}" >--------->{{$child->name}}</option>
                 @endforeach

               @endforeach
             </select>
           </div>
           <div class="form-group">
             <label for="quentity">Select Brand:</label>
             <select class="form-control" name="brand_id">
               <option value="">Please Select Brand</option>
               @foreach(App\Models\Brand::orderBy('name', 'asc')->get() as $brand )
                 <option value="{{ $brand ->id}}">{{$brand ->name}}</option>

               @endforeach
             </select>
           </div>
           <div class="form-group">
             <label for="pwd">Description:</label>
             <textarea name="description" class="form-control" id="pwd" rows="8" cols="80"></textarea>
           </div>
           <div class="form-group">
             <label for="product_image">Product Image:</label>
              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" value="" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" value="" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" value="" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" value="" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" value="" id="product_image">
                </div>
                <div class="col-md-4">
                  <input type="file" class="form-control" name="product_image[]" value="" id="product_image">
                </div>
              </div>
           </div>
           <button type="submit" class="btn btn-primary">Add Product</button>
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
