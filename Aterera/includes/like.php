<?php
$GLOBALS['link'] = mysqli_connect("localhost", "root", "", "notes");
function article_exists($article_id){
	$article_id = (int) $article_id;
	$r = mysqli_query($GLOBALS['link'],"SELECT COUNT('n_id') FROM `notes` WHERE `n_id` = $article_id");
	$res = mysqli_fetch_row($r);
	return ($res[0] == 0) ? false : true;
	
}

function previously_liked($article_id){
	$article_id = (int) $article_id;
	$r = mysqli_query($GLOBALS['link'],"SELECT COUNT('id') FROM `note_likes` WHERE `notes` = $article_id AND `user` =".$_SESSION['u_id']."");
	$res = mysqli_fetch_row($r);
	return ($res[0] == 0) ? false : true;
		
}

function likes_count($article_id){
	$r = mysqli_query($GLOBALS['link'],"SELECT `likes` FROM `notes` WHERE `n_id` = $article_id");
	$res = mysqli_fetch_row($r);
	return $res[0];
}

function add_likes($article_id){
	mysqli_query($GLOBALS['link'],"UPDATE `notes` SET `likes` = `likes` + 1 WHERE `n_id` = $article_id");
	mysqli_query($GLOBALS['link'],"INSERT INTO `note_likes` (user,notes) VALUE (".$_SESSION['u_id'].",$article_id)");
}

function unlike($article_id){
	mysqli_query($GLOBALS['link'],"UPDATE `notes` SET `likes` = `likes` - 1 WHERE `n_id` = $article_id");
	mysqli_query($GLOBALS['link'],"DELETE FROM `note_likes` WHERE `notes` = $article_id AND `user` = ".$_SESSION['u_id']."");
}
?>