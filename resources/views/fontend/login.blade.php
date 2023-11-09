@extends('fontend.layouts.main')

@section('body')

    @include('fontend.layouts.menu')

<!-- Breadcrumb Section Begin -->
    @include('fontend.layouts.breadcrumb')


    <div class="login-page text-center" >
        <div class="login-box">
          <div class="login-logo mb-3">
            <h3><b>{{ $title }}</b></h3>
          </div>
          <!-- /.login-logo -->
          <div class="card">
            <div class="card-body login-card-body">
              <p class="login-box-msg">Sign in to start your session</p>
              @include('fontend.layouts.alert')

              <form action="/admin/login/store" method="post">
                <div class="input-group mb-3">
                  <input type="email" name='email' class="form-control" placeholder="Email" value="{{ old('email') }}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" name='password' class="form-control" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember" name="remember"> 
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                  <!-- /.col -->
                </div>
                @csrf
              </form>
        
              <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                  <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                  <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
              </div>
              <!-- /.social-auth-links -->
        
              
              <p class="mb-0">
                <a href="register" class="text-center">Register a new membership</a>
              </p>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
    </div>


@endsection