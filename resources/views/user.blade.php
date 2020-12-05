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
                                    <li class="active">User List</li>
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
                          
                           
                      

                                <!--# ADD GROUP  -->       
                <!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>User List </h4>
                                    
                                </div>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                                              
                                                <tr>
                                                    <th>Image</th>
                                                    <th>First Name</th>
                                                     <th>Last Name</th>
                                                     <th>Gender</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Date of birth</th>
                                                     <th>Country</th>
                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php if($users){ 
                                                    $i =1;
                                            foreach($users as $user){ 
                                                      { ?>

                                                <tr>
                                                    <td><img class="avatar-img"src="images/avatar/{{ $user->image }}" /></td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->last_name}}</td>
                                                    <td>{{$user->gender}}</td>
                                                    <td>{{$user->email}}</td>
                                                    <td>{{$user->mobile}}</td>
                                                    <td>{{$user->dob}}</td>
                                                    <td>{{$user->country}}</td>
                                                    
                                         <td class="action_btn">
                                      <!--   <a class="ac_btn" href=""><i class="fa fa-eye" aria-hidden="true"></i></a> -->
                                        <a class="ac_btn" href="{{url('edit_profile/'.$user->id)}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 

                                         <a class="ac_btn" data-toggle="modal" data-target="{{'#delete_users'.$user->id}}" onclick="{{$user->id}}" title="Delete"><i class="fa fa-close" aria-hidden="true"></i></a>                                 
                                        


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
                            <div class="modal fade none-border" id="{{'delete_users'.$user->id}}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title"><strong>Delete User</strong></h4>
                                                    </div>
                                                
                                                <div class="modal-body">
                                        <span class="adminpro-icon adminpro-warning modal-check-pro information-icon-pro"></span>
                                        <h2>Delete User??</h2>
                                        <p>Are you Sure you want to delete it?</p>
                                             </div>         
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                        <a  href="{{url('delete_user/'.$user->id)}}"  class="btn btn-danger waves-effect waves-light">Submit</a>
                                                    </div>
                                                     
                                                </div>
                                            </div>
                                        </div>
                                          @endforeach
                                         @endif 
    <!--END MODAL -->

@include('layouts.footer')

                     