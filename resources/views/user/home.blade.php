@extends('app-user')
@section('user-content')
<!-- 	
	<li><a href="{{URL::to('/en/' . $currentPathWithoutLocale)}}">en</a></li>
    <li><a href="{{URL::to('/ru/' . $currentPathWithoutLocale)}}">ru</a></li>
    <li><a href="{{URL::to('/am/' . $currentPathWithoutLocale)}}">am</a></li> -->

@foreach($languages as $language)

    <li><a href="{{URL::to('/' .$language->lang_name. '/' . $currentPathWithoutLocale) }}" class="active load">{{$language->lang_name}}</a></li>
    
@endforeach
<a href="{{action('UsersController@getLoginReg')}}">Login</a>

@endsection

