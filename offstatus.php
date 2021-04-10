<?php
session_start();
include 'C:\xampp\htdocs\messages\db.php'; 
$stat=$db->prepare('update message_user set status="offline" where phone='.$_SESSION['phone'].'');
$stat->execute();
header('location:logout.php');

?>