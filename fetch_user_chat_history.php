<?php
include 'C:\xampp\htdocs\messages\db.php'; 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
echo fetch_user_chat($_SESSION['id'],$_POST['to_user_id'],$db);
}else{
  header('location:login.php');  
    
}


?>