
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LMAO 3D</title>
    <!-- Custom fonts for this template-->
    <link href="{{URL::asset('Content/lib/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{URL::asset('Content/css/portals.css')}}" rel="stylesheet">
<body id="intro">

<!--##################################################################################################-->
<div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form method="POST" action="{{ route('client.register.submit') }}" >
                    @csrf
                    <div class="form-group">
                        <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Full Name" autocomplete="off" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                   </div>
                    <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Email Address" autocomplete="off">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                           <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="off">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                        <div class="col-sm-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm Password" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                        <input type="radio" id="exampleInputPassword" name="gender" value="Male">Male 
                        <input type="radio" id="exampleInputPassword" name="gender" value="Female">Female 
                        <input type="radio" id="exampleInputPassword" name="gender" value="Others">Others
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Sign Up
                    </button>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Sign Up with Google
                    </a>
                    </form>
                    <hr>
                    <div class="text-center">
                    <a class="small" href="{{route('client.login')}}">Already have an account? Login!</a>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
     <!--   <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright text-center">
                    <p>
                        &copy; Copyright <strong>LMAO 3D</strong>. All Rights Reserved
                    </p>
                    </div>
                    <div class="credits">

                    Designed by <a href="#">Team LMAO 3D</a>
                    </div>
                </div>
                </div>
            </div>
        </div>-->
</div>




  <!-- Bootstrap core JavaScript-->
  <script src="{{URL::asset('Content/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{URL::asset('Content/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{URL::asset('Content/lib/wow/wow.min.js')}}"></script>
  <script src="{{URL::asset('Content/lib/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{URL::asset('Content/js/portal.js')}}"></script>
</body>
</html>