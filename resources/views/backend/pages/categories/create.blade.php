@extends('backend.layouts.master')

@section('contain')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Add Category
      </div>
      <div class="card-body">
        <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('backend.partials.messages')

           <div class="form-group">
             <label for="name">Name:</label>
             <input type="text" name="name" class="form-control" id="name">
           </div>
           <div class="form-group">
             <label for="pwd">Description:</label>
             <textarea name="description" class="form-control" id="pwd" rows="8" cols="80"></textarea>
             <!-- <input type="password" class="form-control" id="pwd"> -->
           </div>
           <div class="form-group">
             <label for="prd">Parent Category(optional):</label>
             <select class="form-control" name="parent_id" id="prd">
               <option value="">Please Select a parent Category</option>
               @foreach ($main_categories as $category)
                  <option value="{{ $category->id}}">{{$category->name}}</option>
               @endforeach
             </select>
           </div>
           <div class="form-group">
             <label for="image">Category Image(optional):</label>
                  <input type="file" class="form-control" name="image" value="" id="image">

           </div>
           <button type="submit" class="btn btn-primary">Add Category</button>
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
