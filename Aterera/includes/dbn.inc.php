<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "notes";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
$GLOBALS['link'] = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

function Checker($to_be_checked,$table,$col){
	$query="SELECT ".$col." FROM ".$table."";
	$run=mysqli_query($GLOBALS['link'],$query);
	$i=0;
	for((int)$i = 0 ; $row = mysqli_fetch_assoc($run) ; $i++){
		if($to_be_checked == $row[$col]){
			
			return 1;
		}
		else
			continue;
	}
	return 0;
}

?>