@include('layouts.header1')

<section id="contact_panel">
  <div class="container">
  
<div class="login-form reset-form">
 
    
    <div class="row justify-content-center">
     <div class="col-lg-6 col-md-12">
       @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
      @endif
  <h2>FORGET PASSWORD</h2>
  	<form method="POST" action="{{url('forgot_password')}}" enctype="multipart/form-data">
               {{ csrf_field() }} 
     <div class="gray-form clearfix">

         <div class="form-group">
             <label for="name">Please Enter Your Username</label>
               <input id="name" class="form-control placeholder" type="text" placeholder="User name" name="email" required="">
            </div>
            <div class="form-group">
              
              </div> 
            
              <input class="btn primary-btn" type="submit" value="Reset Password">
          </div>
          </form> 

                   
      </div>
     </div>

    </div>
  </div>
</section>

 @include('layouts.footer1')