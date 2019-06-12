<?php
include '../like.php';
session_start();
if(isset($_POST['note_id'],$_SESSION['u_id']) && article_exists($_POST['note_id'])){
	echo likes_count($_POST['note_id']);
}
?>