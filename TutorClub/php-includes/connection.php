<?php

$ServerName = $_SERVER['SERVER_NAME'];
$DbPassword = '';
$DbUsername = 'root';
$DbName = 'TutorClub';

$conn = mysqli_connect($ServerName,$DbUsername,$DbPassword,$DbName);
session_start();

function checker($to_be_checked,$table,$col){//To check if a row exists
    global $conn;
    $run=mysqli_query($conn,"SELECT ".$col." FROM ".$table."");
    
    for( $i = 0 ; $row = mysqli_fetch_assoc($run) ; $i++ ){
		if($to_be_checked == $row[$col]){
			return 1;
		}
		else
			continue;
	}
	return 0;
}

function perDayViewCounter(){//Views per day
    global $conn;
    $User_Ip = $_SERVER['REMOTE_ADDR'];
    $day = date('d-m-y');
    if(!checker($User_Ip,'ip_store','ip')){
        mysqli_query($conn,"INSERT INTO ip_store('ip')VALUES($User_Ip)");
        if(checker($day,'per_day_view','day'))
            mysqli_query($conn,"UPDATE per_day_view SET view = view + 1 WHERE day = '$day'");
        else
            mysqli_query($conn,"INSERT INTO per_day_view VALUES('','$day','1')");    
    }
}

function Session_Setter($id){
    $_SESSION['user_id'] = $id;
    return $_SESSION['user_id'];
}



?>