<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/ready.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/demo.css') }}">
</head>
<body>
<div class="wrapper">
    <div class="main-header">
        <div class="logo-header">
            <a href="{{ route('dashboard') }}" class="logo">
                لوحة التحكم
            </a>
        </div>
        <nav class="navbar navbar-header navbar-expand-lg">
            <div class="container-fluid">
                <form class="navbar-left navbar-form nav-search mr-md-3" action="">
                    <div class="input-group">
                        <input type="text" placeholder="بحث ..." class="form-control">
                        <div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="{{ asset('assets/dashboard/img/profile.jpg') }}" alt="user-img" width="36" class="img-circle"><span>{{ Auth::user()->name }}</span></span> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <div class="user-box">
                                    <div class="u-img"><img src="{{ asset('assets/dashboard/img/profile.jpg') }}" alt="user"></div>
                                    <div class="u-text">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </li>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i> تسجيل الخروج
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="sidebar">
        <div class="scrollbar-inner sidebar-wrapper">

            <ul class="nav">
                <li class="nav-item active">
                    <a href="{{ route('dashboard') }}">
                        <i class="la la-dashboard"></i>
                        <p>لوحة التحكم</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('users.index') }}">
                        <i class="la la-users"></i>
                        <p>المستخدمين</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('countries.index') }}">
                        <i class="la la-globe"></i>
                        <p>الدول</p>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('cities.index') }}">
                        <i class="la la-building"></i>
                        <p>المدن</p>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="{{ route('services.index') }}">
                        <i class="la la-list-ol"></i>
                        <p>الخدمات</p>
                    </a>
                </li>

                <li class="nav-item active">
                    <a href="{{ route('providers.index') }}">
                        <i class="la la-user-secret"></i>
                        <p>مزودي الخدمات</p>
                    </a>
                </li>


            </ul>
        </div>
    </div>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
{{--                <h4 class="page-title">@yield('template_title')</h4>--}}
                @yield('content')
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
                <p>
                    <b>We'll let you know when it's done</b></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{ asset('assets/dashboard/js/core/jquery.3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/chartist/chartist.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js') }}"></script>
{{--<script src="{{ asset('assets/dashboard/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>--}}
<script src="{{ asset('assets/dashboard/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/jquery-mapael/maps/world_countries.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/ready.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/demo.js') }}"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.0.0/js/bootstrap.min.js"></script>
</html>
