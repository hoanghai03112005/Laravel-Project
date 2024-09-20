{{-- <!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        
        <div class="container">
            
            <div class="col-md-4 col-md-offset-4">
                <form action="" method="POST" role="form">
                    @csrf 
                    <legend>Register</legend>
                    
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Input name">
                    </div>

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Input email">
                    </div>
        
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Input password">
                    </div>

                    <div class="form-group">
                        <label for="">Confirm password</label>
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password">
                    </div>
                
                    <p>Have account? <a href="{{ route('admin.login') }}">Login</a></p>
                
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        
            </div>
            
        </div> --}}


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
                        <h3 class="card-title text-left mb-3">Register</h3>
        
        
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control p_input">
                                @error('name')
                                    <p class="text-danger">{{$message}}</p>
                                @enderror
                              </div>
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

                          <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" name="confirm_password" class="form-control p_input">
                            @error('confirm_password')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                          </div>
        
                         
        
                          <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                          </div>
                          
                          <p class="sign-up">Have an Account?<a href="{{ route('admin.login') }}"> Login </a></p>
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