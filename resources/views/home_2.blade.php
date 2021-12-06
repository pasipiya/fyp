<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FleetMonitoringSystem') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/css/components.css')}}">
  <!-- Custom style CSS -->

  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"><i
                  class="fas fa-bars"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i class="fas fa-expand"></i>
              </a>
            </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{asset('admin/assets/img/user.png')}}" class="user-img-radious-style">
              <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Hello Jessica Hill</div>
              <a href="profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="timeline.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="#" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">
              <img alt="image" src="{{asset('admin/assets/img/logo.png')}}" class="header-logo" />
              <span class="logo-name">Grexa</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-home"></i><span>Session Builder</span></a>
              <ul class="dropdown-menu">

                <li>
                    <router-link to="/warmup" class="nav-link">
                        Warmup
                    </router-link>
                </li>
                <li>
                    <router-link to="/plyometrics" class="nav-link">
                        Plyometrics
                    </router-link>
                </li>
                <li>
                    <router-link to="/main_session" class="nav-link">
                        Main Session
                    </router-link>
                </li>
                <li>
                    <router-link to="/cool_down" class="nav-link">
                        Cool Down
                    </router-link>
                </li>
              </ul>
            </li>

            {{-- <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-envelope"></i><span>Email</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="email-inbox.html">Inbox</a></li>
                <li><a class="nav-link" href="email-compose.html">Compose</a></li>
                <li><a class="nav-link" href="email-read.html">read</a></li>
              </ul>
            </li> --}}

            <li class="nav-item">
                <router-link to="/test_admin_view" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    Test
                </router-link>
            </li>
                <li class="nav-item">
                    <router-link to="/" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        Dashboard
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link to="/client_department" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        Department
                    </router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/client_employee" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        Employee
                    </router-link>
                </li>

        </ul>
        </aside>
      </div>




      <!-- Main Content -->
      <div class="main-content">

            <router-view></router-view>
        <!-- Progress Bar -->
            <vue-progress-bar></vue-progress-bar>
        <!-- End Progress Bar -->
        <!-- Template Customizer -->
            <template-customizer>
            </template-customizer>
        <!-- End Template Customizer -->

      </div>
    <!--End Main Content -->






      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2020 <div class="bullet"></div> Design By <a href="#">Pasindu Piyathilaka</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('js/app.js')}}"></script>
  <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="{{asset('admin/assets/js/scripts.js')}}"></script>


</body>



</html>
