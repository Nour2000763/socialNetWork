<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$stat=$db->prepare('update chat_message set deleted = 1 where cm_id='.$_POST['message_id'].'');
$stat->execute();
}else{
  header('location:login.php');  
    
}



?>