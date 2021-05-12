@extends('backend.layouts.master')

@section('contain')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="card">
      <div class="card-header">
        Edit District
      </div>
      <div class="card-body">
        <form action="{{route('admin.district.update',$district->id)}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @include('backend.partials.messages')

           <div class="form-group">
             <label for="name">Name:</label>
             <input type="text" name="name" value="{{$district->name}}" class="form-control" id="name">
           </div>

           <div class="form-group">
             <label for="prd">Select a Division for this District:</label>
             <select class="form-control" name="division_id" id="prd">
               <option value="">Please Select a Division for this District</option>
               @foreach ($divisions as $division)
                  <option value="{{ $division->id}}" {{ $district->division->id == $division->id ? 'selected' : ''}}>{{$division->name}}</option>
               @endforeach
             </select>
           </div>

           <button type="submit" class="btn btn-success">Update District</button>
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
