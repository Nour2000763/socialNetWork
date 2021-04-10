<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
$data =array(
    'user_id' => $_SESSION['id'],
    'post' => $_POST['attach_post']
);
$query ='insert into posts(user_id,post,post_img) values(:user_id,:post,0)';
$stat =$db ->prepare($query);
$stat->execute($data)
   
 
?>