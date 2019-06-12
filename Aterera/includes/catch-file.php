<?php
$name = $_POST['n_name'];

$tmp = $_FILES['file']['tmp_name'];

if (move_uploaded_file($tmp, "uploaded/".$name)) {
	echo $name . " has been uploaded!";
} else {
	echo "Failed to upload ".$name.'.';
}

?>