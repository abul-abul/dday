@extends('app-admin')
@section('admin-content')

<h1>Edit Video Youtube</h1>
<div class="col-md-12">
	<div class="col-md-6">
		<iframe class="edit_youtube" width="500" height="300" src="{{$videos->video}}" frameborder="0" allowfullscreen></iframe>								
	</div>
	<input type="hidden" value="" class="video_url">
	<div class="col-md-6">
		<span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<small class="muted smaller-90">Width:</small>
				<input value='{{$videos->width}}' style="width: 63px" id="id-button-borders" type="text" class="ace ace-switch ace-switch-5">
				<span class="lbl middle"></span>
			</label>
		</span>
		<span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<small class="muted smaller-90">Height:</small>
				<input value='{{$videos->height}}' style="width: 63px" id="id-button-borders" type="text" class="ace ace-switch ace-switch-5">
				<span class="lbl middle"></span>
			</label>
		</span>		
		<span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<small class="muted smaller-90">Autoplay:</small>
				<input data-src='?autoplay=1' id="id-button-borders"  type="checkbox" class="ace ace-switch ace-switch-5 youtube_check youtube_autoplay">
				<span class="lbl middle"></span>
			</label>
		</span>
		<span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<small class="muted smaller-90">Show info:</small>
				<input data-src='?&showinfo=0&' id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5 youtube_check show_info">
				<span class="lbl middle"></span>
			</label>
		</span>
		<span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<small class="muted smaller-90">Show panel:</small>
				<input data-src='?&controls=0&' id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5 youtube_check show_panel">
				<span class="lbl middle"></span>
			</label>
		</span>
		<!-- <span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<small class="muted smaller-90">Border:</small>
				<input id="id-button-borders" type="checkbox" class="ace ace-switch ace-switch-5">
				<span class="lbl middle"></span>
			</label>
		</span> -->
		<span class="col-md-12" style="margin-top:12px">
			<label class="pull-right inline">
				<button style="width: 112px" type="button" class="btn btn-white btn-success">save</button>
			</label>
		</span>
	</div>
<!-- <iframe width="300" height="400" src="//www.youtube.com/embed/qUJYqhKZrwA?&showinfo=0&controls=0&" frameborder="0" allowfullscreen> -->




@endsection

@section('script')
	{!! HTML::script( asset('assets/user/js/user_main.js') ) !!} 
@endsection