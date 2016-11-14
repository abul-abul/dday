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

<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="ace-icon fa fa-leaf green"></i>
									<span class="red">DDay</span>
									<span class="white" id="id-text2">Application</span>
								</h1>
								<h4 class="blue" id="id-company-text">&copy; Company Name</h4>
							</div>

							<div class="space-6"></div>
							@include('message')
							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

		            						@include('user.form.login')

											<div class="social-or-login center">
												<span class="bigger-110">Or Login Using</span>
											</div>

											<div class="space-6"></div>

											<div class="social-login center">
												<a target="_blank" href="{{action('UsersController@getFacebookLogin')}}" class="btn btn-primary">
													<i class="ace-icon fa fa-facebook"></i>
												</a>

												<a target="_blank" href="{{action('UsersController@getTwitterLogin')}}" class="btn btn-info">
													<i class="ace-icon fa fa-twitter"></i>
												</a>

												<a target="_blank" href="{{action('UsersController@getGoogleLogin')}}" class="btn btn-danger">
													<i class="ace-icon fa fa-google-plus"></i>
												</a>
											</div>
										</div><!-- /.widget-main -->

										<div class="toolbar clearfix">
											<div>
												<a href="#" data-target="#forgot-box" class="forgot-password-link">
													<i class="ace-icon fa fa-arrow-left"></i>
													I forgot my password
												</a>
											</div>

											<div>
												<a href="#" data-target="#signup-box" class="user-signup-link">
													I want to register
													<i class="ace-icon fa fa-arrow-right"></i>
												</a>
											</div>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

								<div id="forgot-box" class="forgot-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header red lighter bigger">
												<i class="ace-icon fa fa-key"></i>
												Retrieve Password
											</h4>

											<div class="space-6"></div>
											<p>
												Enter your email and to receive instructions
											</p>

											<form>
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" class="form-control" placeholder="Email" />
															<i class="ace-icon fa fa-envelope"></i>
														</span>
													</label>

													<div class="clearfix">
														<button type="button" class="width-35 pull-right btn btn-sm btn-danger">
															<i class="ace-icon fa fa-lightbulb-o"></i>
															<span class="bigger-110">Send Me!</span>
														</button>
													</div>
												</fieldset>
											</form>
										</div><!-- /.widget-main -->

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												Back to login
												<i class="ace-icon fa fa-arrow-right"></i>
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.forgot-box -->

								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header green lighter bigger">
												<i class="ace-icon fa fa-users blue"></i>
												New User Registration
											</h4>

											<div class="space-6"></div>
											
											@include('user.form.registration')
										</div>

										<div class="toolbar center">
											<a href="#" data-target="#login-box" class="back-to-login-link">
												<i class="ace-icon fa fa-arrow-left"></i>
												Back to login
											</a>
										</div>
									</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							<div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-dark" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->








	{!! HTML::script( asset('assets/user/js/user_main.js') ) !!} 




		

	{!! HTML::script( asset('assets/admin/plugins/js/jquery.js') ) !!}  
	{!! HTML::script( asset('assets/admin/plugins/js/ace-extra.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/jquery.mobile.custom.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/bootstrap.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/jquery-ui.custom.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/jquery.ui.touch-punch.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/jquery.easypiechart.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/jquery.sparkline.js') ) !!} 

	{!! HTML::script( asset('assets/admin/plugins/js/flot/jquery.flot.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/flot/jquery.flot.pie.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/flot/jquery.flot.resize.js') ) !!} 

	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.scroller.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.colorpicker.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.fileinput.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.typeahead.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.wysiwyg.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.spinner.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.treeview.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.wizard.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.aside.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.ajax-content.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.touch-drag.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.sidebar.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.sidebar-scroll-1.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.submenu-hover.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.widget-box.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.settings.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.settings-rtl.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.settings-skin.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.widget-on-reload.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.searchbox-autocomplete.js') ) !!} 


	<!-- inline scripts related to this page -->
	
	{!! HTML::style( asset('assets/admin/plugins/css/ace.onpage-help.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/sunburst.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/sunburst.css')) !!}

	<script type="text/javascript"> ace.vars['base'] = '..'; </script>
	
	<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
	{!! HTML::script( asset('js/app.js') ) !!} 

<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>



</body>
</html>

		