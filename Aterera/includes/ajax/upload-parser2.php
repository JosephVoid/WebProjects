<?php
include '../dbn.inc.php';
session_start();
if(isset($_POST['notename']) && isset($_POST['coursename']) && isset($_POST['type'])){
	
	$note_name = mysqli_real_escape_string($conn,$_POST['notename']);
	$course_name = mysqli_real_escape_string($conn,$_POST['coursename']);
	$type = mysqli_real_escape_string($conn,$_POST['type']);
	$desc = mysqli_real_escape_string($conn,$_POST['desc']);
		switch($type){
			case 'n':
				$type = 0;break;
			case 'l':
				$type = 1;break;
			case 'p':
				$type = 2;break;
			default:
				break;
			}
		if($type == 0)
			$desc = NULL;
		
		$q = "UPDATE notes SET n_name = '$note_name',course = '$course_name',type = '$type',description = '$desc' WHERE file_loc ='".$_SESSION['locater']."'";
		if(mysqli_query($conn,$q))
			echo "Uploaded";
		else
			echo mysqli_error($conn);
		
}
?>