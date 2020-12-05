@include('layouts.header1')
<section id="contact_panel">
  <div class="container">
 
<div class="login-form reset-form">
 
    
    <div class="row justify-content-center">
     <div class="col-lg-6 col-md-12">
       
  <h2>Reset your password</h2>

     <div class="gray-form clearfix">
          <form method="POST" action="{{url('reset_password')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
         <div class="form-group">
              <label for="name">Please Enter Your New Password</label>
               <input type="hidden" name="email" value="{{$tblemail}}">
          <input id="new" class="form-control placeholder" type="password" placeholder="New Password" value="" name="web">

          <input id="cfpassword" class="form-control placeholder" type="password" value="" placeholder="Confirm Password" name="webcf" style="
              margin-top: 20px;
          ">

            </div>
            <span id="password"></span>
            
            <div class="form-group">
             

               
              </div> 
            
              <input class="btn primary-btn" type="submit" id="reset" value="Reset Password">
          </div> 
                   
      </div></form>
     </div>

    </div>
  </div>
</section>
 @include('layouts.footer1')