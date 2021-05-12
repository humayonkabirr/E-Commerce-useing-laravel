@extends('backend.layouts.master')

@section('contain')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Manage District
        </div>
        <div class="card-body">
          @include('backend.partials.messages')
          <table class="table table-hover table-striped" id="dataTable">
            <thead>
              <tr>
                <th>#</th>
                <th>District Name</th>
                <th>Division Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($districts as $district)
                <tr>
                  <td>#</td>
                  <td>{{$district-> name}}</td>
                  <td>{{$district-> division->name}}</td>
                  <!-- <td>
                  <img src="{!! asset('images/divisions/'.$district->image) !!}" style="width:140px; height:80px; border-radius: 0%;">
                </td> -->

                <td>
                  <a href="{{route('admin.district.edit', $district->id)}}" class="btn btn-success">Edit</a>
                  <a href="#deleteModal{{ $district->id}}"  data-toggle="modal" class="btn btn-danger">Delete</a>
                  <!-- //jdkajfk asjfkajflkafjaljfajfalskf -->
                  <!-- Button to Open the Modal -->
                  <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $district->id}}">
                  Delete
                </button> -->

                <!-- The Modal -->
                <div class="modal" id="deleteModal{{ $district->id}}">
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
                        <form action="{!! route('admin.division.delete', $district->id)!!}" method="post">
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
            <th>District Name</th>
            <th>Division Name</th>
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
