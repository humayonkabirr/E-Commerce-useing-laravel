@extends('backend.layouts.master')

@section('contain')
<div class="main-panel">
  <div class="content-wrapper">

    <div class="card card-body">
      <h3>Welcome to your Admin Panel</h3>

      <p>
        <br><br><br>
      <a href="{!! route('index') !!}" class="btn btn-primary btn-lg" target="_blank">Visit Main site</a>
    </p>
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
