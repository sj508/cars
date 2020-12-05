<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <!-- Styles -->
    <link href="{{ URL::to('css/lib/chartist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/themify-icons.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('css/lib/owl.theme.default.min.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('css/lib/weather-icons.css')}}" rel="stylesheet" />
    <link href="{{ URL::to('css/lib/menubar/sidebar.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/lib/unix.css')}}" rel="stylesheet">
    <link href="{{ URL::to('css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::to('css/dataTables.bootstrap.min.css')}}">

</head>

<body>

    <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
               
  


    <div class="header">
        <div class="pull-left">
            <div class="logo"><a href="{{url('home')}}"><span>Cars</span></a></div>
            <div class="hamburger sidebar-toggle">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
        <div class="pull-right p-r-15">
            <ul>      
                <li class="header-icon dib">
                    <img class="avatar-img" src="{{ URL::to('images/avatar').Auth::user()->image}}" alt="" /> <span class="user-avatar"> {{ Auth::user()->name }} <i class="ti-angle-down f-s-10"></i></span>
                    <div class="drop-down dropdown-profile">
                       
                        <div class="dropdown-content-body">
                            <ul>
                                                       
                           
                            <li><a href="{{ url('/admin/logout') }}"><i class="ti-power-off"></i> <span>Logout</span></a>
                            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                             {{ csrf_field() }}
                                </form>
                            </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
   
     