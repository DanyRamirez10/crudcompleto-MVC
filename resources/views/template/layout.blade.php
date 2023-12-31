<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AdminLTE 3 | Dashboard</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
	<!-- iCheck -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
	<!-- JQVMap -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/jqvmap/jqvmap.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/dist/css/adminlte.min.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
	<!-- summernote -->
	<link rel="stylesheet" href="{{asset('plugins/adminlte/plugins/summernote/summernote-bs4.min.css')}}">

	<link rel="stylesheet" href="{{asset('plugins/pnotify/pnotify.custom.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

	<!-- Preloader -->
	<div class="preloader flex-column justify-content-center align-items-center">
		<img class="animation__shake" src="{{asset('plugins/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
	</div>

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
			</li>
		</ul>

		<!-- Right navbar links -->
		<ul class="navbar-nav ml-auto">
			<!-- Notifications Dropdown Menu -->
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					<i class="far fa-bell"></i>
					<span class="badge badge-warning navbar-badge">15</span>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<span class="dropdown-item dropdown-header">15 Notifications</span>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-envelope mr-2"></i> 4 new messages
						<span class="float-right text-muted text-sm">3 mins</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-users mr-2"></i> 8 friend requests
						<span class="float-right text-muted text-sm">12 hours</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item">
						<i class="fas fa-file mr-2"></i> 3 new reports
						<span class="float-right text-muted text-sm">2 days</span>
					</a>
					<div class="dropdown-divider"></div>
					<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-widget="fullscreen" href="#" role="button">
					<i class="fas fa-expand-arrows-alt"></i>
				</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="index3.html" class="brand-link">
			<img src="{{asset('plugins/adminlte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">AdminLTE 3</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
			<!-- Sidebar user panel (optional) -->
			<div class="user-panel mt-3 pb-3 mb-3 d-flex">
				<div class="image">
					<img src="{{asset('plugins/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
				</div>
				<div class="info">
					<a href="#" class="d-block">Alexander Pierce</a>
				</div>
			</div>

			<!-- Sidebar Menu -->
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<!-- Add icons to the links using the .nav-icon class
							 with font-awesome or any other icon font library -->
					<li class="nav-item menu-open">
						<a href="#" class="nav-link active">
							<i class="nav-icon fas fa-tachometer-alt"></i>
							<p>
								Dashboard
								<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="./index.html" class="nav-link active">
									<i class="far fa-circle nav-icon"></i>
									<p>Página principal</p>
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</nav>
			<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-md-12">
						<h1 class="m-0">@yield('titleGeneral')</h1>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row" style="background-color: #ffffff;">
					<div class="col-md-12 pt-3 pb-3">
						@yield('sectionGeneral')
					</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<footer class="main-footer">
		<strong>Copyright &copy; 2023-{{date('Y')}}</strong>
		All rights reserved.
		<div class="float-right d-none d-sm-inline-block">
			<b>Version</b> 1.0.0
		</div>
	</footer>

	<!-- Control Sidebar -->
	<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
	</aside>
	<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/adminlte/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/adminlte/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/adminlte/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/adminlte/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/adminlte/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/adminlte/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('plugins/adminlte/dist/js/adminlte.js')}}"></script>

<script src="{{asset('plugins/formvalidation/formValidation.min.js')}}"></script>
<script src="{{asset('plugins/formvalidation/bootstrap.validation.min.js')}}"></script>

<script src="{{asset('plugins/pnotify/pnotify.custom.min.js')}}"></script>
<script src="{{asset('plugins/sweetalert/sweetalert.min.js')}}"></script>

<script>
	var _urlBase = '{{url('/')}}';

	@if(Session::has('listMessage'))
		@foreach(Session::get('listMessage') as $value)
			new PNotify(
			{
				title : '{{Session::get('typeMessage') == 'error' ? 'No se pudo proceder!' : 'Correcto!'}}',
				text : '{{$value}}',
				type : '{{Session::get('typeMessage')}}'
			});
		@endforeach
	@endif
</script>

@yield('js')

<script>
	$('html').on('keydown', () => {
		if(event.keyCode == 13) {
			return false;
		}
	});
</script>
</body>
</html>