


@if($errors->any())

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
        <ul>
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          @foreach($errors->all() as $error)
            <p>{{ $error}}</p>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>
@endif


@if(Session::has('success'))
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <p>{{Session::get('success')}}</p>
        </div>
      </div>
    </div>
  </div>
@endif

@if(Session::has('errors'))
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{Session::get('errors')}}</p>
      </div>
    </div>
  </div>
</div>
@endif

@if(Session::has('login_error'))
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{Session::get('login_error')}}</p>
      </div>
    </div>
  </div>
</div>
@endif
@if(Session::has('sticky_error'))
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <p>{{Session::get('sticky_error')}}</p>
      </div>
    </div>
  </div>
</div>
@endif
