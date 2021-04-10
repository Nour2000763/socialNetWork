<?php
include 'C:\xampp\htdocs\messages\db.php'; 
session_start();
echo comment_body($_POST['to_post_id'],$db);



?>