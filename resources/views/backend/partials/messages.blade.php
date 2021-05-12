@if($errors->any())
  	<div class="alert alert-danger">
      <ul>

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach($errors->all() as $error)
          <p>{{ $error}}</p>
        @endforeach
      </ul>
    </div>
@endif


@if(Session::has('success'))
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>{{Session::get('success')}}</p>
  </div>
@endif

@if(Session::has('error'))
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <div class="alert alert-danger">
    <p>{{Session::get('error')}}</p>
  </div>
@endif
