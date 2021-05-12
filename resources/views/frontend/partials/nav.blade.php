
<nav class="navbar navbar-expand-lg navbar-dark bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{route('index')}}"><img src="{!!asset('images\tebibyte.png')!!}" alt="Logo" style="width: 150px;height:40px"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('index')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('products')}}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contact')}}">Contact</a>
        </li>
        <!-- <li class="nav-item">
          <form class="form-inline my-2 my-lg-0" action="{!!route('search')!!}" method="get">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </li> -->

      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0" action="{!!route('search')!!}" method="get" style="padding-right: 170px;">
            <div class="input-group mt-2">
              <input type="text" class="form-control" name="search" placeholder="Search">
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </form>
        </li>
        <!-- Authentication Links -->

        <li class="nav-item">
            <a class="nav-link" href="{{ route('carts') }}">
              <!-- <button type="button" class="btn btn-warning">Warning</button> -->
              <button type="button" class="btn btn-danger" name="button">
                <span class="">Cart</span>
                <span class="badge badge-warning" id="totalItems">
                  {{ App\Models\Cart::totalItems() }}
                </span>
              </button>
            </a>
        </li>
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="images round" style="width:40px;">
                    {{ Auth::user()->first_name }}  {{ Auth::user()->last_name }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('user.dashboard') }}">

                        {{ __('Dashboard') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
      </ul>

    </div>
  </div>
</nav>
