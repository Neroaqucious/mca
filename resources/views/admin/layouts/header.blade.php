@include('admin.layouts.htmlhead')
<body>
  <!--LOADER AREA-->
  <div class="loading">
    <div style="text-align: center;margin-top: 20%;">
    <img src="{{ url('assets/admin/images/logo.png') }}" class="adm-logo" alt="MCA logo" width="40" style="position: absolute;margin: 20px 0px 0px 20px;opacity: 0.5;">
    <div class="lds-dual-ring"></div>
    </div>
  </div>
  <!--LOADER AREA-->
  <section class="wrapper">
  @include('admin.layouts.sidebar')
  <!--RIGHT CONTENT AREA-->
  <div class="content-area">
    <header class="header sticky-top">
      <nav class="navbar navbar-dark px-sm-2 py-0" style="border-bottom: 3px solid #83c342;border-top: 1px solid #265b30;background-color: #1a1c1e;">
        <a class="navbar-brand py-1 d-md-none  m-0 material-icons toggle-sidebar" href="#">menu</a>
        <ul class="navbar-nav flex-row ml-auto">
          <li class="nav-item">
            <a href="#" id="notificationDropdown" data-toggle="dropdown" class="nav-link text-light">
              <span class="material-icons align-middle">notification_important</span></a>
            <div class="dropdown-menu p-0 dropdown-lg notificationDropdown dropdown-menu-right" aria-labelledby="notificationDropdown">
              <a class="dropdown-item py-3 border-bottom" href="#">
                  <span class="badge badge-pill badge-danger mr-2">Warning</span> <small class="text-muted">Somthing went wrong !</small>
              </a>
              <button type="button" class="btn btn-light btn-sm btn-block">View All</button>
            </div>
          </li>
          <li>
            <a href="#" class="nav-link text-light"><span class="material-icons align-middle">chat</span></a>
          </li>
          <li class="nav-item user-logedin dropdown">
            <a href="#" id="userLogedinDropdown" data-toggle="dropdown" class="nav-link weight-300 dropdown-toggle">
            <span class="material-icons align-middle">account_circle</span> {{ Auth::user()->name }}</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userLogedinDropdown">
              <a class="dropdown-item" href="">Profile</a>
              <a class="dropdown-item" href="">Change Password</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>

    <div class="content-wrapper">
      <div class="row page-tilte align-items-center">
        <div class="col-md-auto">
          <a href="#" class="mt-3 d-md-none float-right toggle-controls"><span class="material-icons">keyboard_arrow_down</span></a>
          <h4 class="weight-100 title">@yield('title')</h4>
        </div> 
        <div class="col controls-wrapper mt-3 mt-md-0 d-none d-md-block ">
          <div class="controls d-flex justify-content-center justify-content-md-end float-right">
            @yield('breadcrumb')            
          </div>
        </div>
      </div>

    