@extends('app-admin')
@section('admin-content')
<h1>Add Sub Menu</h1>
@include('message')
{!! Form::open(['action' => ['AdminController@postAddSubmenu'],'class' => 'login-form','files' =>true  ]) !!}
	<select name="page_name" style="margin-bottom:12px" class="form-control">
		@foreach($pages as $page)
			<option value="{{$page->id}}">{{$page->page_name}}</option>
		@endforeach	
	</select>
	{!! Form::text('sub_menu', null, ['class' => 'form-control','placeholder' => 'Page Name']) !!}

	<button style="margin-top:15px" class="btn btn-info" type="submit">Save</button>
{!! Form::close() !!}
@endsection