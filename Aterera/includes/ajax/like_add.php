<?php
include '../like.php';
session_start();
if(isset($_POST['note_id'],$_SESSION['u_id']) && article_exists($_POST['note_id'])){
	
	$note_id = $_POST['note_id'];
	if(previously_liked($note_id)){
		//unlike
		unlike($note_id);
		echo "unlike";
	} 
	else
		{	add_likes($note_id);echo "like";		}

	}
?>