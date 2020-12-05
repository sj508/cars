@include('layouts.header1')

 @if (Session::has('message'))
      <div class="alert alert-success">{{ Session::get('message') }}</div>
 @endif


<section id="detail_outer">
  <div class="container">
  	 @if(!empty($detail))
     @foreach($detail as $key => $details)
    <div class="row">
      <div class="col-lg-8 col-md-12">
        <h1>{{$details->car_year}} {{$details->model_name}}</h1>
        <div class="detail_slider">
          <div id="slider" class="flexslider">
          <ul class="slides">
            <li><img src="{{url('/images/carpost/'.$details->image)}}" /></li>
          </ul>
        </div>    
     </div> 
  </div>
      <div class="col-lg-4 col-md-12 autoshowroom-sidebar">
        <p class="pcd-pricing"><span class="pcd-price"><b>  </b> ${{$details->price}} </span><span class="pcd-price-msrp"> MSRP:  ${{$details->price}} </span></p>
        <div class="vehicle-box">
          <h3>Specifications</h3>
          <table width="100%">
             <tr>
         <th>Make</th>
         <td>{{$details->make_name}}</td>
      </tr>
      <tr>
         <th>Model</th>
         <td>{{$details->model_name}}</td>
      </tr>
      <tr>
         <th>Registration date</th>
         <td>{{$details->registered}}</td>
      </tr>
      <tr>
         <th>Mileage</th>
         <td>{{$details->mileage}} mi </td>
      </tr>
      <tr>
         <th>Condition</th>
         <td>{{$details->condition}}</td>
      </tr>
      <tr>
         <th>Exterior Color</th>
         <td>{{$details->exterior_name}}</td>
      </tr>
      <tr>
         <th>Interior Color</th>
         <td>{{$details->interior_name}}</td>
      </tr>
      <tr>
         <th>Transmission</th>
         <td>{{$details->engine}}</td>
      </tr>
            <tr>
              @if($rating)
              <th>
             @for($i=0; $i < $rating[0]->mileage; ++$i)
              <i style="color: yellow;" class="fa fa-star"></i>
               @endfor
            </th>
           
            @else
            <th>
            <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              </th>
           
            @endif
          </tr>
          </table>
          @if($user = Auth::guard('customer')->user())
          <a data-toggle="modal" data-target="{{'#delete_car'}}">Rating</a>
          @else
          <a href="{{url('user_login')}}">Rating this car..</a>
          @endif
        </div>

      </div>
    </div>
     @endforeach
     @endif
  </div>
</section>
                             @if($user = Auth::guard('customer')->user())
                        
                            <div class="modal fade none-border" id="{{'delete_car'}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                               @if(!empty($detail))
                                                 @foreach($detail as $key => $details)
                                               <img width="50px;" src="{{url('/images/carpost/'.$details->image)}}" /> 
                                               <h6> {{$details->model_name}}</h6>
                                              
                                         <form method="POST" action="{{url('rate')}}" enctype="multipart/form-data">
                                         {{ csrf_field() }}     
                                              <div class="modal-body">
                                                <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                                <h2>Rate your Experience</h2>
                                                <label class="control-label">Mileage
                                                 <input type="number" name="mileage" min="1" max="5" value="1" /></label>

                                                 <label class="control-label">Maintance Cost
                                                 <input type="number" name="maintance" min="1" max="5" value="1" /></label>

                                                 <label class="control-label">Comfort
                                                 <input type="number" name="comfort" min="1" max="5" value="1" /></label>

                                                  <input type="hidden" name="user_id" value="{{$user->id}}" /></label>

                                                   <input type="hidden" name="pro_id" value="{{$details->id}}" /></label>
                                                </div>

                                                @endforeach
                                                @endif  
                                                      
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
            
                                                         <button type="submit" class="btn btn-danger waves-effect waves-light" >submit</button>
                                                    </div>
                                          </form>
                                                     
                                          </div>
                                      </div>
                                  </div>
                                         @endif 


 @include('layouts.footer1')