<link rel="stylesheet" href="UniNotes/bootstrap-3.3.7-dist/css/bootstrap.css">
<?php
$GLOBALS['link'] = mysqli_connect("localhost", "root", "", "notes");
include 'like.php';


function LikeButton($note_id){
	$note_likes = likes_count($note_id);
	if(previously_liked($note_id)){
		echo "<span style='padding-right:10px;' id='note_".$note_id."_likes' class='note_".$note_id."_likes_c'><strong>$note_likes</strong></span><a id='link' href='#/' onclick='like_add($note_id)'><button style='text-align:center;height:35px;width:75px' id='Button".$note_id."' class='btn btn-primary btn-sm'><div style='margin-left:-20px;margin-top:-5px;'><span id='glyp".$note_id."' class='glyp".$note_id."_c glyphicon glyphicon-thumbs-down'></span><t id='ub".$note_id."' class='ub".$note_id."_c' style='padding:0px;'>Unlike</t></div></button></a>";}
	else if(!previously_liked($note_id)){
		echo "<span style='padding-right:10px;' id='note_".$note_id."_likes' class='note_".$note_id."_likes_c'><strong>$note_likes</strong></span><a id='link' href='#/' onclick='like_add($note_id)'><button style='text-align:center;height:35px;width:75px' id='Button".$note_id."' class='btn btn-primary btn-sm'><div style='margin-left:-20px;margin-top:-5px;'><span id='glyp".$note_id."' class='glyp".$note_id."_c glyphicon glyphicon-thumbs-up'></span><t id='lb".$note_id."'class='lb".$note_id."_c' style='padding:0px;'>Like</t></div></button></a>";}
}

 ?>

<?php
function DownloadButton($file_loc,$name,$note_name){
	$exten=substr($file_loc,strpos($file_loc,'.')+1);
	$r = mysqli_fetch_array(mysqli_query($GLOBALS['link'],"SELECT * FROM notes WHERE n_name = '$note_name'"));
	//$size = substr($r['size']/1000000,0,4);
	$size = round($r['size']/1000000,2);
	$downs = $r['downloads'];
	?><a href="includes/DownloadCount.php?note_id=<?php echo $r['n_id']?>&user_id=<?php echo $_SESSION['u_id']?>"><button id="Dbutton" class="btn btn-primary"><span class="left"><span class="glyphicon glyphicon-save"></span><?php echo $size.'MB'?></span><span class="right"><?php echo "(".$downs." <span style='font-size:x-small;' class='glyphicon glyphicon-save'></span>)"?></span></button></a>

	<?php }
?>

<?php

function ReportButton($note_id,$current_user){
	
	/*if (isset($_POST['reported'])) {
		$noteid = $_POST['postid'];
		$result = mysqli_query($GLOBALS['link'], "SELECT * FROM notes WHERE n_id=$noteid");
		$row = mysqli_fetch_array($result);
		$n = $row['ban_req'];
			
		mysqli_query($GLOBALS['link'], "UPDATE notes SET ban_req=$n+1 WHERE n_id=$noteid");
		mysqli_query($GLOBALS['link'], "INSERT INTO report (user, note) VALUES ($current_user, $noteid)");
		
		if($n == 5){
			mysqli_query($GLOBALS['link'], "UPDATE notes SET invalid = 1 WHERE n_id=$noteid");
		}
		
		
		exit();
	}
	$result = mysqli_query($GLOBALS['link'],"SELECT * FROM report WHERE user = $current_user AND note = $note_id");
	
	if(mysqli_num_rows($result) == 1){}
	
	else{
	*/
	?>
	<span><a href="#" class="repo" id="Rep<?php echo $note_id ?>" onclick="reportNote(<?php echo $note_id ?>,<?php echo $_SESSION['u_id']?>)"><span class="glyphicon glyphicon-flag"></span></a></span>
	<?php
	
}


?>














