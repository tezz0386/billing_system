<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Get Bill</title>
        <link rel="shortcut icon" type="text/css" href="{{asset('image/Printer.PNG')}}">
        <link href="{{asset('bootstrap/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" type="text/css" href="{{asset('bootstrap/my.css')}}">
        <script src="{{asset('bootstrap/all.min.js')}}" crossorigin="anonymous"></script>
    </head>



  <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                         <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" required="required" />
                                                 @if ($errors->has('email'))
                                                     <span class="help-block">
                                                         <strong>{{ $errors->first('email') }}</strong>
                                                     </span>
                                                 @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" required="required" />
                                                 @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                     <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="rememberPasswordCheck"  >
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small"  href="{{ route('password.request') }}">Forgot Password?</a>
                                                <button class="btn btn-primary" type="submit">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
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
    <script src="{{asset('bootstrap/Chart.min.js')}}" crossorigin="anonymous')}}"></script>
    <script src="{{asset('bootstrap/chart-area-demo.js')}}"></script>
    <script src="{{asset('bootstrap/chart-bar-demo.js')}}"></script>
    <script src="{{asset('bootstrap/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('bootstrap/datatables-demo.js')}}"></script>
    <script type="text/javascript" src="{{asset('bootstrap/my.js')}}"></script>
    @yield('script')
</body>
</html>