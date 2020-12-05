@include('layouts.header')
@include('layouts.sidebar')
   <style>
       .img-1{
        width: 100px;
        margin: 0 auto;
       }
       .text-centerr{
        margin: 20px 0px;
       }
   </style>

    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                       <!--  <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div> -->
                    </div>

                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="{{url('home')}}">Dashboard</a></li>
                                    <li class="active">edit car model</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                 @if (Session::has('message'))
                       <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif
                <!-- /# row -->
                <div class="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card alert">
                                <div class="card-header">
                                    <h4>Edit Car Model</h4>
                                   
                                </div>


                                <div class="card-body">
                                    <div class="menu-upload-form">
                      <form class="form-horizontal" method="POST" action="{{url('post_edit_carmodel')}}" enctype="multipart/form-data">
                                 {{ csrf_field() }}

                                 <input type="hidden" name="id" value="{{$product->id}}">
                                          
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-6">
                                 <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                                </div>
                                            </div>

                   <div class="form-group">
                    <label class="col-sm-2 control-label">Car Make Name</label>
                 <div class="col-sm-6">                                                                 
                         <select class="form-control" id="carmake_id" name="carmake_id">
                                <option value="{{$product->carmake_id}}">Please select</option>
                                        <?php foreach ($carmake as $key=>$username): ?>
                                        <option value="<?php echo $username->id; ?>" <?php
                                        if (isset($carmake_id) && Input::old('carmake_id') == $username->name)
                                        {
                                            echo 'selected="selected"';
                                        }
                                        ?>>
                                        <?php  echo $username->name; ?></option>
                                        <?php endforeach; ?>
                                </select>        
                                </div>
                              </div>      


                                          

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                                </div>
                                            </div>
                            </form>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                </div>
                <!-- /# main content -->
            </div>
            <!-- /# container-fluid -->
        </div>
        <!-- /# main -->
    </div>
    <!-- /# content wrap -->

@include('layouts.footer')
       