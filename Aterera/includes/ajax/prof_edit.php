<?php
	session_start();
	$conn = mysqli_connect('localhost','root','','notes');
	if(!empty($_POST['Ename']) || !empty($_POST['Eusname']) || !empty($_POST['Eem']) || !empty($_POST['Eprpass']) || !empty($_POST['Enwpass']) || !empty($_FILES['Epp']['name'])){
		$output = [];
				
		//Uploading pics
		if(!empty($_FILES['Epp']['name'])){
			$pic_name = $_FILES['Epp']['name'];
			
			$pic_name_temp = $_FILES['Epp']['tmp_name'];
			$pic_size = $_FILES['Epp']['size'];$temp = explode(".",$pic_name);
			$exten = end($temp);$loc = "../../Profile/Pics/";
			
			if($exten == 'jpg' || $exten == 'png' || $exten == 'jpeg'){
				
				if($pic_size < 100000){
					
					if(move_uploaded_file($pic_name_temp,$loc.$pic_name)){
						$fulloc = substr($loc,6).$pic_name;
						if(mysqli_query($conn,"UPDATE users SET pro_pic = '$fulloc' WHERE user_id =".$_SESSION['u_id']."")){
						$output[] = "Successfully changed!\n";
						$_SESSION['dis_pic'] = $fulloc;}
					}
					else
						$output[] = "Upload error!\n";
				}
				else
					$output[] = "File must be less than 100kb!\n";
			}
			else
				$output[] = "File must be a '.jpeg' or '.png' or '.jpg'!\n";
		}
		
		//Updating passwords
		if(!empty($_POST['Eprpass']) || !empty($_POST['Enwpass'])){
			if(!empty($_POST['Eprpass']) && !empty($_POST['Enwpass'])){
				$Eprpass = $_POST['Eprpass'];
				$Enwpass = $_POST['Enwpass'];
				$r = mysqli_fetch_row(mysqli_query($conn,"SELECT user_pwd FROM users WHERE user_id =".$_SESSION['u_id'].""));
				$prev_pass = $r[0];
				if(password_verify($Eprpass,$prev_pass)){
					$hashed = password_hash($Enwpass, PASSWORD_DEFAULT);
					mysqli_query($conn,"UPDATE users SET user_pwd = '$hashed' WHERE user_id =".$_SESSION['u_id']."");
					$output[] = "Password Successfully changed!\n";
				}
				else
					$output[] =  "Wrong Old password\n";
			}
		}
		
		//Updating Username
		if(!empty($_POST['Eusname'])){
			$Eusname = $_POST['Eusname'];
				$taken = false;
				$res = mysqli_query($conn,"SELECT user_uid FROM users");
				
				for($i = 0;$c = mysqli_fetch_row($res);$i++){
					if($c[$i] == $Eusname){
						$output[] = "Username taken!\n";
						$taken = true;
						break;
						}					
				}
				if($taken == false)
				{	if(mysqli_query($conn,"UPDATE `users` SET `user_uid` = '$Eusname' WHERE `user_id` = ".$_SESSION['u_id'].""))
						$output[] = "Username Successfully changed!\n";
					$_SESSION['dis_us'] = $Eusname;}
			
		}
		
		//Updating Nname
		if(!empty($_POST['Ename'])){
			$Ename = $_POST['Ename'];
			if(mysqli_query($conn,"UPDATE users SET user_first = '$Ename' WHERE user_id =".$_SESSION['u_id']."")){
			$output[] = "Name Successfully changed!\n";
			$_SESSION['dis_nm'] = $Ename;
			}
		}
		
		//Updating email
		if(!empty($_POST['Eem'])){
			$Eemail = $_POST['Eem'];
			if(mysqli_query($conn,"UPDATE users SET user_email = '$Eemail' WHERE user_id =".$_SESSION['u_id']."")){
			$output[] = "Email Successfully changed!\n";
			$_SESSION['dis_em'] = $Eemail;
			}
		}
	}
	else
		$output[] = "Enter some data!\n";
	
	echo json_encode($output);
	
?>