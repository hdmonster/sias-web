<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Student</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo-text.png">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="/dist/css/util.css">
  <link rel="stylesheet" type="text/css" href="/dist/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form" action="{{ route('students.authenticate') }}" method="POST">
          @csrf
          <span class="login100-form-title p-b-26">
            Welcome Student
          </span>
          <span class="login100-form-title p-b-48">
            <img src="/assets/images/logo-text.png" width="150px">
          </span>
          @if(Session::has('error'))
            <p style="color: red; text-align: center;"> {{ Session::get('error') }} </p>
          @endif
             
            
            <div class="form-group">
              <div class="wrap-input100 validate-input">
                <input class="input100 is-invalid" type="text" name="nisn" value="{{ old('nisn') }}">
                <span class="focus-input100" data-placeholder="NISN" required></span>
              </div>
            </div>

            <div class="form-group">
              <div class="wrap-input100 validate-input" data-validate="Enter password" required>
                <span class="btn-show-pass">
                  <i class="zmdi zmdi-eye"></i>
                </span>
                <input class="input100" type="password" name="password">
                <span class="focus-input100" data-placeholder="Password"></span>
              </div>
            </div>
  
            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="submit">
                  Login
                </button>
              </div>
            </div>

          </form>

          <div class="text-center p-t-50">
            <span class="txt1">
              Don’t have an account? Contact your admin!
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="/dist/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="/dist/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="/dist/vendor/bootstrap/js/popper.js"></script>
  <script src="/dist/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="/dist/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="/dist/vendor/daterangepicker/moment.min.js"></script>
  <script src="/dist/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="/dist/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="/dist/js/main.js"></script>

</body>

</html>