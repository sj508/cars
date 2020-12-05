@include('layouts.header1')
<style>
   .boxs{
      display: none;
   }
   .budd{
      display: inline-block;
      float: left;
      margin-right: 15px;
   }
</style>
   <div class="container">
      @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
      @endif
     
   </div>
<section id="add-car-listing">
   <div class="container">
       
 
      <div id="content" class="tab-content" role="tablist">
         <div id="pane-A" class="card tab-pane fade show active" role="tabpanel" aria-labelledby="tab-A">
            <!-- Note: New place of `data-parent` -->
            <form method="POST" action="{{'addcar_info'}}"  enctype="multipart/form-data">
               {{ csrf_field() }} 
               <div id="collapse-A" class="collapse show" data-parent="#content" role="tabpanel" aria-labelledby="heading-A">
                  <div class="card-body">
                     <div>
                        <div class="row">
                           <div class="col-md-3 col-sm-3">
                              <div class="form-group">
                                 <label>Select Make</label>
                                 <select name="make" required="" id="carmake_id" class="make">
                                    <option value="">Please select</option>
                                    <?php foreach ($makecar as $key=>$username): ?>
                                    <option value="<?php echo $username->id; ?>" <?php
                                       if (isset($make) && Input::old('make') == $username->name)
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
                            <span id="make_error"></span>
                           </div>
                           <div class="col-md-3 col-sm-3">
                              <div class="form-group">
                                 <label>Select Model</label>
                                 <select  name="model" required="" class="model" id="model_id">
                                    <option value="">Please select</option>
                                 </select>
                                 <i class="fa fa-angle-down"></i>
                              </div>
                                <span id="model_error"></span>
                           </div>
                           <div class="col-md-3 col-sm-3">
                              <div class="form-group">
                                 <label>Select Year</label>
                                 <select id="date-dropdown" name="car_year" required="" class="car_year">
                                    <option value="">Select year</option>
                                 </select>
                                 <i class="fa fa-angle-down"></i>
                              </div>
                               <span id="car_year_error"></span>
                           </div>
                           <div class="col-md-3 col-sm-3">
                              <div class="form-group">
                                 <label>Condition</label>
                                 <select name="condition" required="" class="condition">
                                    <option value=""> Select Condition</option>
                                    <option value="New"> New</option>
                                    <option value="Used"> Used</option>
                                 </select>
                                 <i class="fa fa-angle-down"></i>
                              </div>
                              <span id="condition_error"></span>
                           </div>
                        </div>
                     </div>
                     <div class="carinfo-other">
                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>Body</label>
                                 <select name="body" required="" class="body">
                                    <option value="">Please select</option>
                                    <?php foreach ($bodycar as $key=>$username): ?>
                                    <option value="<?php echo $username->id; ?>" <?php
                                       if (isset($body) && Input::old('body') == $username->name)
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
                              <span id="body_error"></span>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group"><label> Mileage</label>
                                 <input type="number" class="form-control mileage" name="mileage" placeholder="Enter Mileage (mi)" required="">
                              </div>
                              <span id="mileage_error"></span>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group">
                                 <label> Fuel type</label>
                                 <select name="fuel" required="" class="fuel">
                                    <option value="">Please select</option>
                                    <?php foreach ($fuelcar as $key=>$username): ?>
                                    <option value="<?php echo $username->id; ?>" <?php
                                       if (isset($fuel) && Input::old('fuel') == $username->name)
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
                              <span id="fuel_error"></span>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group"><label>Engine</label>
                                <!--  <input type="number" class="form-control " name="engine" placeholder="Enter  Engine"> -->
                                 <select class="form-control engine" name="engine" required="">
                                <option value="">Please select</option>
                                <option value="Automatic">Automatic</option>
                                <option value="Mannual">Mannual</option>
                                <option value="Electric">Electric</option>
                              </select>
                              <i class="fa fa-angle-down"></i>
                              </div>
                              <span id="engine_error"></span>
                           </div>
                           <div class="col-md-3">
                              <div class="form-group">
                                 <label> Exterior Color </label>
                                 <select  name="exterior_color" required="" class="exterior_color">
                                    <option value="">Please select</option>
                                    <?php foreach ($colorcar as $key=>$username): ?>
                                    <option value="<?php echo $username->id; ?>" <?php
                                       if (isset($exterior_color) && Input::old('exterior_color') == $username->name)
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
                                <span id="exterior_color_error"></span>
                           </div>


                           <div class="col-md-3">
                              <div class="form-group">
                                 <label>   Interior  Color </label>
                                 <select  name="interior_color" required="" class="interior_color">
                                    <option value="">Please select</option>
                                    <?php foreach ($colorcar as $key=>$username): ?>
                                    <option value="<?php echo $username->id; ?>" <?php
                                       if (isset($interior_color) && Input::old('interior_color') == $username->name)
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
                              <span id="interior_color_error"></span>
                           </div>


                           <div class="col-md-3">
                              <div class="form-group"><label>Registered  </label>
                                 <input type="date" class="form-control registered" placeholder="Enter date" name="registered" required="">
                              </div>
                               <span id="registered_error"></span>
                           </div>

                           <div class="col-md-3">
                              <div class="form-group"><label>  VIN  </label>
                              <input type="text" class="form-control vin_no" placeholder=" Enter VIN" name="vin_no" required="">
                              </div>
                              <span id="vin_no_error"></span>
                           </div>

                            <div class="col-md-3">
                              <div class="form-group"><label> Price  </label>
                           <input type="number"  name="price" placeholder="Enter Price" class="form-control">
                           </div>
                        </div>

                            <div class="col-md-3">
                              <div class="form-group"><label> Image  </label>
                           <input type="file"  name="img" class="form-control" required="">
                           </div>
                        </div>

                     
                           </div>
                           <!-- OTHER FEATURES-->
                        </div>
                     </div>
                     <h3>Select Your Car Features</h3>
                     <div class="carfeatures">
                        <div class="stm-single-feature">
                           <div class="heading-font">Comfort</div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="A/C: Front" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>A/C: Front</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="A/C: Rear" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>A/C: Rear</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Backup Camera" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>Backup Camera</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Cruise Control" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>Cruise Control</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Navigation" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>Navigation</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Power Locks" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>Power Locks</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Power Steering" name="comfort[]">
                                    </span>
                                 </div>
                                 <span>Power Steering</span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="carfeatures">
                        <div class="stm-single-feature">
                           <div class="heading-font">Entertainment</div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="AM/FM Stereo" name="entertainment[]">
                                    </span>
                                 </div>
                                 <span>AM/FM Stereo</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="CD Player" name="entertainment[]">
                                    </span>
                                 </div>
                                 <span>CD Player</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="DVD System" name="entertainment[]"></span>
                                 </div>
                                 <span>DVD System</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="MP3 Player" name="entertainment[]">
                                    </span>
                                 </div>
                                 <span>MP3 Player</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Portable Audio" name="entertainment[]">
                                    </span>
                                 </div>
                                 <span>Portable Audio</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Premium Audio" name="entertainment[]">
                                    </span>
                                 </div>
                                 <span>Premium Audio</span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="carfeatures">
                        <div class="stm-single-feature">
                           <div class="heading-font">Safety</div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Airbag: Driver" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Airbag: Driver</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Airbag: Passenger" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Airbag: Passenger</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Antilock Brakes" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Antilock Brakes</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Bluetooth" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Bluetooth</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Hands-Free" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Hands-Free</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Fog Lights" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Fog Lights</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Security System" name="safety[]">
                                    </span>
                                 </div>
                                 <span>Security System</span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="carfeatures">
                        <div class="stm-single-feature">
                           <div class="heading-font">Seats</div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Bucket Seats" name="seats[]">
                                    </span>
                                 </div>
                                 <span>Bucket Seats</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Heated Seats" name="seats[]">
                                    </span>
                                 </div>
                                 <span>Heated Seats</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Leather Interior" name="seats[]">
                                    </span>
                                 </div>
                                 <span>Leather Interior</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Memory Seats" name="seats[]">
                                    </span>
                                 </div>
                                 <span>Memory Seats</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Power Seats" name="seats[]">
                                    </span>
                                 </div>
                                 <span>Power Seats</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Third Row Seats" name="seats[]">
                                    </span>
                                 </div>
                                 <span>Third Row Seats</span>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="carfeatures">
                        <div class="stm-single-feature">
                           <div class="heading-font">Windows</div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Power Windows" name="windows[]">
                                    </span>
                                 </div>
                                 <span>Power Windows</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker">
                                    <span>
                                    <input type="checkbox" value="Windows Defroster" name="windows[]">
                                    </span>
                                 </div>
                                 <span>Windows Defroster</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Rear Window" name="windows[]">
                                    </span>
                                 </div>
                                 <span>Rear Window</span>
                              </label>
                           </div>
                           <div class="feature-single">
                              <label>
                                 <div class="checker"><span>
                                    <input type="checkbox" value="Wiper Tinted Glass" name="windows[]">
                                    </span>
                                 </div>
                                 <span>Wiper Tinted Glass</span>
                              </label>
                           </div>
                        </div>
                     </div>
           
               </div>
              
         </div>
    

           
                     <div class="input-group mb-3 group-end">
                       
                        <input id="next_first" class="btn btn-success btnSubmit btnNext" type="submit">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

</form>
</section>

 @include('layouts.footer1')