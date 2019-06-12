<?php
include '../dbn.inc.php';
session_start();
if(isset($_POST['note_id'])){
	$note_id = $_POST['note_id'];
	
	mysqli_query($conn,"INSERT INTO downs (user,note) SELECT {$_SESSION['u_id']},{$note_id} FROM notes
						WHERE EXISTS(
						SELECT n_id FROM notes WHERE n_id = {$note_id})
						AND NOT EXISTS(
						SELECT id FROM article_likes
						WHERE user = {$_SESSION['u_id']} AND note = {$note_id})
						LIMIT 1");
	$r = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM downs WHERE user = ".$_SESSION['u_id']." AND note = $note_id"));
	$result = $r[0];
	if($result == 0){
		mysqli_query($conn,"UPDATE notes SET downloads = downloads + 1 WHERE n_id = $note_id");
	}
	$res = mysqli_fetch_array(mysqli_query($conn,"SELECT downloads FROM notes WHERE n_id = $note_id"));
	echo $res['downloads'];
}
?>