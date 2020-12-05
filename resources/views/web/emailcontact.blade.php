<!DOCTYPE html>
<html>
<head>
	<title>mail template</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style>
		body{
			margin: 0;
		}
		.logo1{
			
    		background: black;
		}
		.logo1 img{
			display: block;
    		max-width: 100%;
    		height: auto;
    		margin: 0 auto;
    		width: 170px;
		}
		.content-wrap{
			text-align: center;
			padding-top: 20px;
		}
		.left{
			text-align: left;
			padding-left: 10px;
		}
		.content-wrap h5{
			color: #6732d0;
		}
		.content-wrap p{
			color: #928585;
		}
		.verify{
			padding: 15px 25px;
		    border: none;
		    background: #6732d0;
		    color: white;
		    border-radius: 20px;
		    font-size: 14px;
		}
	</style>
</head>
<body>

	


	<section class="content">
		<div class="container">
			<div class="col-md-2"></div>
			<div class="col-md-8" style="margin: 0 auto">
				<div class="logo1"><img src="{{ URL::to('public/images/logo-home.png')}}"></div>
				<div class="content-wrap">
					<h5>Dear, Car Dealer</h5>
					<h5 style="color: #000;"> Welcome to Car dealer</h5>	
					<h5>{{$name}}</h5>
					<h5> {{$email}}</h5>
					<h5>{{$phone}}</h5>
					<h5>{{$subjects}}</h5>
                     </h5>					
					
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</section>

</body>
</html>