function _(el){
	return document.getElementById(el);
}
let result;
var Ftypes = ['application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.openxmlformats-officedocument.presentationml.presentation',
'application/pdf','image/jpeg','text/plain'];

$("#upload-form").on('submit',function(e){
	e.preventDefault();
	var file  = _("fileup").files[0];
	var Ft = file.type;
	var Fn = file.name;
	var ChN =  $('#nn').val();
	/*$.post("includes/ajax/Checker.php",{CheckFile:Fn , CheckName:ChN},function(data){
		//alert(data);
		result = data;
		
	});*/
	$.ajax({
		type: 'POST',
		async : false,
		url: 'includes/ajax/Checker.php',
		data :{CheckFile:Fn , CheckName:ChN},
		success : function(data){
			result = data;
		}
	})
	
	if(((Ft == Ftypes[0]) || (Ft == Ftypes[1]) || (Ft == Ftypes[2]) || (Ft == Ftypes[3]) || (Ft == Ftypes[4]) || (Ft == Ftypes[5]))){
		if(file.size < 10000000){
			if(result == 'Clear'){
				
				var form = new FormData();
				form.append("fileup",file);
				var ajax = new XMLHttpRequest();
				ajax.upload.addEventListener("progress",progressHandler,false);
				ajax.addEventListener("load",completeHandler,false);
				ajax.addEventListener("error",errorHandler,false);
				//ajax.addEventListener("abort",abortHandler,false);
				ajax.open("POST","includes/ajax/upload-parser.php");
				ajax.send(form);
				
				function progressHandler(event){
					_("canv").setAttribute("style","width:170px;height:30px;background-color:#eeeeee;border:solid 2px;border-radius:10px;border-color:#f54c53;display:block;");
					canvas = _("canv");
					context = canvas.getContext("2d");
					var percent = (event.loaded / event.total) * 300;
					context.beginPath();
					context.moveTo(0,15);
					context.lineTo(percent,15);
					context.lineWidth = 270;
					context.strokeStyle = "#f54c53";
					context.stroke();
					_("message").innerHTML = "Uploading";
					_("Upbut").setAttribute("disabled","disabled");
				}
				
				function completeHandler(event){
					_("Upbut").removeAttribute("disabled");
					var nn = $('#nn').val();
					var cn = $('#cn').val();
					var tp = $("#tp").val();
					var ds = $("#ds").val();
					_("upload-form").reset();
					$.post("includes/ajax/upload-parser2.php",{notename:nn , coursename:cn , type:tp , desc:ds},function(data){
						_("message").innerHTML = data+" "+event.target.responseText;
					});
					//_("message").innerHTML = event.target.responseText;
					
					_("canv").setAttribute("style","width:170px;height:30px;background-color:#eeeeee;border:solid 2px;border-radius:10px;border-color:#f54c53;display:none;");
				}
				
				function errorHandler(event){
					_("message").innerHTML = "Upload failed!";
				}
			}
			else if(result == 'Exists')
				_("message").innerHTML = "File already Exists!";	
		}
		else
			_("message").innerHTML = "File too large!";
	}
	else
		_("message").innerHTML = "Wrong file type!";
});