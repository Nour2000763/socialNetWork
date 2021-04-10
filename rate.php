<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if(isset($_POST['action'])){
    $data=array(
        'user_id'=>$_SESSION['id'],
        'post_id'=>$_POST['post_id'],
        'rate'=>$_POST['action']
    
    );
    switch($_POST['action']){
        case 'heart':
            $query='insert into posts_rating(user_id,post_id,rate) values(:user_id,:post_id,:rate) ';
            break;
        case 'unheart':
            $query='delete from posts_rating where user_id='.$_SESSION['id'].' and post_id='.$_POST['post_id'].'';
            break;
          case 'star':
            $query='insert into posts_rating(user_id,post_id,rate) values(:user_id,:post_id,:rate) ';
            break;
        case 'unstar':
            $query='delete from posts_rating where user_id='.$_SESSION['id'].' and post_id='.$_POST['post_id'].'';
            break;  
            
        default:
            break;
    }
    
    $stat = $db->prepare($query);
    $stat->execute($data);
    
    
    
}




?>