$(document).ready(function(){

	$(function() {

		var timer;	    
		$(document).on('keyup', '.editable', function(event){
			clearTimeout(timer)
			event.preventDefault();
		    var $this = $(this);

		    timer = setTimeout(function() {

		    	var id_exists;

		    	if( window.location.pathname.split('/').pop() == 'view' ){
		    		id_exists = 0;
		    	}else{
		    		id_exists = 1;
		    	}

				$.ajax({
					type: 'POST',
					url: '/content/create',
					data:{
						object_id: 'unknown',
						object_type: 'unknown',						
						content_type: 'unknown',
						content: $this.text(),
						exists: id_exists,
						content_id: window.location.pathname.split('/').pop()
					},
					dataType: 'text',
					cache: false,
					success: function (data){
						var data = jQuery.parseJSON(data);
						$('.response').slideToggle(500);
						setTimeout(function(){
							$('.response').slideToggle(1000);
						}, 2000);
						if( id_exists === 0 ){
							history.pushState('data', '', "/content/view/" + data.id);
						}
					},
					error: function (data){
						$('.response').html('Sorry but an error occurred');
						$('.response').slideToggle(500);
						setTimeout(function(){
							$('.response').slideToggle(1000);
						}, 2000);						
					}
				});	

			}, 1000);
			 
		    return false;
		});	

	});	


});