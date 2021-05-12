@extends('backend.layouts.master')

@section('contain')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Manage Product
        </div>
        <div class="card-body">
          @include('backend.partials.messages')
          <table class="table table-hover table-striped" id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Product Code</th>
                <th>Products</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
                <tr>
                  <td>#</td>
                  <td>#TBT{{$product->id}}</td>
                  <td>{{$product->title}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->quantity}}</td>
                  <td>
                    <a href="{{route('admin.product.edit', $product->id)}}" class="btn btn-success">Edit</a>
                    <a href="#deleteModal{{ $product->id}}"  data-toggle="modal" class="btn btn-danger">Delete</a>
                    <!-- //jdkajfk asjfkajflkafjaljfajfalskf -->
                    <!-- Button to Open the Modal -->
                    <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $product->id}}">
                    Delete
                  </button> -->

                  <!-- The Modal -->
                  <div class="modal" id="deleteModal{{ $product->id}}">
                    <div class="modal-dialog">
                      <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                          <h4 class="modal-title">Delete.</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                          <p>Are You Sure to Delete.</p>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <form action="{!! route('admin.product.delete', $product->id)!!}" method="post">
                            {{csrf_field()}}
                            <button type="submit" class="btn btn-danger">Confirm</button>
                          </form>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- //jafdkjflak fjalksfjalkf akfjd -->
                </td>

              </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Product Code</th>
              <th>Products</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
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
