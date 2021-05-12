@extends('backend.layouts.master')

@section('contain')
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="card">
        <div class="card-header">
          Manage Slider

          <a href="#sliderModal"  data-toggle="modal" class="btn btn-info float-right">Add Slider</a>
        </div>
        <div class="card-body">
        @include('backend.partials.messages')
          <!-- The Modal of slider addd -->
          <div class="modal" id="sliderModal">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <h4 class="modal-title">Add New Slider.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  <div class="form-group row">
                    <div class="col-md-12">

                      <form action="{!! route('admin.slider.store')!!}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <label for="title">{{ __('Slider Title') }} <small class="text-danger">(required)</small> </label>

                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Slider Title" required autocomplete="title" autofocus>

                          @error('title')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="col-md-12">
                          <label for="image">{{ __('Slider Images') }} <small class="text-danger">(required)</small> </label>

                          <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" placeholder="Slider Title" required autocomplete="image" autofocus>

                            @error('image')
                              <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                        </div>



                        <div class="form-group row">
                          <div class="col-md-12">
                            <label for="button_text">{{ __('Slider Button Text') }} <small class="text-info">(optional)</small> </label>

                            <input id="button_text" type="text" class="form-control @error('button_text') is-invalid @enderror" name="button_text" value="{{ old('button_text') }}" placeholder="Slider Button Text"required autocomplete="button_text" autofocus>

                              @error('button_text')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                          </div>



                          <div class="form-group row">
                            <div class="col-md-12">
                              <label for="button_link">{{ __('Slider Button Link') }} <small class="text-info">(optional)</small> </label>

                              <input id="button_link" type="text" class="form-control @error('button_link') is-invalid @enderror" name="button_link" value="{{ old('button_link') }}" placeholder="Slider Buuton Link" required autocomplete="button_link" autofocus>

                                @error('button_link')
                                  <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                            </div>


                            <div class="form-group row">
                              <div class="col-md-12">
                                <label for="priority">{{ __('Slider Priority') }} <small class="text-danger">(required)</small> </label>

                                <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{ old('priority') }}" placeholder="Slider Priority" required autocomplete="priority" autofocus>

                                  @error('priority')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>



                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">

                              <button type="submit" class="btn btn-success">Add Confirm</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </form>

                          </div>

                        </div>
                      </div>
                    </div>
                    {{-- end the model of slider  --}}

                    <table class="table table-hover table-striped">
                      <tr>
                        <th>#</th>
                        <th>Slider Title</th>
                        <th>Slider Image</th>
                        <th>Slider Button Text</th>
                        {{-- <th>Slider Button Link</th>/ --}}
                        <th>Slider Priority</th>
                        <th>Action</th>
                      </tr>
                      @foreach($sliders as $slider)
                        <tr>
                          <td>#</td>
                          <td>{{$slider-> title}}</td>
                          <td>
                            <img src="{!! asset('images/sliders/'.$slider->image) !!}" style="width:140px; height:80px; border-radius: 0%;">
                          </td>
                          <td>{{$slider-> button_text}}</td>
                          {{-- <td>{{$slider-> button_link}}</td> --}}
                          <td>{{$slider-> priority}}</td>

                          <td>
                            <a href="#EditModal{{$slider->id}}" data-toggle="modal" class="btn btn-success">Edit</a>
                            <a href="#deleteModal{{ $slider->id}}"  data-toggle="modal" class="btn btn-danger">Delete</a>


                            <!-- The Modal of slider edit -->
                            <div class="modal" id="EditModal{{$slider->id}}">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- Modal Header -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Edit Slider.</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body">
                                    <div class="form-group row">
                                      <div class="col-md-12">

                                        <form action="{!! route('admin.slider.update',$slider->id)!!}" method="post" enctype="multipart/form-data">
                                          {{csrf_field()}}

                                          <label for="title">{{ __('Slider Title') }} <small class="text-danger">(required)</small> </label><br>
                                          <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$slider-> title}}" placeholder="Slider Title" required autocomplete="title" autofocus>

                                            @error('title')
                                              <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                              </span>
                                            @enderror
                                          </div>
                                        </div>


                                        <div class="form-group row">
                                          <div class="col-md-12">
                                            <label for="image">{{ __('Slider Images') }}
                                              <a href="{!! asset('images/sliders/'.$slider->image) !!}" target="_blank">Previous Image</a>
                                               <small class="text-danger">(required)</small> </label><br>

                                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{$slider-> image}}" placeholder="Slider Title" autocomplete="image" autofocus>

                                              @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                                </span>
                                              @enderror
                                            </div>
                                          </div>



                                          <div class="form-group row">
                                            <div class="col-md-12">
                                              <label for="button_text">{{ __('Slider Button Text') }} <small class="text-info">(optional)</small> </label><br>

                                              <input id="button_text" type="text" class="form-control @error('button_text') is-invalid @enderror" name="button_text" value="{{$slider-> button_text}}" placeholder="Slider Button Text"required autocomplete="button_text" autofocus>

                                                @error('button_text')
                                                  <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                  </span>
                                                @enderror
                                              </div>
                                            </div>



                                            <div class="form-group row">
                                              <div class="col-md-12">
                                                <label for="button_link">{{ __('Slider Button Link') }} <small class="text-info">(optional)</small> </label><br>

                                                <input id="button_link" type="text" class="form-control @error('button_link') is-invalid @enderror" name="button_link" value="{{$slider-> button_link}}" placeholder="Slider Buuton Link" required autocomplete="button_link" autofocus>

                                                  @error('button_link')
                                                    <span class="invalid-feedback" role="alert">
                                                      <strong>{{ $message }}</strong>
                                                    </span>
                                                  @enderror
                                                </div>
                                              </div>


                                              <div class="form-group row">
                                                <div class="col-md-12">
                                                  <label for="priority">{{ __('Slider Priority') }} <small class="text-danger">(required)</small> </label><br>

                                                  <input id="priority" type="text" class="form-control @error('priority') is-invalid @enderror" name="priority" value="{{$slider-> priority}}" placeholder="Slider Priority" required autocomplete="priority" autofocus>

                                                    @error('priority')
                                                      <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                      </span>
                                                    @enderror
                                                  </div>
                                                </div>



                                              </div>

                                              <!-- Modal footer -->
                                              <div class="modal-footer">

                                                <button type="submit" class="btn btn-success">Add Confirm</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                              </form>

                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                      {{-- end the model of edit slider  --}}


                                      <!-- The Modal of delete-->
                                      <div class="modal" id="deleteModal{{ $slider->id}}">
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
                                              <form action="{!! route('admin.slider.delete', $slider->id)!!}" method="post">
                                                {{csrf_field()}}
                                                <button type="submit" class="btn btn-danger">Confirm</button>
                                              </form>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                      <!-- end the model of delete-->
                                    </td>

                                  </tr>
                                @endforeach
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
