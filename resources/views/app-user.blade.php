<html>
<head>
	<title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{!! HTML::style( asset('assets/admin/plugins/css/bootstrap.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/font-awesome.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-fonts.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-rtl.css')) !!}
</head>
<body style="background-color:#e7e7e7" class="login-layout">





	<div class="container">
		<div class="row">
			@yield('user-content')
		</div>
	</div>

	{!! HTML::script( asset('assets/admin/plugins/js/jquery.js') ) !!}  
	
	{!! HTML::script( asset('js/app.js') ) !!} 

	






	@yield('script')
</body>
</html>