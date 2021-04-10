<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$stat= $db->prepare('select * from  chat_message where to_user_id ='.$_SESSION['id'].' and status = 1 ');
$stat->execute();
$count = $stat->rowCount();
$output='';
if($count > 0){
   $output =' <span class="text-dark" ><span class=" text-danger"><b>'.$count.'</b></span> New Message</span>'; 
}
echo $output;
}else{
  header('location:login.php');  
    
}

?>
