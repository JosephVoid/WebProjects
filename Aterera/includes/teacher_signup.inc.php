<?php

if (isset($_POST['submit'])) {
	include_once 'dbn.inc.php';
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$code = mysqli_real_escape_string($conn, $_POST['code']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


	//Check if the code is correct
	$checkCode = false;
	$sql = "SELECT * FROM codes WHERE  code='$code'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					$checkCode = true;
				}
				else {
					$checkCode = false;
				}

	//Error Handlers
	//Check for empty fields
	if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
		header("Location: ../teachers.php?teachers=empty");
		exit();
	}
	else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../teachers.php?teachers=invalid");
			exit();
		}
		else {
			//Check if emails are valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../teachers.php?teachers=invalid_email");
				exit();
			}
			else {
				//Check if username exists in the database
				$sql = "SELECT * FROM users WHERE  user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);
				if ($resultCheck > 0) {
					header("Location: ../teachers.php?teachers=usertaken");
					exit();
				}
				else {
					//Hashing the password with md5
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					if ($checkCode) {
						$sql = "INSERT INTO teachers (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
						mysqli_query($conn, $sql);
						header("Location: ../teachers.php?teachers=success");
						exit();
					}
					else {
						header("Location: ../teachers.php?teachers=code_error");
						exit();
					}
				}
			}
		}
	}
	
}

else {
	header("Location: ../teachers.php");
	exit();
}

?>
