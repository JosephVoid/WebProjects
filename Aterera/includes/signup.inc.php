<?php
session_start();
if (isset($_POST['submit'])) {
	include_once 'dbn.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$sch = mysqli_real_escape_string($conn, $_POST['sch']);
	$stat = $_POST['stat'];
	$teachcode = $_POST['teachcode'];
	$rand = rand(1,9);
	
		switch($rand){
			case 1:
				$pic = "../UniNotes/images/black.png";break;
			case 2:
				$pic = "../UniNotes/images/white.png";break;
			case 3:
				$pic = "../UniNotes/images/pink.png";break;
			case 4:
				$pic = "../UniNotes/images/grey.png";break;
			case 5:
				$pic = "../UniNotes/images/yellow.png";break;
			case 6:
				$pic = "../UniNotes/images/green.png";break;
			case 7:
				$pic = "../UniNotes/images/blue.png";break;
			case 8:
				$pic = "../UniNotes/images/clarton.png";break;
			case 9:
				$pic = "../UniNotes/images/orange.png";break;
			default:
				break;}
	//Error Handlers
	//Check for empty fields
		
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../index.php?index=invalid");
			exit();
		}
		else {
			//Check if emails are valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../index.php?index=invalid_email");
				exit();
			}
			else {
				//Check if username exists in the database
				$sql = "SELECT * FROM users WHERE  user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0 || $uid == "Admin") {
					header("Location: ../index.php?index=usertaken");
					exit();
				}
				else {
					//Hashing the password with md5
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					if($stat == 1){
						$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, pro_pic,inst,type) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', '$pic','$sch','$stat')";
						}
					else if($stat == 0){
						$r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM codes WHERE code = $teachcode"));
						if(Checker($teachcode,'codes','code') && $r['used'] != 1){
							$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, pro_pic,inst,type) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd', '$pic','$sch','$stat')";
							mysqli_query($conn,"UPDATE codes SET used = '1'");
						}
						else
							{header("Location: ../index.php?index=codeinvalid");exit();}
					}
					
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM users WHERE user_uid = '$uid'"));
						$_SESSION['pic'] = $row['pro_pic'];
						if($stat == 1)
							$_SESSION['type'] = $stat;
						if($stat == 0)
							$_SESSION['type'] = $stat;
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];		
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_uid'] = $row['user_uid'];
						$_SESSION['u_email'] = $row['user_email'];
					header("Location: ../dashboard.php?login=success");
					exit();
				}
			}
		
	}
	
}

else {
	header("Location: ../index.php");
	exit();
}

?>