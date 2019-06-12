//$("#link").on('click',function(e){
	//e.preventDefault();
//});

function like_add(note_id){
	//e.preventDefault();
	
	$.post('includes/ajax/like_add.php', {note_id:note_id}, function(data){
	if(data == 'like'){
		like_get(note_id);
		//inner text to unlike.
		$('#lb'+note_id).text('Unlike');
		$('#lb'+note_id).attr('id','ub'+note_id);
		$('#glyp'+note_id).attr('class','glyphicon glyphicon-thumbs-down');
		//inner text to unlike with classes
		$('.lb'+note_id+'_c').text('Unlike');
		$('.lb'+note_id+'_c').attr('class','ub'+note_id+'_c');
		$('.glyp'+note_id+'_c').attr('class','glyphicon glyphicon-thumbs-down');
		
	} 
	else if(data == 'unlike'){
		like_get(note_id);
		//innertext to like.
		$('#ub'+note_id).text('Like');
		$('#ub'+note_id).attr('id','lb'+note_id);
		$('#glyp'+note_id).attr('class','glyphicon glyphicon-thumbs-up');
		//inner text to unlike with classes
		$('.ub'+note_id+'_c').text('Like');
		$('.ub'+note_id+'_c').attr('class','lb'+note_id+'_c');
		$('.glyp'+note_id+'_c').attr('class','glyphicon glyphicon-thumbs-up');
		
	}
	else {
		alert(data);
	}
					
});
		
}

function like_get(note_id){
	$.post('includes/ajax/like_get.php',{note_id:note_id},function(data){
		//$('#note_'+note_id+'+_likes').innerHTML = data;
		var Object = document.getElementById("note_"+note_id+"_likes");
		Object.innerHTML = data;
		Object.setAttribute("style","padding-right:10px;");
		var Object_c = document.getElementsByClassName("note_"+note_id+"_likes_c");//("note_"+note_id+"_likes");
		Object_c[0].innerHTML = data;
		Object_c[0].setAttribute("style","padding-right:10px;");
		Object_c[1].innerHTML = data;
		Object_c[1].setAttribute("style","padding-right:10px;");		
		
	});
}

/*function DownCount(note_id){
	alert(note_id);
	$.post('includes/ajax/Downcount.php',{note_id:note_id},function(data){
		
	})
}*/