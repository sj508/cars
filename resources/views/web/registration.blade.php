
 @include('layouts.header1')

<section id="contact_panel">
  <div class="container">
    
<div class="login-form">
 
    
    <div class="row justify-content-center">
     <div class="col-lg-8 col-md-12">
       <h3>Welcome to  </h3>
  <h2> Car Dealer</h2>
   @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                           

  <form class="form-horizontal" method="POST" action="{{url('register')}}">
        {{ csrf_field() }}
    <div class="gray-form">
           <div class="row">
           <div class="form-group col-md-6">
             <label>Your Name*</label>
                <input class="form-control placeholder" type="text" placeholder="Your Name" name="name" required="">
            </div> 

            <div class="form-group col-md-6">
             <label>Last Name*</label>
              <input class="form-control placeholder" type="text" placeholder="Last Name" name="last_name" required="">
             </div>

            </div>

           <div class="form-group">
             <label>User name* </label>
            <input class="form-control placeholder" type="text" placeholder="Choose your user name" name="user_name" required="">
            </div>

            <div class="form-group">
             <label>Password* </label>
               <input class="form-control placeholder" type="text" placeholder="Password" name="password" required="">
                @if ($errors->has('password'))
                     <span class="help-block">
                         <strong>{{ $errors->first('password') }}</strong>
                     </span>
                @endif
            </div>

            <div class="form-group">
             <label>Re-enter Password*</label>
               <input class="form-control placeholder" type="password" placeholder="Password" name="cnf_password" required="">
                @if ($errors->has('cnf_password'))
                    <span class="help-block alert-danger">
                        <strong>{{ $errors->first('cnf_password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
             <label>Email *</label>
               <input class="form-control placeholder" type="text" placeholder="Enter your email" name="email" required="">
            </div>

            <div class="form-group">
             <label>Mobile phone *</label>
               <input id="phone" class="form-control placeholder" type="text" placeholder="Enter your mobile no" name="mobile" required="">
            </div>

            <label>Your birthday *</label>
            <div class="row">
             <div class="form-group col-md-4">
                <select class="select-hidden" name="day" required="">
                      <option value="">Select Day</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>  
                        <option value="17">17</option>  
                        <option value="18">18</option>  
                        <option value="19">19</option>  
                        <option value="20">20</option>  
                        <option value="21">21</option>  
                        <option value="22">22</option>  
                        <option value="23">23</option>  
                        <option value="24">24</option>  
                        <option value="25">25</option>  
                        <option value="26">26</option>  
                        <option value="27">27</option>  
                        <option value="28">28</option>  
                        <option value="29">29</option>  
                        <option value="30">30</option>  
                        <option value="31">31</option>  
                    </select><i class="fa fa-angle-down"></i>
                </div>
                <div class="form-group col-md-4">
                <select class="select-hidden" name="month" required="">
                        <option value="">Select Month</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                     </select>
                  <i class="fa fa-angle-down"></i>
                </div>

                <div class="form-group col-md-4">
                <select id="date-dropdowns" name="year" required="">
                <option value="">Select year</option>
                </select>
                <i class="fa fa-angle-down"></i>
                  </div>

                </div>

                <div class="form-group">
                 <label for="phone">Select Country *</label>
                  <div class="auto-hight">
                    <div class="select">
                   <select name="country" id="countrys" required="">
                                    <option value="">Please select</option>
                                    <?php foreach ($country as $key=>$username): ?>
                                    <option value="<?php echo $username->name; ?>" <?php
                                       if (isset($countrys) && Input::old('countrys') == $username->name)
                                       {
                                           echo 'selected="selected"';
                                       }
                                       ?>>
                                       <?php  echo $username->name; ?>
                                    </option>
                                    <?php endforeach; ?>
                                 </select>
                    <i class="fa fa-angle-down"></i>
                  </div>
              </div>
                </div>


                <div class="form-group">
                 <label>Gender *</label>
                  <select class="select-hidden" name="gender">
                        <option value="">Select gender</option>
                        <option value="male">male</option>
                        <option value="female">Female</option>
                        <option value="Other">Other</option>
                    </select><i class="fa fa-angle-down"></i>
                   </div> 
               
                 <div class="form-group">
                  <div class="remember-checkbox">
                     <input type="checkbox" id="one">
                      <label for="one">Accept our <a href="#"> privacy policy</a> and <a href="#"> customer agreement</a></label>
                     </div>
                     </div> <div class="form-group">
                     <input class="btn primary-btn" type="submit" value="Register an account ">

                </div>
            </form>
                   <p class="link">Already have an account? please <a href="{{url('user_login')}}"> login here </a></p>
               </div>
             
                   
      </div>
     </div>

    </div>
  </div>
</section>



