 @include('layouts.header1')


<section id="contact_panel">
  <div class="container">
    
                    @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif

<div class="login-form">

    
    <div class="row justify-content-center">
     <div class="col-lg-6 col-md-12">
       <!-- <h3>Log in with your id or social media </h3> -->
  <h2>Login To Your Account</h2>
   <form class="form-horizontal" method="POST" action="{{url('users_login')}}">
      {{ csrf_field() }}
     <div class="gray-form clearfix">

         <div class="form-group">
             <label for="name">User name* </label>
               <input id="name" class="form-control placeholder" type="text" placeholder="User name" name="email">
               @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
             <label for="Password">Password* </label>
               <input id="Password" class="form-control placeholder" type="password" placeholder="Password" name="password">
                @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
              </div> 


            <div class="form-group">
              <div class="remember-checkbox mb-4">
                 <input type="checkbox" name="one" id="one">
                 <label for="one"> Remember me</label>
                 <a href="{{url('forgot_password')}}" class="float-right">Forgot Password?</a>
                </div>
              </div>
              <input class="btn primary-btn" type="submit" value="Login">
          </div> 
      </form>
                   
      </div>
     </div>

    </div>
  </div>
</section>
