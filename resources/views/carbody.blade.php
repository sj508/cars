@include('layouts.header')
@include('layouts.sidebar')
<style>
    .three-dot{
  left: 0!important;
  top: 7px;
}
.page-titles{
  text-align: right;
}
.page-titles .header-title{
  display: inline-block;
    text-align: right;
}
</style>
                                      
 
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">Car body List</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                            <!-- ADD GROUP  -->
                
                            <div class="col-lg-12 p-l-0">
                          
                                <div class="stat-widget-eight">
                                    <div class="stat-header page-titles">
                                        <div class="header-title">Car Body manage</div>
                                        <div class="card-option drop-menu pull-right"><i class="ti-more-alt three-dot" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="link"></i>
                                            <ul class="card-option-dropdown dropdown-menu">
                                                <!-- <li><a href="#" data-toggle="modal" data-target="#add-usertype"><i class="ti-menu-alt"></i>Add Category</a></li>

                                                 <li><a href="#" data-toggle="modal" data-target="#add-subcategory"><i class="ti-menu-alt"></i>Add sub Category</a></li> -->

                                                <li><a href="#" data-toggle="modal" data-target="#add-users"><i class="ti-pulse"></i>Add Car Body</a></li>
                                               
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                      

                                <!--# ADD GROUP  -->       
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Car Body List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                   
                                                    <th>Name</th>
                                            
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                      <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>


                                                <tr>
                                                    
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->created_at}}</td>
                                         <td class="action_btn">
                                      <!--   <a class="ac_btn" href=""><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                        <a class="ac_btn" href="{{url('edit_carbody/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                         <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_car'.$user->id}}" onclick="{{$user->id}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                
                                        


                                    </td>
                                                </tr>
                                                <?php  $i++;}}} ?>
                                            </tbody>
                                        </table>
                                  <div class="center" align="center">  {!! $users->render() !!}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>This dashboard was generated on <span id="date-time"></span> <a href="#" class="page-refresh">Refresh Dashboard</a></p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

                    
 <!--MODAL -->
                                            @if(!empty($users))
                                            @foreach($users as $key => $user)  
                            <div class="modal fade none-border" id="{{'delete_car'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete Car Body</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Delete car body??</h2>
                                        <p>Are you Sure you want to delete it?</p>
                                             </div>   

                                                   
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_carbody/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                         @endforeach
                                         @endif 
    <!--END MODAL -->






 <!--MODAL -->
    <div class="modal fade none-border" id="add-users">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title"><strong>Add Car Body</strong></h4>
         </div>
         <div class="modal-body">
            <form method="POST" action="{{'create_body'}}" enctype="multipart/form-data">
               {{ csrf_field() }}
               <div class="row">

                 

                   <div class="col-md-12">
                     <label class="control-label">Car Body Name</label>
                     <input class="form-control form-white" placeholder="Enter Name" type="text" name="name" />
                     @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                  </div>

              </div>

<br>
               <div class="modal-footer">
                  <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-danger waves-effect waves-light save-category">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
                         
                 <!-----END MODAL -->
<script>
  /**
 * Chosen: Multiple Dropdown
 */
window.WDS_Chosen_Multiple_Dropdown = {};
( function( window, $, that ) {

  // Constructor.
  that.init = function() {
    that.cache();

    if ( that.meetsRequirements ) {
      that.bindEvents();
    }
  };

  // Cache all the things.
  that.cache = function() {
    that.$c = {
      window: $(window),
      theDropdown: $( '.dropdown' ),
    };
  };

  // Combine all events.
  that.bindEvents = function() {
    that.$c.window.on( 'load', that.applyChosen );
  };

  // Do we meet the requirements?
  that.meetsRequirements = function() {
    return that.$c.theDropdown.length;
  };

  // Apply the Chosen.js library to a dropdown.
  // https://harvesthq.github.io/chosen/options.html
  that.applyChosen = function() {
    that.$c.theDropdown.chosen({
      inherit_select_classes: true,
      width: '300px',
    });
  };

  // Engage!
  $( that.init );

})( window, jQuery, window.WDS_Chosen_Multiple_Dropdown );
</script>
   @include('layouts.footer')