<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$query ='delete from comments where id='.$_POST['comment_id'].'';
$stat =$db ->prepare($query);
$stat->execute($data)
}else{
  header('location:login.php');  
    
}
 
?>