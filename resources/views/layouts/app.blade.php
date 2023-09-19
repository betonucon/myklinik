
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>O-KLINIK</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{url_plug()}}/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/ion-rangeslider/css/ion.rangeSlider.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/@danielfarrell/bootstrap-combobox/css/bootstrap-combobox.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/tag-it/css/jquery.tagit.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/select2/dist/css/select2.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-fontawesome.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker-glyphicons.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="{{url_plug()}}/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    
	<link href="{{url_plug()}}/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/plugins/datatables.net-fixedheader-bs4/css/fixedheader.bootstrap4.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
    <link href="{{url_plug()}}/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            font-size: .77rem;
            font-weight: 400;
            line-height: 1.5;
            color: #333;
            text-align: left;
            background-color: #d9e0e7;
        }
        .swal-text {
            width: 100%;
            color: #000;
        }
        .table thead th {
            vertical-align: bottom;
            background: #e2e2ff;
            border-bottom: 2px solid #e4e7ea;
        }
        .sidebar .nav>li {
            position: relative;
            border-bottom: solid 1px #e1e1ed;
        }
		.sidebar .nav>li>a {
			padding: 7px 20px;
			line-height: 20px;
			font-weight: bold;
			font-size: 11px;
			color: rgb(6 8 94);
			display: block;
			text-decoration: none;
		}
		.sidebar .nav>li.nav-header {
			margin: 0;
			padding: 15px 10px 3px;
			line-height: 20px;
			font-size: 13px;
			color: rgb(12 10 104);
			font-weight: 600;
		}
		.sidebar .sub-menu>li:before {
			content: '';
			position: absolute;
			left: -13px;
			top: 0;
			bottom: 0;
			width: 2px;
			background: #fff;
		}
		.sidebar .sub-menu>li:after {
			content: '';
			position: absolute;
			left: 0;
			width: 6px;
			height: 6px;
			border: 1px solid rgba(255,255,255,.6);
			top: 11px;
			margin-top: -2px;
			z-index: 10;
			background: #ffffff;
			-webkit-border-radius: 4px;
			border-radius: 4px;
		}
		.sidebar .nav>li.active>a {
			position: relative;
			z-index: 10;
			color: #0e062cc2;
			background: #cdd7df;
		}
		.sidebar .sub-menu>li {
			position: relative;
			margin-bottom: 2%;
		}
		.sidebar .sub-menu>li>a:after {
			content: '';
			position: absolute;
			left: 0px;
			top: 11px;
			width: 11px;
			height: 2px;
			background: #ffffff;
		}
		.header .navbar-brand img {
			max-width: 100%;
			max-height: 140px;
		}
		.typright{
			text-align:right;
		}
		.text-inverse {
			color: #2d353c!important;
			padding-left: 3vw;
		}
		.sidebar .nav>li.nav-profile .cover {
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background: #ffffff;
			/* background: url(images/cover-sidebar-user.jpg); */
			background-repeat: no-repeat;
			background-size: cover;
		}
		.header .navbar-brand {
    		padding: 0px;
			height: 50px;
			font-weight: 100;
			font-size: 18px;
			line-height: 30px;
			text-decoration: none;
			-webkit-box-flex: 1;
			-ms-flex: 1;
			flex: 1;
			-ms-flex-align: center;
			align-items: center;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
		}
		.sidebar .sub-menu>li>a {
			padding: 3px 20px 3px 10px;
			display: block;
			color: rgba(255,255,255,.6);
			text-decoration: none;
			position: relative;
		}
		.sidebar .nav>li>a:focus, .sidebar .nav>li>a:hover {
			background: #e2e2ef;
			color: #070c32;
		}
		.sidebar .nav .sub-menu>li>a {
			color: rgb(15 4 44);
			font-size: 11px;
			font-weight: bold;
		}
        .loadnya {
			height: 100%;
			width: 0;
			position: fixed;
			z-index: 1070;
			top: 0;
			left: 0;
			background-color: rgb(0,0,0);
			background-color: rgb(243 230 230 / 81%);
			overflow-x: hidden;
			transition: transform .9s;
		}
		.loadnya-content {
			position: relative;
			top: 25%;
			width: 100%;
			text-align: center;
			margin-top: 30px;
			color:#fff;
			font-size:20px;
		}
    </style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="loadnya" class="loadnya">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="loadnya-content">
			<button class="btn btn-light" type="button" disabled>
  				Loading...
			</button>
        </div>
	</div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><img src="{{url_plug()}}/img/logo.png" width="100%"></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header --><!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="navbar-form">
					<form action="" method="POST" name="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Enter keyword" />
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-right">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bug media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Server Error Reports <i class="fa fa-exclamation-circle text-danger"></i></h6>
								<div class="text-muted f-s-10">3 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="{{url_plug()}}/assets/img/user/user-1.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">John Smith</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted f-s-10">25 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="{{url_plug()}}/assets/img/user/user-2.jpg" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Olivia</h6>
								<p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
								<div class="text-muted f-s-10">35 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-plus media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New User Registered</h6>
								<div class="text-muted f-s-10">1 hour ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-envelope media-object bg-silver-darker"></i>
								<i class="fab fa-google text-warning media-object-icon f-s-14"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading"> New Email From John</h6>
								<div class="text-muted f-s-10">2 hour ago</div>
							</div>
						</a>
						<div class="dropdown-footer text-center">
							<a href="javascript:;">View more</a>
						</div>
					</div>
				</li>
				<li class="dropdown navbar-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{url_plug()}}/assets/img/user/user-13.jpg" alt="" /> 
						<span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:;" class="dropdown-item">Edit Profile</a>
						<a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
						<a href="javascript:;" class="dropdown-item">Calendar</a>
						<a href="javascript:;" class="dropdown-item">Setting</a>
						<div class="dropdown-divider"></div>
						<a href="javascript:;" class="dropdown-item">Log Out</a>
					</div>
				</li>
			</ul>
			<!-- end header-nav -->
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%" style="background: #fff;">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{url_plug()}}/assets/img/user/user-13.jpg" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>Sean Ngu
								<small>Front end developer</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
							<li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				@include('layouts.side')
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		@yield('content')
		<!-- end #content -->
		
		<!-- begin theme-panel -->
		
		<!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{url_plug()}}/assets/js/app.min.js"></script>
	<script src="{{url_plug()}}/assets/js/theme/default.min.js"></script>
	<!-- ================== END BASE JS ================== -->
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{url_plug()}}/assets/plugins/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/datatables.net-fixedheader/js/dataTables.fixedheader.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/datatables.net-fixedheader-bs4/js/fixedheader.bootstrap4.min.js"></script>
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{url_plug()}}/assets/plugins/moment/min/moment.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	<script src="{{url_plug()}}/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/pwstrength-bootstrap/dist/pwstrength-bootstrap.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/@danielfarrell/bootstrap-combobox/js/bootstrap-combobox.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/tag-it/js/tag-it.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script src="{{url_plug()}}/assets/plugins/select2/dist/js/select2.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-show-password/dist/bootstrap-show-password.js"></script>
	<script src="{{url_plug()}}/assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
	<script src="{{url_plug()}}/assets/plugins/jquery-simplecolorpicker/jquery.simplecolorpicker.js"></script>
	<script src="{{url_plug()}}/assets/plugins/clipboard/dist/clipboard.min.js"></script>
    <script src="{{url_plug()}}/assets/plugins/gritter/js/jquery.gritter.js"></script>
	<script src="{{url_plug()}}/assets/plugins/sweetalert/dist/sweetalert.min.js"></script>
	<script type='text/javascript' src="{{url_plug()}}/js/jquery.inputmask.bundle.js"></script>
	<script>
        $(".typeuang").inputmask({ alias : "currency", prefix: '', 'autoGroup': true, 'digits': 0, 'digitsOptional': false });
    </script>
    @stack('datatable')
    @stack('ajax')
</body>
</html>