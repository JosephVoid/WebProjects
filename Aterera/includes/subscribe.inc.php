<?php

include_once 'dbn.inc.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);

if (isset($_POST['submit'])) {
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../index.php?subscribe=invalid_email");
		exit();
	}
	else {
		$sql = "INSERT INTO subscribers (user_email) VALUES ('$email');";
		mysqli_query($conn, $sql);
		header("Location: ../index.php?subscribe=success");
		exit();
	}
}
else {
	header("Location: ../index.php");
	exit();
}

?>