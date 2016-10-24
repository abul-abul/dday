$(document).ready(function(){
	window.old_url = [];
	window.finish_url = [];
	window.url = [];
	$('.youtube_autoplay').click(function(){

		var check = $(this).attr('checked');
		old_url.push($('.edit_youtube').attr('src'))
		var edit_youtube = $('.edit_youtube').attr('src')
	

		if (check){
			$(this).removeAttr('checked');
			$('.edit_youtube').attr('src',old_url[0])
			finish_url = finish_url.filter(function(elem){
	            return elem != '?autoplay=1';
	        });
			//$('.video_url').val(old_url[0]);
		}else{
			$(this).attr('checked','checked');
			var split = edit_youtube.split('?');
			var src = split[0] + '?autoplay=1';
			$('.edit_youtube').attr('src',src);
			//$('.video_url').val(src);
			finish_url.push('?autoplay=1');
		}
		console.log(src)
		//console.log(finish_url)
		
	})

	$('.show_info').click(function(){
		var check = $(this).attr('checked');
		old_url.push($('.edit_youtube').attr('src'))
		var edit_youtube = $('.edit_youtube').attr('src')
		

		if (check){
			$(this).removeAttr('checked');
			$('.edit_youtube').attr('src',old_url[0])
			finish_url = finish_url.filter(function(elem){
	            return elem != '?&showinfo=0&';
	        });
			//$('.video_url').val(old_url[0]);
		}else{
			$(this).attr('checked','checked');
			var split = edit_youtube.split('?');
			var src = split[0] + '?&showinfo=0&';
			$('.edit_youtube').attr('src',src);
			finish_url.push('?&showinfo=0&')

			//$('.video_url').val(src);
		}
		console.log(src)
		//console.log(finish_url)
	})

	$('.show_panel').click(function(){
		var check = $(this).attr('checked');
		old_url.push($('.edit_youtube').attr('src'))
		var edit_youtube = $('.edit_youtube').attr('src')
		
		if (check){
			$(this).removeAttr('checked');
			$('.edit_youtube').attr('src',old_url[0])
			finish_url = finish_url.filter(function(elem){
	            return elem != '?&controls=0&';
	        });
			//$('.video_url').val(old_url[0]);
		}else{
			$(this).attr('checked','checked');
			var split = edit_youtube.split('?');
			var src = split[0] + '?&controls=0&';
			$('.edit_youtube').attr('src',src);
			finish_url.push('?&controls=0&')

			//$('.video_url').val(src);
		}
		console.log(src)

		//console.log(finish_url)
	})


})