<?php
include '../dbn.inc.php';
if (isset($_POST['Noteid']) && isset($_POST['Userid'])) {
	$noteid = $_POST['Noteid'];
	$userid = $_POST['Userid'];
	$result = mysqli_query($conn, "SELECT * FROM notes WHERE n_id=$noteid");
	$row = mysqli_fetch_array($result);
	$n = $row['ban_req'];
		
	if(mysqli_query($conn, "UPDATE notes SET ban_req=$n+1 WHERE n_id=$noteid") && mysqli_query($conn, "INSERT INTO report (user, note) VALUES ($userid, $noteid)")){
		if($n == 5){
			mysqli_query($conn, "UPDATE notes SET invalid = 1 WHERE n_id=$noteid");
		}
		echo 'Ban';
	}		
				
}
?>