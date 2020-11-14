<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Get Bill</title>
        <link rel="shortcut icon" type="text/css" href="{{asset('image/Printer.PNG')}}" type="image/x-icon" />
        <link href="{{asset('bootstrap/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/my.css')}}">
        <script src="{{asset('bootstrap/all.min.js')}}" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route('home')}}">Get Bill</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('setting')}}">Settings</a>
                        <a class="dropdown-item" href="{{route('profile')}}">Profile</a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{route('home')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Bill Managemt</div>
                            <a class="nav-link" href="{{route('bill-index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Bill Generation
                            </a>
                            <a class="nav-link" href="{{route('bill.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                View Bill
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @include('partial.errors')
                    @include('partial.error')
                    @include('partial.sucess')
                    @yield('content')
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{asset('bootstrap/jquery-3.5.1.min.js')}}" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{asset('bootstrap/printThis.js')}}"></script>
    <script src="{{asset('bootstrap/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/scripts.js')}}"></script>
   <!--  <script src="{{asset('bootstrap/Chart.min.js')}}" crossorigin="anonymous')}}"></script>
    <script src="{{asset('bootstrap/chart-area-demo.js')}}"></script>
    <script src="{{asset('bootstrap/chart-bar-demo.js')}}"></script> -->
    <script src="{{asset('bootstrap/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/datatables-demo.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/my.js')}}"></script>
    @yield('script')
</body>
</html>