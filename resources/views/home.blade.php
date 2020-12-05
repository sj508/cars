@include('layouts.header')
@include('layouts.sidebar')


   <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, {{ Auth::user()->name }} <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                   </div>
             
                       
                    </div>
                   
                </div>
            </div>
      
@include('layouts.footer')