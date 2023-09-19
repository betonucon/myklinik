
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Page with Top Menu</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{url_plug()}}/assets/css/default/app.min.css" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show">
		<span class="spinner"></span>
	</div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Color</b> Admin</a>
				<button type="button" class="navbar-toggle" data-click="top-menu-toggled">
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
		
		<!-- begin #top-menu -->
		<div id="top-menu" class="top-menu">
			<!-- begin nav -->
			<ul class="nav">
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-th-large"></i>
						<span>Dashboard</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="index.html">Dashboard v1</a></li>
						<li><a href="index_v2.html">Dashboard v2</a></li>
						<li><a href="index_v3.html">Dashboard v3</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-hdd"></i>
						<span>Email</span>
						<span class="badge ml-auto">10</span>
					</a>
					<ul class="sub-menu">
						<li><a href="email_inbox.html">Inbox</a></li>
						<li><a href="email_compose.html">Compose</a></li>
						<li><a href="email_detail.html">Detail</a></li>
					</ul>
				</li>
				<li>
					<a href="widget.html">
						<i class="fab fa-simplybuilt"></i>
						<span>Widgets <span class="label label-theme">NEW</span></span> 
					</a>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-gem"></i>
						<span>UI Elements <span class="label label-theme">NEW</span></span> 
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="ui_general.html">General <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="ui_typography.html">Typography</a></li>
						<li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
						<li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>
						<li><a href="ui_modal_notification.html">Modal & Notification <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="ui_widget_boxes.html">Widget Boxes</a></li>
						<li><a href="ui_media_object.html">Media Object</a></li>
						<li><a href="ui_buttons.html">Buttons <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="ui_icons.html">Icons</a></li>
						<li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>
						<li><a href="ui_ionicons.html">Ionicons</a></li>
						<li><a href="ui_tree.html">Tree View</a></li>
						<li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
						<li><a href="ui_social_buttons.html">Social Buttons</a></li>
						<li><a href="ui_tour.html">Intro JS</a></li>
					</ul>
				</li>
				<li>
					<a href="bootstrap_4.html">
						<div class="icon-img">
							<img src="{{url_plug()}}/assets/img/logo/logo-bs4.png" alt="" />
						</div>
						<span>Bootstrap 4 <span class="label label-theme">NEW</span></span> 
					</a>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-list-ol"></i>
						<span>Form Stuff <span class="label label-theme">NEW</span></span> 
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="form_elements.html">Form Elements <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="form_plugins.html">Form Plugins <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>
						<li><a href="form_validation.html">Form Validation</a></li>
						<li><a href="form_wizards.html">Wizards</a></li>
						<li><a href="form_wizards_validation.html">Wizards + Validation</a></li>
						<li><a href="form_wysiwyg.html">WYSIWYG</a></li>
						<li><a href="form_editable.html">X-Editable</a></li>
						<li><a href="form_multiple_upload.html">Multiple File Upload</a></li>
						<li><a href="form_summernote.html">Summernote</a></li>
						<li><a href="form_dropzone.html">Dropzone</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-table"></i>
						<span>Tables</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="table_basic.html">Basic Tables</a></li>
						<li class="has-sub">
							<a href="javascript:;">Managed Tables <b class="caret"></b></a>
							<ul class="sub-menu">
								<li><a href="table_manage.html">Default</a></li>
								<li><a href="table_manage_autofill.html">Autofill</a></li>
								<li><a href="table_manage_buttons.html">Buttons</a></li>
								<li><a href="table_manage_colreorder.html">ColReorder</a></li>
								<li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
								<li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
								<li><a href="table_manage_keytable.html">KeyTable</a></li>
								<li><a href="table_manage_responsive.html">Responsive</a></li>
								<li><a href="table_manage_rowreorder.html">RowReorder</a></li>
								<li><a href="table_manage_scroller.html">Scroller</a></li>
								<li><a href="table_manage_select.html">Select</a></li>
								<li><a href="table_manage_combine.html">Extension Combination</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-star"></i>
						<span>Front End</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="../../../frontend/template/template_one_page_parallax/index.html" target="_blank">One Page Parallax</a></li>
						<li><a href="../../../frontend/template/template_blog/index.html" target="_blank">Blog</a></li>
						<li><a href="../../../frontend/template/template_forum/index.html" target="_blank">Forum</a></li>
						<li><a href="../../../frontend/template/template_e_commerce/index.html" target="_blank">E-Commerce</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-envelope"></i>
						<span>Email Template</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="email_system.html">System Template</a></li>
						<li><a href="email_newsletter.html">Newsletter Template</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-chart-pie"></i>
						<span>Chart <span class="label label-theme">NEW</span></span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="chart-flot.html">Flot Chart</a></li>
						<li><a href="chart-morris.html">Morris Chart</a></li>
						<li><a href="chart-js.html">Chart JS</a></li>
						<li><a href="chart-d3.html">d3 Chart</a></li>
						<li><a href="chart-apex.html">Apex Chart <i class="fa fa-paper-plane text-theme"></i></a></li>
					</ul>
				</li>
				<li>
					<a href="calendar.html">
						<i class="fa fa-calendar"></i> 
						<span>Calendar</span>
					</a>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-map"></i>
						<span>Map</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="map_vector.html">Vector Map</a></li>
						<li><a href="map_google.html">Google Map</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-image"></i>
						<span>Gallery</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="gallery.html">Gallery v1</a></li>
						<li><a href="gallery_v2.html">Gallery v2</a></li>
					</ul>
				</li>
				<li class="has-sub active">
					<a href="javascript:;">
						<i class="fa fa-cogs"></i>
						<span>Page Options</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="page_blank.html">Blank Page</a></li>
						<li><a href="page_with_footer.html">Page with Footer</a></li>
						<li><a href="page_without_sidebar.html">Page without Sidebar</a></li>
						<li><a href="page_with_right_sidebar.html">Page with Right Sidebar</a></li>
						<li><a href="page_with_minified_sidebar.html">Page with Minified Sidebar</a></li>
						<li><a href="page_with_two_sidebar.html">Page with Two Sidebar</a></li>
						<li><a href="page_with_line_icons.html">Page with Line Icons</a></li>
						<li><a href="page_with_ionicons.html">Page with Ionicons</a></li>
						<li><a href="page_full_height.html">Full Height Content</a></li>
						<li><a href="page_with_wide_sidebar.html">Page with Wide Sidebar</a></li>
						<li><a href="page_with_light_sidebar.html">Page with Light Sidebar</a></li>
						<li><a href="page_with_mega_menu.html">Page with Mega Menu</a></li>
						<li class="active"><a href="page_with_top_menu.html">Page with Top Menu</a></li>
						<li><a href="page_with_boxed_layout.html">Page with Boxed Layout</a></li>
						<li><a href="page_with_mixed_menu.html">Page with Mixed Menu</a></li>
						<li><a href="page_boxed_layout_with_mixed_menu.html">Boxed Layout with Mixed Menu</a></li>
						<li><a href="page_with_transparent_sidebar.html">Page with Transparent Sidebar</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-gift"></i>
						<span>Extra</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="extra_timeline.html">Timeline</a></li>
						<li><a href="extra_coming_soon.html">Coming Soon Page</a></li>
						<li><a href="extra_search_results.html">Search Results</a></li>
						<li><a href="extra_invoice.html">Invoice</a></li>
						<li><a href="extra_404_error.html">404 Error Page</a></li>
						<li><a href="extra_profile.html">Profile Page</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-key"></i>
						<span>Login & Register</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="login.html">Login</a></li>
						<li><a href="login_v2.html">Login v2</a></li>
						<li><a href="login_v3.html">Login v3</a></li>
						<li><a href="register_v3.html">Register v3</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-cubes"></i>
						<span>Version <span class="label label-theme">NEW</span></span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="../template_html/index_v3.html">HTML</a></li>
						<li><a href="../template_ajax/">AJAX</a></li>
						<li><a href="../template_angularjs/">ANGULAR JS</a></li>
						<li><a href="../template_angularjs8/">ANGULAR JS 8 <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="../template_laravel/">LARAVEL <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="../template_vuejs/">VUE JS <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="../template_reactjs/">REACT JS <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="../template_material/index_v2.html">MATERIAL DESIGN</a></li>
						<li><a href="../template_apple/index_v2.html">APPLE DESIGN</a></li>
						<li><a href="../template_transparent/index_v2.html">TRANSPARENT DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="../template_facebook/index_v2.html">FACEBOOK DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>
						<li><a href="../template_google/index_v2.html">GOOGLE DESIGN <i class="fa fa-paper-plane text-theme"></i></a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-medkit"></i>
						<span>Helper</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li><a href="helper_css.html">Predefined CSS Classes</a></li>
					</ul>
				</li>
				<li class="has-sub">
					<a href="javascript:;">
						<i class="fa fa-align-left"></i>
						<span>Menu Level</span>
						<b class="caret"></b>
					</a>
					<ul class="sub-menu">
						<li class="has-sub">
							<a href="javascript:;">
								Menu 1.1
								<b class="caret"></b>
							</a>
							<ul class="sub-menu">
								<li class="has-sub">
									<a href="javascript:;">
										Menu 2.1
										<b class="caret"></b>
									</a>
									<ul class="sub-menu">
										<li><a href="javascript:;">Menu 3.1</a></li>
										<li><a href="javascript:;">Menu 3.2</a></li>
									</ul>
								</li>
								<li><a href="javascript:;">Menu 2.2</a></li>
								<li><a href="javascript:;">Menu 2.3</a></li>
							</ul>
						</li>
						<li><a href="javascript:;">Menu 1.2</a></li>
						<li><a href="javascript:;">Menu 1.3</a></li>
					</ul>
				</li>
				<li class="menu-control menu-control-left">
					<a href="javascript:;" data-click="prev-menu"><i class="fa fa-angle-left"></i></a>
				</li>
				<li class="menu-control menu-control-right">
					<a href="javascript:;" data-click="next-menu"><i class="fa fa-angle-right"></i></a>
				</li>
			</ul>
			<!-- end nav -->
		</div>
		<!-- end #top-menu -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Page Options</a></li>
				<li class="breadcrumb-item active">Page with Top Menu</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Page with Top Menu <small>header small text goes here...</small></h1>
			<!-- end page-header -->
			
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Panel Title here</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="panel-body">
					Panel Content Here
				</div>
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->
		
		<!-- begin theme-panel -->
		<div class="theme-panel theme-panel-lg">
			<a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
			<div class="theme-panel-content">
				<h5>App Settings</h5><ul class="theme-list clearfix">
					<li><a href="javascript:;" class="bg-red" data-theme="red" data-theme-file="{{url_plug()}}/assets/css/default/theme/red.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-pink" data-theme="pink" data-theme-file="{{url_plug()}}/assets/css/default/theme/pink.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Pink">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-orange" data-theme="orange" data-theme-file="{{url_plug()}}/assets/css/default/theme/orange.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-yellow" data-theme="yellow" data-theme-file="{{url_plug()}}/assets/css/default/theme/yellow.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Yellow">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-lime" data-theme="lime" data-theme-file="{{url_plug()}}/assets/css/default/theme/lime.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Lime">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-green" data-theme="green" data-theme-file="{{url_plug()}}/assets/css/default/theme/green.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Green">&nbsp;</a></li>
					<li class="active"><a href="javascript:;" class="bg-teal" data-theme="default" data-theme-file="" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-aqua" data-theme="aqua" data-theme-file="{{url_plug()}}/assets/css/default/theme/aqua.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Aqua">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-blue" data-theme="blue" data-theme-file="{{url_plug()}}/assets/css/default/theme/blue.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-purple" data-theme="purple" data-theme-file="{{url_plug()}}/assets/css/default/theme/purple.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-indigo" data-theme="indigo" data-theme-file="{{url_plug()}}/assets/css/default/theme/indigo.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Indigo">&nbsp;</a></li>
					<li><a href="javascript:;" class="bg-black" data-theme="black" data-theme-file="{{url_plug()}}/assets/css/default/theme/black.min.css" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
				</ul>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-fixed" id="headerFixed" value="1" checked />
							<label class="custom-control-label" for="headerFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Header Inverse</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="header-inverse" id="headerInverse" value="1" />
							<label class="custom-control-label" for="headerInverse">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Fixed</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-fixed" id="sidebarFixed" value="1" checked />
							<label class="custom-control-label" for="sidebarFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-6 control-label text-inverse f-w-600">Sidebar Grid</div>
					<div class="col-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-grid" id="sidebarGrid" value="1" />
							<label class="custom-control-label" for="sidebarGrid">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row m-t-10">
					<div class="col-md-6 control-label text-inverse f-w-600">Sidebar Gradient</div>
					<div class="col-md-6 d-flex">
						<div class="custom-control custom-switch ml-auto">
							<input type="checkbox" class="custom-control-input" name="sidebar-gradient" id="sidebarGradient" value="1" />
							<label class="custom-control-label" for="sidebarGradient">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="divider"></div>
				<h5>Admin Design (5)</h5>
				<div class="theme-version">
					<a href="../template_html/index_v2.html" class="active">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/default.jpg);"></span>
					</a>
					<a href="../template_transparent/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/transparent.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_apple/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/apple.jpg);"></span>
					</a>
					<a href="../template_material/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/material.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_facebook/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/facebook.jpg);"></span>
					</a>
					<a href="../template_google/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/google.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<h5>Language Version (7)</h5>
				<div class="theme-version">
					<a href="../template_html/index_v2.html" class="active">
						<span style="background-image: url({{url_plug()}}/assets/img/version/html.jpg);"></span>
					</a>
					<a href="../template_ajax/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/version/ajax.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_angularjs/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/version/angular1x.jpg);"></span>
					</a>
					<a href="../template_angularjs8/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/version/angular8x.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_laravel/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/version/laravel.jpg);"></span>
					</a>
					<a href="../template_vuejs/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/version/vuejs.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../template_reactjs/index_v2.html">
						<span style="background-image: url({{url_plug()}}/assets/img/version/reactjs.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<h5>Frontend Design (4)</h5>
				<div class="theme-version">
					<a href="../../../frontend/template/template_one_page_parallax/index.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/one-page-parallax.jpg);"></span>
					</a>
					<a href="../../../frontend/template/template_e_commerce/index.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/e-commerce.jpg);"></span>
					</a>
				</div>
				<div class="theme-version">
					<a href="../../../frontend/template/template_blog/index.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/blog.jpg);"></span>
					</a>
					<a href="../../../frontend/template/template_forum/index.html">
						<span style="background-image: url({{url_plug()}}/assets/img/theme/forum.jpg);"></span>
					</a>
				</div>
				<div class="divider"></div>
				<div class="row m-t-10">
					<div class="col-md-12">
						<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-inverse btn-block btn-rounded" target="_blank"><b>Documentation</b></a>
						<a href="javascript:;" class="btn btn-default btn-block btn-rounded" data-click="reset-local-storage"><b>Reset Local Storage</b></a>
					</div>
				</div>
			</div>
		</div>
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
</body>
</html>