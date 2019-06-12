<?php
include '../dbn.inc.php';
if(isset($_POST['author_id'])){
	$author_id = $_POST['author_id'];
	$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE user_id = $author_id"));
	echo $row['user_first'].'*'.$row['user_email'].'*'.$row['pro_pic'].'*'.$row['t_likes'].'*'.$row['inst'];
}
?>