<?php
session_start();
if(isset($_POST['nameS']) && isset($_POST['usernameS']) && isset($_POST['passwordS']) && isset($_POST['emailS']) && isset($_POST['type']) && 
    isset($_POST['sex']) && isset($_POST['Edulvl']) && isset($_POST['subj']) && isset($_POST['ph']) && isset($_POST['telg']) && isset($_POST['abt'])){
    include_once 'connection.php';
    
    //Values from form
    
    $Name = mysqli_real_escape_string($conn,$_POST['nameS']);
    $Username = mysqli_real_escape_string($conn,$_POST['usernameS']);
    $Password = mysqli_real_escape_string($conn,$_POST['passwordS']);
    $Email = mysqli_real_escape_string($conn,$_POST['emailS']);
    $Type = mysqli_real_escape_string($conn,$_POST['type']);
    $Sex = mysqli_real_escape_string($conn,$_POST['sex']);
    $Education = mysqli_real_escape_string($conn,$_POST['Edulvl']);
    $Subject = mysqli_real_escape_string($conn,$_POST['subj']);
    $Perhour = mysqli_real_escape_string($conn,$_POST['ph']);
    $Telegram = mysqli_real_escape_string($conn,$_POST['telg']);
    $About = mysqli_real_escape_string($conn,$_POST['abt']);
   
    //Refinery
    
    $Refined_Telegram = substr_replace($Telegram,"http://t.me/",0,1);
    $hashed_pwd = password_hash($Password,PASSWORD_DEFAULT);
    
    if(ctype_alpha($Name)){
        if(!checker($Username,'users','username')){
            $q = "INSERT INTO users VALUES ('','$Username','$Password','$Type','$Perhour','$Education','$Subject','$Refined_Telegram','$Email','$Sex','$About','')";
            if(mysqli_query($conn,$q)){
                $r = mysqli_fetch_assoc(mysqli_query($conn,"SELECT FROM users WHERE username = '$Username"));   
                Session_Setter($r['id']);
                echo 'true';
            }
            else
                echo mysqli_err();    
        }
        else
            echo 'username-taken';
    }
    else
        echo 'non-alphabetic-characters';
    
}
?>