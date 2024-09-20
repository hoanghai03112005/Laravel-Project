<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="backend/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="backend/vendors/css/vendor.bundle.base.css">
    
    <link rel="stylesheet" href="backend/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="backend/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Login</h3>

                @if (Session::has('no'))
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong class="mdi mdi-alert btn-icon-prepend"></strong> {{Session::get('no')}}
              </div>
                @endif

                <form method="POST">
                    @csrf
                  <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control p_input">
                    @error('email')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control p_input">
                    @error('password')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>

                  <div class="form-group d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" name="remember" class="form-check-input"> Remember me </label>
                    </div>
                    <a href="#" class="forgot-pass">Forgot password</a>
                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                 
                  <p class="sign-up">Don't have an Account?<a href="{{ route('admin.register') }}"> Sign Up</a></p>
                </form>
              </div>
            </div>
          </div>
         
        </div>
       
      </div>
      
    </div>
    
    <script src="backend/vendors/js/vendor.bundle.base.js"></script>
    
    <script src="backend/js/off-canvas.js"></script>
    <script src="backend/js/hoverable-collapse.js"></script>
    <script src="backend/js/misc.js"></script>
    <script src="backend/js/settings.js"></script>
    <script src="backend/js/todolist.js"></script>
    
  </body>
</html>