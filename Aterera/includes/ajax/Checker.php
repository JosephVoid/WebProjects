<?php
include '../dbn.inc.php';

if(isset($_POST['CheckName']) && isset($_POST['CheckFile'])){
	$Name_check = $_POST['CheckName'];
	$File_check = $_POST['CheckFile'];
	if(!Checker($Name_check,'notes','n_name') && !Checker("uploaded/".$File_check,'notes','file_loc'))
		echo "Clear";
	else
		echo "Exists";
	
	//echo Checker($Name_check,'notes','n_name')."||".Checker("uploaded/".$File_check,'notes','file_loc');
	
}

?>