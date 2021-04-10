<?php
include 'C:\xampp\htdocs\messages\db.php'; 
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
echo fetch_timeline_chat($db);
}else{
  header('location:login.php');  
    
}
    


?>