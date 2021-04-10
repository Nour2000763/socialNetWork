<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
echo r_c_notification($db);
echo update_notification($db);
 
?>