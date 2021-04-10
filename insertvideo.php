<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
$data =array(
    'user_id' => $_SESSION['id'],
    'post'=>$_POST['caption'],
    'img' => $_POST['post_video']
);
$query ='insert into posts(user_id,post,img,post_img) values(:user_id,:post,:img,2)';
$stat =$db ->prepare($query);
$stat->execute($data)
   
 
?>