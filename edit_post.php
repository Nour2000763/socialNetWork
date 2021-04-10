<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$query ='update posts set edit=1 where post_id='.$_POST['post_id'].'';
$stat =$db ->prepare($query);
$stat->execute($data)
}else{
  header('location:login.php');  
    
}
    


 
?>