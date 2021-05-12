@extends('backend.layouts.master')

@section('contain')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit Product
      </div>
      <div class="card-body">
        <form action="{{route('admin.category.update',$category->id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('backend.partials.messages')

           <div class="form-group">
             <label for="name">Name:</label>
             <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name">
           </div>
           <div class="form-group">
             <label for="pwd">Description (Optional):</label>
             <textarea name="description" class="form-control" id="pwd" rows="8" cols="80">{!! $category->description !!}</textarea>
             <!-- <input type="password" class="form-control" id="pwd"> -->
           </div>
           <div class="form-group">
             <label for="prd">Parent Category (Optional):</label>
             <select class="form-control" name="parent_id" id="prd">
               <option value="">Please Select a Primary Category</option>
               @foreach ($main_categories as $cat)
                  <option value="{{ $cat->id}}" {{ $cat->id == $category->parent_id ? 'selected' : ''}}>{{$cat->name}}</option>
               @endforeach
             </select>
           </div>
           <div class="form-group">
             <label for="image">Category old Image:</label> <br>
               <img src="{!! asset('images/categories/'.$category->image) !!}" style="width:140px; height:80px; border-radius: 0%;"> <br>
               <br>
            <label for="image">Category new Image:</label> <br>
                <input type="file" class="form-control" name="image" value="" id="image">
           </div>
           <button type="submit" class="btn btn-success">Update Category</button>
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
