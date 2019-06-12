
$(document).ready(function(e){
	$("#edit_form").on('submit',function(e){
	e.preventDefault();
	var Form = new FormData(this);
	
	$.ajax({
		url: "includes/ajax/prof_edit.php",
		type: 'post',
		data: Form,
		dataType: 'json',
		processData: false,
		contentType: false,
		success: function(data){
			
			if(data[0] != undefined)
				var data1 = data[0];
			else
				var data1 = "";
			
			if(data[1] != undefined)
				var data2 = data[1];
			else
				var data2 = "";
			
			if(data[2] != undefined)
				var data3 = data[2];
			else
				var data3 = "";
			
			if(data[3] != undefined)
				var data4 = data[3];
			else
				var data4 = "";
			
			if(data[4] != undefined)
				var data5 = data[4];
			else
				var data5 = "";
			if(data[5] != undefined)
				var data6 = data[5];
			else
				var data6 = "";
			if(data[6] != undefined)
				var data7 = data[6];
			else
				var data7 = "";
			
			if(data1=="" && data2=="" && data3=="" && data4=="" && data5=="" && data6=="" && data7==""){}
			else
				alert(data1 + data2 + data3 + data4 + data5 + data6 + data7);
			
			$.ajax({
				url: "includes/ajax/prof_dis.php",
				type: "post",
				dataType: 'json',
				success:function(input){
					if(input[0] != undefined || input[0]!=""){$('#uzname').text(input[0]);$('#ed_username').text(input[0]);}
					
					if(input[1] != undefined || input[1]!=""){$('.intro-text-small').text(input[1]);$('#ed_name').text(input[1]);}
					
					if(input[2] != undefined || input[2]!="")
						$('#ed_email').text(input[2]);
					
					if(input[3] != undefined || input[3] != ""){$('#ed_pic').attr('src',input[3]);$('#pro_z').attr('src',input[3]);}
					
					}
				});
			
		}
	});
	
	
	
	
	});
	
});