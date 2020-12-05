@include('layouts.header1')

<section id="listing_outer">
   <div class="container">
      <div class="row">
         <div class="col-lg-12 col-md-8">          
            <div class="search_list_outer">
               <div class="row flter_append">
                @if(!empty($carlist))
                 @foreach($carlist as $key => $carlists)
                  <div class="col-lg-4 col-md-6">
                     <div class="ulisting-panel gry-bg">
                      <a href="{{url('deatil/'.$carlists->id)}}">
                        <div class="ulisting-img-panel" style="background: url('{{url('/images/carpost/'.$carlists->image)}}') no-repeat center;">
                         
                        </div></a>
                        <div class="ulisting-content">
                           <div class="row">
                              <div class="col-md-7 item-ulisting-title">
                                 <h4>{{$carlists->model_name}} {{$carlists->car_year}}</h4>
                                 <h2>{{$carlists->make_name}}</h2>
                              </div>
                              <div class="col-md-5 ulisting-listing-price"><span>${{$carlists->price}} </span></div>
                              <div class="col-md-12">
                                 <ul>
                                    <li><i class="fas fa-road"></i> {{$carlists->mileage}}</li>
                                    <li><i class="fas fa-gas-pump"></i> {{$carlists->fuel_name}}</li>
                                    <li><i class="fas fa-random"></i>{{$carlists->engine}}</li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                 @endif              
               </div>
            </div>
         </div>
      </div>
   </div>
</section>