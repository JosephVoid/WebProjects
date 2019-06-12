function mdldsp(auth_id){
	$.post('includes/ajax/display.php',{author_id:auth_id},function(data){
		var Disp = data.split('*');
		$('#md_nm').text(Disp[0]);$('#md_sch').text(Disp[4]);
		$('#md_cont').text(Disp[1]);$('#md_likes').text(Disp[3]);
		$('#md_pic').attr('src',Disp[2]);
	});
}