@extends('app-admin')
@section('admin-content')
<h1>Add Page</h1>
@include('message')
{!! Form::open(['action' => ['AdminController@postAddPage'],'class' => 'login-form','files' =>true  ]) !!}
	{!! Form::text('page_name', null, ['class' => 'form-control','placeholder' => 'Page Name']) !!}

	<button style="margin-top:15px" class="btn btn-info" type="submit">Save</button>
{!! Form::close() !!}
@endsection