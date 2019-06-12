<?php
//include 'dbn.inc.php';
$conn = mysqli_connect('localhost', 'root', "", "notes");
	if(isset($_GET['note_id']) && isset($_GET['user_id'])){
		$user_id = $_GET['user_id'];
		$note_id = $_GET['note_id'];
		if(mysqli_query($conn,"INSERT INTO downs (user,note) SELECT $user_id,$note_id FROM notes WHERE EXISTS(SELECT n_id FROM notes WHERE n_id = $note_id)
						AND NOT EXISTS(SELECT id FROM downs	WHERE user = $user_id AND note = $note_id)
						LIMIT 1")){
		$r = mysqli_fetch_row(mysqli_query($conn,"SELECT COUNT(*) FROM downs WHERE note = $note_id"));
		$result = $r[0];
		mysqli_query($conn,"UPDATE notes SET downloads = $result WHERE n_id = $note_id");
		
		$r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM notes WHERE n_id = $note_id"));
		$file = $r['file_loc'];$note_name = $r['n_name'];$auth_id = $r['author'];$q = mysqli_fetch_row(mysqli_query($conn,"SELECT user_uid FROM users WHERE user_id = $auth_id"));
		$author = $q[0];
		$temp = explode('.',$file);$ext = end($temp);
		switch($ext){
			case 'jpg':
				$type = 'image/jpeg';break;
			case 'docx':
				$type = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';break;
			case 'ppt':
				$type = 'application/vnd.ms-powerpoint';break;
			case 'pptx':
				$type = 'application/vnd.openxmlformats-officedocument.presentationml.presentation';break;	
			case 'pdf':
				$type = 'application/pdf';break;
			case 'txt':
				$type = 'text/plain';break;
			default:
				break;
		}
		header('Content-disposition: attachment;filename='.$note_name.'-'.$author.'-[ATERERA].'.$ext.'');
		header('Content-type:'.$type.'');
		readfile('../'.$file.'');
	}
	
	}
?>