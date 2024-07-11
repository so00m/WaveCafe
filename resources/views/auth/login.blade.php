<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.includes.head2')
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">

        <!----------- log in form------------------->
        <div class="animate form login_form">
          <section class="login_content">
            <form  method="POST" action="{{ route('login') }}">
              @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" placeholder="Username" value="{{ old('user_name') }}" required autofocus />
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password" required="" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>    
                <button type="submit" style="border: none; background: none;"> Login </button>
                <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Beverages Admin</h1>
                  <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <!-----------end log in form-------------------------->

        
        <!------------registeration form---------------------->
        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="POST" action="{{ route('register') }}" >
              @csrf
              <h1>Create Account</h1>

              <div>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                 name="name" placeholder="Full Name"  value="{{ old('name') }}" required autofocus/>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input id="user_name" type="text" class="form-control @error('user_name') is-invalid @enderror"
                 name="user_name" placeholder="User Name"  value="{{ old('user_name') }}" required autofocus/>
                @error('user_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                 name="email"  placeholder="Email" value="{{ old('email') }}" required />
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              
              </div>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                 name="password"  placeholder="Password" required >
                @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              
              </div>
              
              <div>
                <button type="submit" style="border: none; background: none;">
                  Submit
                </button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-graduation-cap"></i></i> Beverages Admin</h1>
                  <p>©2016 All Rights Reserved. Beverages Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
        <!-------------------end registeration form----------------------------->
     
      </div>
    </div>
  </body>
</html>
