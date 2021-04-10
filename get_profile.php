<?php
include 'C:\xampp\htdocs\messages\db.php'; 
session_start();
echo get_user_posts($_POST['user_id'],$db);



?>