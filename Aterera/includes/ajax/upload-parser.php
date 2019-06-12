<?php
include '../dbn.inc.php';
session_start();
$succ = false;$succ2 = false;
if(isset($_FILES['fileup']['name'])){
	$name = $_FILES['fileup']['name'];
	$tmp = $_FILES['fileup']['tmp_name'];
	$size = $_FILES['fileup']['size'];
	$size_MB = ($_FILES['fileup']['size']) / 1000000;
							
				$location="../../uploaded/";
				$actual_time = date('Y-m-d',time());
				
				if($_SESSION['type'] == 1)
					$stat = 1;
				else if($_SESSION['type'] == 0)
					$stat = 0;
				
				move_uploaded_file($tmp,$location.$name);
				$fulloc = substr($location,6).$name;
				$_SESSION['locater'] = $fulloc;
				$q = "INSERT INTO notes VALUES ('','','','".$_SESSION['u_id']."','$stat','$fulloc','','$actual_time','','','$size','','','')";
				
				if(mysqli_query($conn,$q));
					echo "File Uploaded";
			
			

}














	

?>