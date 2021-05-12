


<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="{{route('admin.index')}}" class="nav-link">
        <div class="profile-image">
          <img class="img-xs rounded-circle" src="{{asset('images/images/faces/IMG_1231.jpg')}}" alt="profile image">
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name">Humayon Kabir</p>
          <p class="designation">DokanDer</p>
        </div>
      </a>
    </li>
    <li class="nav-item nav-category">Main Menu</li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('admin.index')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Product</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.products')}}">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.products.create')}}">Add Product</a>
          </li>
        </ul>
      </div>
    </li>




    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Orders</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-orders">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.orders')}}">Manage Orders</a>
          </li>
        </ul>
      </div>
    </li>



    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#ui-sliders" aria-expanded="false" aria-controls="ui-sliders">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Slider</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-sliders">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.sliders')}}">Manage Orders</a>
          </li>
        </ul>
      </div>
    </li>


    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#category-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Category</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="category-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.categories')}}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.category.create')}}">Add Category</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#brand-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Brand</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="brand-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.brands')}}">Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.brand.create')}}">Add Brand</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#division-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage Division</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="division-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.divisions')}}">Division</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.division.create')}}">Add Division</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#district-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="menu-icon typcn typcn-coffee"></i>
        <span class="menu-title">Manage District</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="district-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.districts')}}">District</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.district.create')}}">Add District</a>
          </li>
        </ul>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="pages/tables/basic-table.html">

        <form class="" action="{{route('admin.logout')}}" method="post">
          @csrf
          <i class="menu-icon typcn typcn-bell"></i>
            <input type="submit" name="" value="Logout" class="btn btn-danger">

        </form>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/login.html"> Login </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/register.html"> Register </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
