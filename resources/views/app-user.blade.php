<html>
<head>
	<title></title>
	{!! HTML::style( asset('assets/admin/plugins/css/bootstrap.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/font-awesome.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-fonts.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-rtl.css')) !!}
</head>
<body style="background-color:#e7e7e7" class="login-layout">





	<div>
		@yield('user-content')

	</div>

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

	<script type="text/javascript"> ace.vars['base'] = '..'; </script>



	@yield('script')
</body>
</html>