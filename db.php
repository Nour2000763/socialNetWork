

<?php
$source = 'mysql:host=localhost;dbname=message;charset=utf8mb4;';
$user = 'root';
$pass = '';
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',);
    
try{    
    
$db = new PDO($source,$user,$pass,$options);
$db->query('SET NAMES utf8');
$db->query('SET CHARACTERS SET utf8');
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        function fetch_timeline_chat($db){
    $stat =$db->prepare('
    select * from chat_message_timeline order by datestamp asc
    ');
    $stat->execute();
    $resulte = $stat->fetchAll();
    $chat_msg='';    
    $output ='';
    $output .='<ul>';
    foreach($resulte as $row){
        if($row['from_user_id'] == $_SESSION['id']){
            if($row['deleted'] == 1){
                $chat_msg='<p class="bg-primary p-1  text-light text-center" style="width:50%;  border-radius:10px 10px 10px 10px;">you removed this message <i class=" ml-1 fa fa-refresh text-warning return-message" style="cursor:pointer" data-id='.$row['id'].'></i></p>';
            }else{
                $chat_msg='<p class="bg-primary p-1 font-weight-bold text-light" style="width:50%;  border-radius:10px 10px 10px 10px;">
             '.$row['chat_message'].'<br>
               <small class="text-light">
            <i class="delete-message" data-id='.$row['id'].' style="">&times;</i>
               '.$row['datestamp'].'
               </small>
               </p>';
            }
            $message='
            <div class="container left" style="width:100%; word-wrap:break-word;">
            <div class="content" align="right">
             '.$chat_msg.'
             </div>
             </div>
            ';
        }else{
              if($row['deleted'] == 1){
                $chat_msg='<p class=" p-1 text-center" style="width:50%;  border-radius:10px 10px 10px 10px; background-color:#EEE; color:black;">this message has been removed</p>';
            }else if($row['deleted'] == 0){
                $chat_msg='
                <p class=" p-1 font-weight-bold" style="width:50%; border-radius:10px 10px 10px 10px; background-color:#EEE;" style="color:black;">
                <span class=" text-success">'.getName($row['from_user_id'],$db).'</span><br>
                '.$row['chat_message'].'<br>
                <small style="color:black;">'.$row['datestamp'].'</small>
                 </p>';
            }
             $message='
             <div class="container right" style="width:100%; word-wrap:break-word; color:black;">
             <div class="content">
             '.$chat_msg.'
             </div>
             </div>';
                    
            
        }
        $output .= $message;
    }
      
        $output .='</ul>'; 
         return $output;
           
}
    function fetch_user_chat($from_user_id,$to_user_id, $db){
    $stat =$db->prepare('
    select * from chat_message where (from_user_id = "'.$from_user_id.'" and to_user_id ="'.$to_user_id.'")
    or (from_user_id = "'.$to_user_id.'" and to_user_id ="'.$from_user_id.'") order by datestamp asc
    ');
    $stat->execute();
    $resulte = $stat->fetchAll();
     $stat =$db->prepare('update chat_message set status = 0 where from_user_id = "'.$to_user_id.'" and to_user_id ="'.$from_user_id.'"');
         $stat->execute();
    $reply=''; 
    $img='';    
    $chat_msg='';    
    $output ='';
    $output .='<ul>';
    foreach($resulte as $row){
        if($row['status'] == 0){
            $seen='<span class="ml-2 text-warning font-weight-bold">Seen<i class="text-warning fa fa-check"></i></span>';
        }else{
            $seen='<span class="ml-2 text-warning font-weight-bold">Unseen</span>';
        }
        
        if($row['reply_status'] == 1){
            $reply ='<div class="text-center container p-1 bg-light" style="border-radius:10px 10px 10px 10px; width:100%; word-wrap:break-word; border-left:4px solid green; border-right:4px solid green; border:1px solid green">'.$row['reply'].'</div>';
        }else{
            $reply='';
        }
        if($row['msg_img'] == 1){
            $img ='<img src="'.$row['img'].'" width="100%" style="cursor:pointer;" id="myImg" data-bigimg="'.$row['img'].'"/>'; 
        }else{
            $img ='';
        }
        if($row['from_user_id'] == $from_user_id){
            if($row['deleted'] == 1){
                $chat_msg='
                <p class="bg-dark p-1  text-light text-center" style="width:100%;  border-radius:10px 10px 10px 10px;">you removed this message <i class=" ml-1 fa fa-refresh text-warning return-message" style="cursor:pointer" data-id='.$row['cm_id'].'></i></p>';
                $img='';
                $reply='';
            }else{
                $chat_msg='
                <p class="bg-dark p-1 font-weight-bold " style="cursor:pointer; width:100%; color:white;  border-radius:10px 10px 10px 10px;">
               '.$row['chat_message'].'<br>
                    <small class="text-light" style="float:right">
                <i class="p-1 reply-btn fa fa-reply text-warning mb-1  font-weight-bold" data-id='.$row['cm_id'].' data-message="'.$row['chat_message'].'" data-name="You"></i>
              <i class="p-1 delete-message font-weight-bold" data-id='.$row['cm_id'].' style="">&times;</i>
               '.$row['datestamp'].'
               '.$seen.'
               </small>
               </p>';
            }
            $message='
             <div class="mb-1 container right" style="float:right; width:100%; word-wrap:break-word;">
             <div class="bg-dark" style=" border-radius:10px; width:50%; float:right;">
             <div style="width:95%;" class="mt-2 ml-2 mr-2">'.$reply.'</div>
              <div style="width:100%;" class="mt-2 mr-2">'.$img.'</div>
             <div class="content">
             '.$chat_msg.'
               </div>
             </div>
             </div>';
        }else{
              if($row['deleted'] == 1){
                $chat_msg='<p class=" p-1 text-center" style="width:100%;  border-radius:10px 10px 10px 10px; background-color:#EEE; color:black;">this message has been removed</p>';
                $img='';
                $reply='';  
            }else if($row['deleted'] == 0){
                $chat_msg='
                <p class=" p-1 font-weight-bold" style="cursor:pointer; width:100%; background-color:#EEE;" style="color:black;">
                '.$row['chat_message'].'<br>
                 <small style="color:black;">'.$row['datestamp'].'
                  <i class="p-1 reply-btn fa fa-reply text-warning mb-1  font-weight-bold" data-id='.$row['cm_id'].' data-message="'.$row['chat_message'].'" data-name="'.getName($row['from_user_id'],$db).'"></i>
                  </small>
                 </p>';
            }
             $message='
             <div class="mb-1 container left" style="float:left; width:100%; word-wrap:break-word;">
             <div style="background-color:#EEE; border-radius:10px; width:50%; float:left;">
             <div style="width:95%;" class="mt-2 ml-2 mr-2">'.$reply.'</div>
             <div style="width:100%;" class="mt-2 mr-2">'.$img.'</div>
             <div class="content">
             '.$chat_msg.'
            
             </div>
             </div>
             </div>';
                    
            
        }
        $output .= $message;
    }
      
        $output .='</ul>'; 
         return $output;
           
}
    function get_all_posts($db){
         $stat =$db->prepare('SELECT *,DATEDIFF(CURDATE(),datestamp) AS date FROM posts order by datestamp desc');
         $stat->execute();
         $resulte = $stat->fetchAll();
          $output ='';
          $comments='';
          $edit='';
          $none='';
        $posts='';
        $action='';
         foreach($resulte as $row){
             if(userLiked($row['post_id'],$db)){
                 $heart='<i class="text-danger fa fa-heart heart-btn"  data-id="'.$row['post_id'].'"></i>';
             }else{
                 $heart='<i class="text-danger fa fa-heart-o heart-btn"  data-id="'.$row['post_id'].'"></i>';
             }
             if(userStar($row['post_id'],$db)){
                $dislike='<i class="text-warning fa fa-star star-btn" data-id="'.$row['post_id'].'"></i>';
             }else{
                 $dislike='<i class="text-warning fa fa-star-o star-btn" data-id="'.$row['post_id'].'"></i>';
             }
             if($row['post_img']==1){
                 $posts='
                 <p class="ml-3 mr-3" style="font-size:20px;">'.$row['post'].'</p>
                 <img src="http://localhost/messages/'.$row['img'].'" class="mb-2" width="100%" height="auto" id="myImg" data-bigimg="'.$row['img'].'"/>
                 
                 ';
                 $action='';
             }else if($row['post_img']==0){
                  $posts='<p style="font-size:20px;" class="text-center font-weight-bold users-text ml-2">'.$row['post'].'</p>';
                 $action='';
                 
             }else if($row['post_img'] == 2){
                $posts='
                <p class="ml-2">'.$row['post'].'</p>
                <video controls width="100%" height="350px;">
                 <source src="http://localhost/messages/'.$row['img'].'" type="video/mp4">
                </video>
                ';
                 $action='<span class="text-danger"> Posted a video <i class="fa fa-video-camera"></i></span>';
                 
             }
             
     
    if($row['user_id'] !== $_SESSION['id']){
            $edit='';
            $none=''; 
          }
             if($row['user_id'] == $_SESSION['id']){
                 $control='<div style="cursor:pointer; margin-left:0px; border-radius:20px; padding-left:4px; padding-right:4px;">
               <div data-id='.$row['post_id'].' data-post="'.$row['post'].'" class="edit-post d-inline"><i class="text-success fa fa-edit font-weight-bold"></i></div>
               <div style=" margin-left:10px;" data-id='.$row['post_id'].' class="remove-post d-inline"><i class="font-weight-bold text-danger fa fa-ban"></i></div>
               </div>';     
         
            }else{
             $control='';
            
             }
             
             if($row['deleted'] == 0){
             $output .='
             '.$edit.'
             <div class="border ml-1 mb-4  users-post tm-user-info" style=" width:100%; border-radius:10px;">
              <div class="post-head-user pt-3 pl-3">
                <div><img src="http://localhost/messages/'.getImg($row['user_id'],$db).'" width="65px" height="65px" style="border-radius:50%;" id="myImg" data-bigimg="'. getImg($row['user_id'],$db).'"></div>
                <div class=" ml-2"><span data-name="'.getName($row['user_id'],$db).'" data-img="'.getImg($row['user_id'],$db).'" data-id="'.$row['user_id'].'" data-bio="'.getBio($row['user_id'],$db).'" class="font-weight-bold users-name" style="cursor:pointer; text-transform:capitalize;" >'.getName($row['user_id'],$db).'</span> '.$action.'<br><span class="ml-1 post-date">'.$row['date'].'.days ago</span><br>
                <span>'.$control.'</span>
                </div>
              </div>
              <div class="post-body-user" style="word-wrap:break-word; cursor:pointer;">
                 '.$posts.'
                 <div class="tm-user-info show-reacts">
              <div  class="ml-2">'.countHeart($row['post_id'],$db)    .' '.countStar($row['post_id'],$db).'</div>
              <div>'.comments_count($row['post_id'],$db).' <i class="text-primary fa fa-comment" data-id="'.$row['post_id'].'"></i></div>
              </div>
              </div>
              <div class="post-react-user users-react border-top pt-1 pb-1 "  style="cursor:pointer; margin:auto; width:100%;">
                  <div >'.$heart.'</div>
                <div style=" margin-left:15px;"> '.$dislike.'</div>
                  <div style=" margin-left:15px;"><i class="text-primary fa fa-comment-o comment-btn" data-id='.$row['post_id'].' data-username="'.getName($row['user_id'],$db).'" data-img="'.getImg($row['user_id'],$db).'" data-post="'.$row['post'].'" data-postimg="'.$row['img'].'" data-existimg='.$row['post_img'].' data-date="'.$row['date'].'"></i></div>
              </div>
              '.comment_body($row['post_id'],$db).'
             </div>';
         }else{
                $output .=''; 
             }
        }
        return $output;
    }
   
    function get_user_posts($to_user_id,$db){
        $stat =$db->prepare('SELECT *,DATEDIFF(CURDATE(),datestamp) AS date FROM posts where user_id='.$to_user_id.' order by datestamp desc');
         $stat->execute();
         $resulte = $stat->fetchAll();
          $output ='';
          $comments='';
          $edit='';
          $none='';
        $posts='';
        $action='';
         foreach($resulte as $row){
             if(userLiked($row['post_id'],$db)){
                 $heart='<i class="text-danger fa fa-heart heart-btn"  data-id="'.$row['post_id'].'"></i>';
             }else{
                 $heart='<i class="text-danger fa fa-heart-o heart-btn"  data-id="'.$row['post_id'].'"></i>';
             }
             if(userStar($row['post_id'],$db)){
                $dislike='<i class="text-warning fa fa-star star-btn" data-id="'.$row['post_id'].'"></i>';
             }else{
                 $dislike='<i class="text-warning fa fa-star-o star-btn" data-id="'.$row['post_id'].'"></i>';
             }
             if($row['post_img']==1){
                 $posts='
                 <p class="ml-3 mr-3" style="font-size:20px;">'.$row['post'].'</p>
                 <img src="http://localhost/messages/'.$row['img'].'" class="mb-2" width="100%" height="auto" id="myImg" data-bigimg="'.$row['img'].'"/>
                 
                 ';
                 $action='';
             }else if($row['post_img']==0){
                  $posts='<p style="font-size:20px;" class="text-center font-weight-bold users-text ml-2">'.$row['post'].'</p>';
                 $action='';
                 
             }else if($row['post_img'] == 2){
                $posts='
                <p class="ml-2">'.$row['post'].'</p>
                <video controls width="100%" height="350px;">
                 <source src="http://localhost/messages/'.$row['img'].'" type="video/mp4">
                </video>
                ';
                 $action='<span class="text-danger"> Posted a video <i class="fa fa-video-camera"></i></span>';
                 
             }
             
     
    if($row['user_id'] !== $_SESSION['id']){
            $edit='';
            $none=''; 
          }
             if($row['user_id'] == $_SESSION['id']){
                 $control='<div style="cursor:pointer; margin-left:0px; border-radius:20px; padding-left:4px; padding-right:4px;">
               <div data-id='.$row['post_id'].' data-post="'.$row['post'].'" class="edit-post d-inline"><i class="text-success fa fa-edit font-weight-bold"></i></div>
               <div style=" margin-left:10px;" data-id='.$row['post_id'].' class="remove-post d-inline"><i class="font-weight-bold text-danger fa fa-ban"></i></div>
               </div>';     
         
            }else{
             $control='';
            
             }
             
             if($row['deleted'] == 0){
             $output .='
             '.$edit.'
             <div class="border ml-1 mb-4  users-post tm-user-info" style=" width:100%; border-radius:10px;">
              <div class="post-head-user pt-3 pl-3">
                <div><img src="http://localhost/messages/'.getImg($row['user_id'],$db).'" width="65px" height="65px" style="border-radius:50%;" id="myImg" data-bigimg="'. getImg($row['user_id'],$db).'"></div>
                <div class=" ml-2"><span data-name="'.getName($row['user_id'],$db).'" data-img="'.getImg($row['user_id'],$db).'" data-id="'.$row['user_id'].'" data-bio="'.getBio($row['user_id'],$db).'" class="font-weight-bold users-name" style="cursor:pointer; text-transform:capitalize;" >'.getName($row['user_id'],$db).'</span> '.$action.'<br><span class="ml-1 post-date">'.$row['date'].'.days ago</span><br>
                <span>'.$control.'</span>
                </div>
              </div>
              <div class="post-body-user" style="word-wrap:break-word; cursor:pointer;">
                 '.$posts.'
                 <div class="tm-user-info show-reacts">
              <div  class="ml-2">'.countHeart($row['post_id'],$db)    .' '.countStar($row['post_id'],$db).'</div>
              <div>'.comments_count($row['post_id'],$db).' <i class="text-primary fa fa-comment" data-id="'.$row['post_id'].'"></i></div>
              </div>
              </div>
              <div class="post-react-user users-react border-top pt-1 pb-1 "  style="cursor:pointer; margin:auto; width:100%;">
                  <div >'.$heart.'</div>
                <div style=" margin-left:15px;"> '.$dislike.'</div>
                  <div style=" margin-left:15px;"><i class="text-primary fa fa-comment-o comment-btn" data-id='.$row['post_id'].' data-username="'.getName($row['user_id'],$db).'" data-img="'.getImg($row['user_id'],$db).'" data-post="'.$row['post'].'" data-postimg="'.$row['img'].'" data-existimg='.$row['post_img'].' data-date="'.$row['date'].'"></i></div>
              </div>
              '.comment_body($row['post_id'],$db).'
             </div>';
         }else{
                $output .=''; 
             }
        }
        return $output;
    }
    

function userLiked($post_id,$db){
    $stat = $db->prepare('select * from posts_rating where user_id='.$_SESSION['id'].' and post_id='.$post_id.' and rate="heart"');
    $stat->execute();
    $count = $stat->rowCount();
    if($count>0){
        return true;
    }else{
        return false;
    }
    
}
   
    function countHeart($post_id,$db){
       $stat = $db->prepare('select count(*) from posts_rating where post_id='.$post_id.' and rate="heart"');
       $stat->execute();
       $rows = $stat->fetch();
        if($rows > 0){
  
        return $rows[0].' <i class="text-danger fa fa-heart"></i>';

        }
    }
    
function userStar($post_id,$db){
    $stat = $db->prepare('select * from posts_rating where user_id='.$_SESSION['id'].' and post_id='.$post_id.' and rate="star"');
    $stat->execute();
    $count = $stat->rowCount();
    if($count>0){
        return true;
    }else{
        return false;
    }
    
}    
  function countStar($post_id,$db){
       $stat = $db->prepare('select count(*) from posts_rating where post_id='.$post_id.' and rate="star"');
       $stat->execute();
       $rows = $stat->fetch();
      if($rows > 0){
      
        return $rows[0].' <i class="text-warning fa fa-star"></i>';

        }
    } 
    function comments_exist($post_id,$db){
         $stat = $db->prepare('select * from comments where       p_id='.$post_id.'');
          $stat->execute(); 
          $count = $stat->rowCount();
        if($count>0){
        return true;
           }else{
         return false;
                 }
    }
    function comments_count($post_id,$db){
           $stat = $db->prepare('select count(*) from comments where p_id='.$post_id.'');
           $stat->execute();
           $rows = $stat->fetch();
       if($rows > 0){
            return $rows[0];
       }
    }
    
    function comment_body($post_id,$db){
        $stat = $db->prepare('select * from comments where       p_id='.$post_id.' order by datestamp desc');
          $stat->execute(); 
          $rows = $stat->fetchAll();
        $comments='';
        $control='';
        foreach($rows as $row){
            if(userLikedComment($row['id'],$db)){
                $like ='<i class="text-success fa fa-thumbs-up likecomment-btn" data-id='.$row['id'].' data-post='.$row['p_id'].'></i>';
            }else{
                $like ='<i class="text-success fa fa-thumbs-o-up likecomment-btn" data-id='.$row['id'].' data-post='.$row['p_id'].'></i>'; 
            }
            if(userDislikedComment($row['id'],$db)){
                $dislike ='<i class="text-danger fa fa-thumbs-down dislikecomment-btn" data-id='.$row['id'].' data-post='.$row['p_id'].'></i>';
            }else{
                $dislike ='<i class="text-danger fa fa-thumbs-o-down dislikecomment-btn" data-id='.$row['id'].' data-post='.$row['p_id'].'></i>'; 
            }
            if($row['u_id'] == $_SESSION['id']){
                 $control='<div style="cursor:pointer; margin-left:3px; border-radius:20px; padding-left:4px; padding-right:4px;">
               <div style=" margin-left:10px;" data-id='.$row['id'].' id="delete-comment"><i class=" font-weight-bold text-danger fa fa-trash-o"></i></div>
               </div>';
             }else{
             $control='';
             }
             $comments .='
                <div class="comments ml-2 mr-2 p-2">
                <div class="commenter p-2"  style=" ">
                <div><img src="http://localhost/messages/'.getImg($row['u_id'],$db).'" width="40px" height="40px" style="border-radius:50%;"></div>
                <div>
                <span data-name="'.getName($row['u_id'],$db).'" data-img="'.getImg($row['u_id'],$db).'" data-id="'.$row['u_id'].'" data-bio="'.getBio($row['u_id'],$db).'" class="font-weight-bold users-name  tm-user-info" style="text-transform:capitalize; cursor:pointer;">'.commenter($row['u_id'],$db).'</span>
                </div>
                  <div></div>
                <div>'.$control.'</div>
                <br>
                <center><span class="tm-user-info font-weight-bold">'.$row['comment_body'].'</span></center>
                <div style="font-size:22px;" class="tm-user-info">'.countlikes($row['id'],$db).' '.$like.'</div>
                <div style="font-size:22px; margin-left:15px;" class="tm-user-info">'.countdislikes($row['id'],$db).' '.$dislike.'</div>
                </div>
                <div align="left">'.$row['datestamp'].'</div>
                 </div>'; 
        }
       return $comments;
    }
    function userLikedComment($comment_id,$db){
    $stat = $db->prepare('select * from comments_rating where user_id='.$_SESSION['id'].' and comment_id='.$comment_id.' and rate="like"');
    $stat->execute();
    $count = $stat->rowCount();
    if($count>0){
        return true;
    }else{
        return false;
    }
    
}
 function userDislikedComment($comment_id,$db){
    $stat = $db->prepare('select * from comments_rating where user_id='.$_SESSION['id'].' and comment_id='.$comment_id.' and rate="dislike"');
    $stat->execute();
    $count = $stat->rowCount();
    if($count>0){
        return true;
    }else{
        return false;
    }
    
}  
    function countlikes($comment_id,$db){
       $stat = $db->prepare('select count(*) from comments_rating where comment_id='.$comment_id.' and rate="like"');
       $stat->execute();
       $rows = $stat->fetch();
        if($rows > 0){
       return $rows[0];
        }
    }
     function countdislikes($comment_id,$db){
       $stat = $db->prepare('select count(*) from comments_rating where comment_id='.$comment_id.' and rate="dislike"');
       $stat->execute();
       $rows = $stat->fetch();
        if($rows > 0){
       return $rows[0];
        }
    }
    function commenter($user_id,$db){
         $stat =$db->prepare('select username from message_user where id = '.$user_id.'');
        $stat->execute();
        $resulte = $stat->fetchAll();
        foreach($resulte as $row){
           return $row['username'];
        }
        
    }
    function poster($post_id,$db){
        $stat =$db->prepare('select message_user.username from posts inner join message_user on message_user.id =posts.user_id where post_id='.$post_id.'');
        $stat->execute();
        $resulte = $stat->fetchAll();
        foreach($resulte as $row){
           return $row['username'];
        }
    }
    
    function fetch_type($user_id,$db){
        $stat =$db->prepare('select is_type from login_details where user_id='.$user_id.'');
        $stat->execute();
        $resulte = $stat->fetchAll();
        $typing='';
        foreach($resulte as $row){
           if($row['is_type'] == 1){
            $typing ='<small><em><span class="text-muted">Typing...</span></em></small>';
           
           }
            return $typing;
        }  
        
    }
    
    function unseen_message($from_user_id,$to_user_id,$db){
     $stat =$db->prepare('select * from chat_message where from_user_id='.$from_user_id.' and to_user_id='.$to_user_id.' and status = 1 ');
    $stat->execute();
    $output ='';    
    $count = $stat->rowCount();
     if($count > 0){
         $output = '<span class="text-light bg-danger ml-1 pl-1 pr-1" style="font-size:15px;">'.$count.'</span>';
     
     }
    return $output;
    
    }
    function update_notification($db){
       $stat =$db->prepare('select * from posts');
    $stat->execute();
    $output ='';
    $resulte = $stat->fetchAll();    
    $count = $stat->rowCount();  
        if($count > 0){
            foreach($resulte as $row){
        $output .='
         <div class="userActivites tm-user-info p-2 mb-2">
                <div class="userActivitesHead">  
                <span><img src="http://localhost/messages/'.getImg($row['user_id'],$db).'" width="50px;" height="50px;" style="border-radius:50%;"/></span>  
                <span>'.getName($row['user_id'],$db).'</span>
            <span class="text-primary font-weight-bold">Updated New status</span>
            </div>
                    <div class="userActivitesBody">
                    <p class="text-center">'.substr($row['post'],0,20).'...</p>
                    </div>
                </div>
        
        
        ';
            }}else{
        $output .="<h5 class='text-center text-dark'>No notification to show <i class='fa fa-globe text-primary'></i></h5>";
        }
        return $output;
    }
    function r_c_notification($db){
       $stat =$db->prepare('select u_id,posts.user_id,comment_body from posts  inner join comments on comments.p_id=posts.post_id ');
    $stat->execute();
    $output ='';
    $resulte = $stat->fetchAll();    
    $count = $stat->rowCount();  
        if($count > 0){
            foreach($resulte as $row){
        $output .='
         <div class="userActivites tm-user-info p-2 mb-2">
                <div class="userActivitesHead">  
                <span><img src="http://localhost/messages/'.getImg($row['u_id'],$db).'" width="50px;" height="50px;" style="border-radius:50%;"/></span>  
                <span>'.getName($row['u_id'],$db).'</span>
            <span class="text-primary font-weight-bold"> Comment on </span>'.getName($row['user_id'],$db).'<span></span>
            </div>
                    <div class="userActivitesBody">
                    <p class="text-center">'.$row['comment_body'].'</p>
                    </div>
                </div>
        
        
        ';
            }}else{
        $output .="";
        }
        return $output;
    }
    function getName($user_id,$db){
    $stat =$db->prepare('select username from message_user where id = '.$user_id.'');
        $stat->execute();
        $resulte = $stat->fetchAll();
        foreach($resulte as $row){
           return $row['username'];
        }
}
  function getBio($user_id,$db){
    $stat =$db->prepare('select bio from message_user where id = '.$user_id.'');
        $stat->execute();
        $resulte = $stat->fetchAll();
        foreach($resulte as $row){
           return $row['bio'];
        }
}  
 function getImg($user_id,$db){
    $stat =$db->prepare('select user_prof from message_user where id = '.$user_id.'');
        $stat->execute();
        $resulte = $stat->fetchAll();
        foreach($resulte as $row){
           return $row['user_prof'];
        }
}   
    
}
catch(PDOException $e){
    echo $e->getMessage();
    
    
}
?>
