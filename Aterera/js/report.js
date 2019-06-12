function reportNote(Noteid,Userid) {
	$.post('includes/ajax/report.php',{Noteid:Noteid,Userid:Userid},function(data){
		if(data =='Ban')
			$('#Rep'+Noteid).attr('style','display:none');
	});
}


