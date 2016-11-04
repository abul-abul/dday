@extends('app-user')
@section('user-content')


<a href="{{action('UsersController@getLoginReg')}}">Login</a>


			<textarea content="{{ csrf_token() }}" class="text" name="message"></textarea>
			<button class="s" type="button">submit</button>



<span class="number"></span>



@endsection

@section('script')
	{!! HTML::script(asset('assets/user/js/user_main.js') ) !!} 

<!--  -->
<script type="text/javascript">
		$('.s').click(function(){
			var text = $('.text').val()
			var token = $('.text').attr('content')
			 $.ajax({
                url: '/user/add-message',
                type: 'post',
                data: {_token:token,message:text},
                success : function(data){
                   // location.reload();
                }   
            }) 
		})
	</script>

	<script type="text/javascript">
		// var number = $('.number');
		// number.listen('ChatMessageWasReceived', (e) => {
	 //        console.log(e.user, e.chatMessage);
	 //    });
	</script>
@endsection
