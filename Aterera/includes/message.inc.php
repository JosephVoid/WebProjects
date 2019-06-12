<?php

include_once 'dbn.inc.php';

if (isset($_POST['submit'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$subject = mysqli_real_escape_string($conn, $_POST['subject']);
	$message = mysqli_real_escape_string($conn, $_POST['message']);
	
	if (empty($fname) || empty($email) || empty($subject) || empty($message)) {
		header("Location: ../contact.php?contacts=empty_fields");
		exit();
	}
	else {
		$sql = "INSERT INTO messages (user_name, user_email, user_subject, user_message) VALUES ('$fname', '$email', '$subject', '$message');";
		$result = mysqli_query($conn, $sql);
		header("Location: ../contact.php?contacts=success".$result);
		exit();
	}
	
}

else {
	header("Location: ../contact.php");
	exit();
}

?>