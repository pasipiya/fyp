<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SL_Fleet_Tracking') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/summernote/summernote-bs4.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/bundles/pretty-checkbox/pretty-checkbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <!-- Custom style CSS -->

    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin/assets/img/favicon.ico') }}' />
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
                            <img alt="image" src="{{ asset('admin/assets/img/user.png') }}"
                                class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">{{ Auth::user()->name }}</div>
                            <!--
                            <router-link to="/profile" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </router-link>
                        -->

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
                        <a href="{{ url('/home') }}">
                            <img alt="image" src="{{ asset('admin/assets/img/logo.png') }}" class="header-logo" />
                            <span class="logo-name"></span>
                        </a>
                    </div>

                    {{-- Admin --}}
                    @if (Auth::check() && Auth::user()->is_role == 'Super')
                        <ul class="sidebar-menu">
                            <li class="menu-header">Main</li>
                            <li>
                                <router-link to="/AdminDashboard" class="nav-link">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span> Dashboard</span>
                                </router-link>
                            </li>

                            <!--Company-->
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-cogs"></i><span>Company</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <router-link to="/admin_users_details" class="nav-link">
                                            Users
                                        </router-link>
                                    </li>
                                    <li>
                                        {{-- <router-link to="/vehicle_inspection" class="nav-link">
                              Vehicle Inspection
                          </router-link> --}}
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <router-link to="/accident_hot_spots" class="nav-link">
                                    <i class="fas fa-layer-group"></i><span>Accident Hot Spots</span>
                                </router-link>
                            </li>
                            <li>
                                <router-link to="/pabx_admin" class="nav-link">
                                    <i class="fas fa-layer-group"></i><span>PABX Admin</span>
                                </router-link>
                            </li>

                            <!--
                            <li>
                                <router-link to="/profile" class="nav-link">
                                    <i class="fas fa-user-circle"></i><span>Profile</span>
                                </router-link>
                            </li>
                        -->
                        </ul>
                    @endif


                    {{-- Client --}}
                    @if (Auth::check() && Auth::user()->user_type == 'Client')
                        <ul class="sidebar-menu">
                            <li class="menu-header">Main</li>
                            <li>
                                <router-link to="/ClientDashboard" class="nav-link">
                                    <i class="fas fa-tachometer-alt"></i>
                                    <span> Dashboard</span>
                                </router-link>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-users"></i><span>Users</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <router-link to="/employee" class="nav-link">
                                            Employee
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-car"></i><span>Vehicles</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <router-link to="/manage_vehicles" class="nav-link">
                                            Manage Vehicles
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/vehicle_inspection" class="nav-link">
                                            Vehicle Inspection
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <router-link to="/client_department" class="nav-link">
                                    <i class="nav-icon fas fa-building"></i>
                                    <span> Department</span>
                                </router-link>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-car"></i><span>Track
                                        People</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <router-link to="/test_admin_view" class="nav-link">
                                            Map
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/test_admin_view" class="nav-link">
                                            Tracking management
                                        </router-link>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i class="fas fa-car"></i><span>Soft
                                        PABX</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <router-link to="/PABXnumbers" class="nav-link">
                                            PABX Numbers
                                        </router-link>
                                    </li>
                                </ul>
                            </li>

                            <!--Settings-->
                            <li class="dropdown">
                                <a href="#" class="nav-link has-dropdown"><i
                                        class="fas fa-cogs"></i><span>Settings</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <router-link to="/general_settings" class="nav-link">
                                            General Settings
                                        </router-link>
                                    </li>
                                    <li>
                                        <router-link to="/alert_settings" class="nav-link">
                                            Alert Settings
                                        </router-link>
                                    </li>
                                </ul>
                            </li>
                            <!--
                            <li>
                                <router-link to="/profile" class="nav-link">
                                    <i class="fas fa-user-circle"></i><span>Profile</span>
                                </router-link>
                            </li>
                        -->
                        </ul>

                    @endif
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">

                <router-view></router-view>
                <!-- Progress Bar -->
                <vue-progress-bar></vue-progress-bar>
                <!-- End Progress Bar -->
                <!-- Template Customizer -->
                {{-- <template-customizer>
            </template-customizer> --}}
                <!-- End Template Customizer -->

            </div>
            <!--End Main Content -->


            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2021 <div class="bullet"></div> Developed By <a href="#">Faculty of
                        Engineering</a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
    <!-- JS Libraies -->
    <script src="{{ asset('admin/assets/bundles/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>


</body>

</html>
