
<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if(isset($_POST['action'])){
    $data=array( 
        'user_id'=>$_SESSION['id'],
        'comment_id'=>$_POST['comment_id'],
        'post_id' =>$_POST['post_id'],
        'rate'=>$_POST['action']
    
    );
    switch($_POST['action']){
        case 'like':
            $query='insert into comments_rating(user_id,comment_id,post_id,rate) values(:user_id,:comment_id,:post_id,:rate) on duplicate key update rate="like" ';
            break;
        case 'unlike':
            $query='delete from comments_rating where user_id='.$_SESSION['id'].' and comment_id='.$_POST['comment_id'].'';
            break;
          case 'dislike':
             $query='insert into comments_rating(user_id,comment_id,post_id,rate) values(:user_id,:comment_id,:post_id,:rate) on duplicate key update rate="dislike" ';
            break;
        case 'undislike':
            $query='delete from comments_rating where user_id='.$_SESSION['id'].' and comment_id='.$_POST['comment_id'].'';
            break;  
            
        default:
            break;
    }
    
    $stat = $db->prepare($query);
    $stat->execute($data);
    
    
    
}



?>