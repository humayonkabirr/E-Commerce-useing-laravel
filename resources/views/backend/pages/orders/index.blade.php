@extends('backend.layouts.master')

@section('contain')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Manage Orders
        </div>
        <div class="card-body">
          @include('backend.partials.messages')
          <table class="table table-hover table-striped" id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Orderer Name</th>
                <th>Orderer Phone No</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($orders as $order)
                <tr>
                  <td>{{$loop->index + 1}}</td>
                  <td>#TBT{{$order->id}}</td>
                  <td>{{$order->name}}</td>
                  <td>{{$order->phone_no}}</td>
                  <td>
                    <p>
                      @if ($order->is_seen_by_admin)
                        <button type="button" class="btn btn-success btn-sm" name="button">Seen</button>
                      @else
                        <button type="button" class="btn btn-warning btn-sm" name="button">Unseen</button>
                      @endif
                    </p>
                    <p>
                      @if ($order->is_completed)
                        <button type="button" class="btn btn-success btn-sm" name="button">Complete</button>
                      @else
                        <button type="button" class="btn btn-warning btn-sm" name="button">Uncomplete</button>
                      @endif
                    </p>

                    <p>
                      @if ($order->is_paid)
                        <button type="button" class="btn btn-success btn-sm" name="button">Paid</button>
                      @else
                        <button type="button" class="btn btn-danger btn-sm" name="button">UnPaid</button>
                      @endif
                    </p>

                  </td>
                  <td>

                    <a href="{{ route('admin.order.show',$order->id)}}" class="btn btn-info">View Order</a>
                    <a href="#deleteModal{{ $order->id}}"  data-toggle="modal" class="btn btn-danger">Delete</a>


                    <!-- The Modal -->
                    <div class="modal" id="deleteModal{{ $order->id}}">
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
                            <form action="{!! route('admin.order.delete', $order->id)!!}" method="post">
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
                <th>Order ID</th>
                <th>Orderer Name</th>
                <th>Orderer Phone No</th>
                <th>Order Status</th>
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
