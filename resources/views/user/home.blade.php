@extends('app-user')
@section('user-content')

@foreach($languages as $language)
<a href="{{URL::to('/' .$language->lang_name. '/' . $currentPathWithoutLocale) }}" class="active load">{{$language->lang_name}}</a>

@endforeach 
<!-- <br>
<br>
<br>
<a href="{{action('UsersController@getLoginReg')}}">Login</a>

<br>
<br>
<br>

			<textarea content="{{ csrf_token() }}" class="text" name="message"></textarea>
			<br>
			<br>

			<button class="s" type="button">submit</button> -->


<!-- 
<span class="number"></span> -->




@endsection

@section('script')
	{!! HTML::script(asset('assets/user/js/user_main.js') ) !!} 

<!--  -->
	<script type="text/javascript">
		// $('.s').click(function(){
		// 	var text = $('.text').val()
		// 	var token = $('.text').attr('content')
		// 	 $.ajax({
  //               url: 'en/user/add-message',
  //               type: 'post',
  //               data: {_token:token,message:text},
  //               success : function(data){
  //                  // location.reload();
  //               }   
  //           }) 
		// })
	</script>

	<script type="text/javascript">
		// var number = $('.number');
		// number.listen('ChatMessageWasReceived', (e) => {
	 //        console.log(e.user, e.chatMessage);
	 //    });
	</script>
@endsection
