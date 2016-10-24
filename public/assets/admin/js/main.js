$(document).ready(function(){
	//article
	$(window).load(function(){
		$('.wysiwyg-choose-file').next().remove();
	})
	$('.save_article').click(function(){
		var editor = $('#editor1').html();

		var text = $('.editor_article').val(editor);
	})

	$('.uploade_article_images').click(function(){
		$('.article_image').trigger('click');		
	})

	$('.article_image').change(function(event){
		files = event.target.files;
        event.stopPropagation(); 
        event.preventDefault();
        var data = new FormData();
        var token = $('.article_image').attr('alt');
        data.append('file', files[0]);
        data.append('_token',token);

        $.ajax({
            url: '/ab-admin/article-uploade',
            type: 'post',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            cache: false,
            dataType: 'json',
            processData: false, 
            contentType: false, 
            success: function(data)
            {   
            	// setTimeout(function(){
            		var src = '/assets/admin/images/article_uploade/' + data
	            	$('#gridSystemModal').modal('show');
	            	$('.article_images_js').attr('src',src)   
            	// },100)
            	    
            	//console.log(data)
            }
        });
	})

    $('.save_images_article').click(function(){
        $('#gridSystemModal').modal('hide');
    })

    $('.edit_file_article').click(function(){
        $('.edit_file_article_image').trigger('click')
    })
	//end article
})

