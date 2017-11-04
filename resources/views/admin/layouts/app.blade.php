<!DOCTYPE html>
<html>
<head>
 	@include('admin/layouts/head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

	  <header class="main-header">

	   	@include('admin/layouts/header')
	  </header>
	  <!-- Left side column. contains the logo and sidebar -->
	  
		@section('sidebar')
			@include('admin/layouts/sidebar')
		@show
	  <!-- Content Wrapper. Contains page content -->
	    @section('main-content')

	    @show
	  <!-- /.content-wrapper -->
	  @include('admin/layouts/footer')
	</div>>
</body>
</html>
