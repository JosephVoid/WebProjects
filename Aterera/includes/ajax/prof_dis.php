<?php
session_start();
$display = [];
if(isset($_SESSION['dis_us']))
	$display[] = $_SESSION['dis_us'];
else
	$display[] = "";
if(isset($_SESSION['dis_nm']))
	$display[] = $_SESSION['dis_nm'];
else
	$display[] = "";
if(isset($_SESSION['dis_em']))
	$display[] = $_SESSION['dis_em'];
else
	$display[] = "";
if(isset($_SESSION['dis_pic']))
	$display[] = $_SESSION['dis_pic'];
else
	$display[] = "";

echo json_encode($display);

?>