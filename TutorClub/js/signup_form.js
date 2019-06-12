$(document).on('submit','#signup-form',function(e){

//For picture
var pic  = $("#pic").files[0];
var form = new FormData();
form.append("pic",file);
var ajax = new XMLHttpRequest();
ajax.upload.addEventListener("progress",progressHandler,false);
ajax.addEventListener("load",completeHandler,false);
ajax.addEventListener("error",errorHandler,false);
ajax.open("POST","../php-includes/pic_uploader.php");
ajax.send(form);
				
				function progressHandler(event){
					var percent = (event.loaded / event.total) * 100;
					$("#path_sgn").innerHTML = "Uploading  " + percent +'%';
					$("#submit-button").attr("disabled","disabled");
				}
				
				function completeHandler(event){
					$("#submit-button").removeAttribute("disabled");
					$("#signup-form").reset();
					$.post("../php-includes/signup.php",{
                                notename:nn , coursename:cn , type:tp , desc:ds},
                        function(data){
                            if(data)
						        location.replace("../index.php");
					});
					//_("message").innerHTML = event.target.responseText;
					
					_("canv").setAttribute("style","width:170px;height:30px;background-color:#eeeeee;border:solid 2px;border-radius:10px;border-color:#f54c53;display:none;");
				}
				
				function errorHandler(event){
					_("message").innerHTML = "Upload failed!";
				}

});