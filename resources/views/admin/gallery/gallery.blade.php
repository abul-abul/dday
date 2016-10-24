@extends('app-admin')
	
@section('admin-content')
	{!! HTML::style( asset('assets/admin/plugins/css/bootstrap.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/font-awesome.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/colorbox.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-fonts.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace.css')) !!}

	{!! HTML::style( asset('assets/admin/plugins/css/ace.onpage-help.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/sunburst.css')) !!}

<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
				

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						

						<!-- /section:settings.box -->
						<div class="page-header">
							<h1>
								Gallery
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									responsive photo gallery using colorbox
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<ul class="ace-thumbnails clearfix">
										<!-- #section:pages/gallery -->
										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" title="Photo Title" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
											</a>

											<div class="tags">
												<span class="label-holder">
													<span class="label label-info">breakfast</span>
												</span>

												<span class="label-holder">
													<span class="label label-danger">fruits</span>
												</span>

												<span class="label-holder">
													<span class="label label-success">toast</span>
												</span>

												<span class="label-holder">
													<span class="label label-warning arrowed-in">diet</span>
												</span>
											</div>

											<div class="tools">
												<a href="#">
													<i class="ace-icon fa fa-link"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-paperclip"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>
										</li>

										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
												<div class="text">
													<div class="inner">Sample Caption on Hover</div>
												</div>
											</a>
										</li>

										<!-- /section:pages/gallery -->

										<!-- #section:pages/gallery.caption -->
										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
												<div class="text">
													<div class="inner">Sample Caption on Hover</div>
												</div>
											</a>

											<div class="tools tools-bottom">
												<a href="#">
													<i class="ace-icon fa fa-link"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-paperclip"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>
										</li>

										<!-- /section:pages/gallery.caption -->
										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
												<div class="tags">
													
													<span class="label-holder">
														<span class="label label-info arrowed">fountain</span>
													</span>

													<span class="label-holder">
														<span class="label label-danger">recreation</span>
													</span>

												</div>
											</a>

											<div class="tools tools-top">
												<a href="#">
													<i class="ace-icon fa fa-link"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-paperclip"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>
										</li>

										<li>
											<div>
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
												<div class="text">
													<div class="inner">
														<span>Some Title!</span>

														<br />
														<a href="../assets/images/gallery/image-5.jpg" data-rel="colorbox">
															<i class="ace-icon fa fa-search-plus"></i>
														</a>

														<a href="#">
															<i class="ace-icon fa fa-user"></i>
														</a>

														<a href="#">
															<i class="ace-icon fa fa-share"></i>
														</a>
													</div>
												</div>
											</div>
										</li>

										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
											</a>

											<div class="tools tools-right">
												<a href="#">
													<i class="ace-icon fa fa-link"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-paperclip"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>
										</li>

										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
											</a>

											<div class="tools">
												<a href="#">
													<i class="ace-icon fa fa-link"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-paperclip"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>
										</li>

										<li>
											<a href="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" data-rel="colorbox">
												<img width="150" height="150" alt="150x150" src="/assets/admin/images/article_uploade/3otj8PP4YpRH.jpg" />
											</a>

											<div class="tools tools-top in">
												<a href="#">
													<i class="ace-icon fa fa-link"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-paperclip"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-pencil"></i>
												</a>

												<a href="#">
													<i class="ace-icon fa fa-times red"></i>
												</a>
											</div>

			
										</li>
									</ul>
								</div><!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

@endsection


@section('script')

<script type="text/javascript">
	jQuery(function($) {
		var $overflow = '';
		var colorbox_params = {
			rel: 'colorbox',
			reposition:true,
			scalePhotos:true,
			scrolling:false,
			previous:'<i class="ace-icon fa fa-arrow-left"></i>',
			next:'<i class="ace-icon fa fa-arrow-right"></i>',
			close:'&times;',
			current:'{current} of {total}',
			maxWidth:'100%',
			maxHeight:'100%',
			onOpen:function(){
				$overflow = document.body.style.overflow;
				document.body.style.overflow = 'hidden';
			},
			onClosed:function(){
				document.body.style.overflow = $overflow;
			},
			onComplete:function(){
				$.colorbox.resize();
			}
		};

		$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
		$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon
		
		
		$(document).one('ajaxloadstart.page', function(e) {
			$('#colorbox, #cboxOverlay').remove();
	    });
	})

</script>
@endsection

@section('script')

	
	{!! HTML::script( asset('assets/admin/plugins/js/ace/elements.onpage-help.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/ace/ace.onpage-help.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/rainbow.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/language/generic.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/language/html.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/language/css.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/language/javascript.js') ) !!} 
@endsection
