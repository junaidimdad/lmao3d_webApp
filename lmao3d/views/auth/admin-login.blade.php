
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


<!--############################################################################-->
<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
          <div class="col-lg-6">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <form method="POST" action="{{ route('admin.login.submit') }}" class="user">
               @csrf
                <div class="form-group">
                 <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" aria-describedby="emailHelp" placeholder="Enter Email Address..." autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password"  placeholder="Password" required autocomplete="off">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
               
               
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                  <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Login
                </button>
              </form>
              <hr>
              <div class="text-center">
                    @if (Route::has('password.request'))
                    <a class="small" href="{{ route('admin.password.request') }}">Forgot Password?</a>
                    @endif
              </div>
              <div class="text-center">
                <a class="small" href="{{ route('register') }}">Create an Account!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

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