
$(document).ready(function(){
		// when the user clicks on like
		$('.like').click(function(){
			var postid = $(this).attr('id');
			  $.ajax({
				url: 'dashboard.php',
				type: 'post',
				async: false,
				data: {
					'liked': 1,
					'postid': postid
				},
				success: function(){
					
				}
			
			}); 
		}); 
		
		$('.unlike').click(function(){
			var postid = $(this).attr('id');
			  $.ajax({
				url: 'dashboard.php',
				type: 'post',
				async: false, 
				data: {
					'unliked': 1,
					'postid': postid
				},
				success: function(){
					
				}
			
			}); 	
		});

		
	});
	
	

