<?php
session_start();
if(isset($_SESSION['username'])){
include 'C:\xampp\htdocs\messages\db.php';
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/> 
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
 <link rel="stylesheet" href="http://localhost/messages/css/emojionearea.min.css">
<script type="text/javascript" src="http://localhost/messages/js/emojionearea.min.js"></script>   
<style>
* {
  box-sizing:border-box;
}

/* Style the body */
body {
  font-family: serif;
  margin: 0;
  padding: 0;
    overflow-x: hidden;
  
    }
 #profile,.chat_history,.chat-app .container,.chat-app .control,nav,.tm-user-info{
 background-color:white;
    } 
.fa span,.chats-name{
   color:black;
    }
.light .fa span,nav,.tm-user-info{
    color:#343a40;
    }
.light {
  background-color:aliceblue;  

}
.light .chat_history,.light .chat-app .container,.light .chat-app .control,.light nav{
 background-color:white;
    } 
    
.dark {
    background-color:black;
    }
 .dark .chat_history,.dark .chat-app .container,.dark .chat-app .control,.dark nav,.dark .tm-user-info{
 background-color:#17202A ;
    }
.dark .users-text,.dark .users-name,.dark .users-react,.dark .profile-name ,.dark .fa span, .dark .header-chat,.dark .chats-name,.dark nav,.dark .tm-user-info {
    color:white;
    }

.user_dialog{
    background-color: #343a40;
    color:white;
    border-radius:10px;
    height:50px;
    padding:5px;
    
    
    }
.control,.selected{
    display:none;
    }
    
#chat_message {
    border:1px solid #343a40;
  
    
    
    }
#user_info button{
    margin-left: 7px;
    
    }
    #user_info{
    position: relative;
    right:5px;    
        
    }
#unread{
    display:none;
    }
.btn-unread{
    color:#007bff;    
    }
    .clo:hover{
        color:#007bff;
        
    }
 #find_friends,.friends-con,.chat-app{
    display:none;
    }
.chat_history{

    
 background-color: white;
    }
.tm-chat-info{
    display: flex;
    justify-content: center;
    align-items: center;
    }
    .header-chat span{
        display:block;
    }
.options li{
    font-size:17px;
    padding: 7px;
    font-weight: bold;
    background-color: #E4E8EA ;
    margin-bottom: 8px;
    }
    ul{
      list-style: none;  
        
    }
.options li:hover{
    background-color: #AFB5B6 ;
    box-shadow:0px 1px 3px 0px;
    }
.options{
    display:none;
    
    }
.selected{
   cursor: pointer;
   color:white  ; 
    }
.selected span{
    font-size:35px;
    font-weight:bold;
    }    
.selected .active{
    color:#28a745;    
        
    }
  .selected-profile{
   cursor: pointer;
   color:#CCD1D1; 
    }
.selected-profile span{
    font-size:25px;
    font-weight:bold;
    }    
.selected-profile .active{
       
        
    } 
.choice {
    color:#007bff; 
    }
  .gallery{
    display: none;
    } 

    .fa span{
     display:inline;   
    }
.start_chat:hover{
    opacity: 0.5;
    }
 .start_chat{
    display: flex;
    justify-content: flex-start;
    } 
  
.header-chat span,.post-react-user div,.commenter div {
    display:inline;
    }
.post-head-user{
    display:flex;
    justify-content: flex-start;
    cursor: pointer;
    }
.post-date{
    color:rgba(0,0,0,0.6);
    }
 .post-date:hover{
    color:rgba(0,0,0,0.6);
    }   
 .comment-control div{
     display:inline;
    }
 .messages-room,.profile-room,.setting{
     display:none;
    }
  .show-reacts div{
      display:inline;
    }

.about-user{
    display:flex;
    justify-content: center;
   margin: auto;
    background-size: cover;
    }

.media li{
    float:left;
    font-size: 25px;
    margin: auto;
    cursor:pointer;
    color:black;
    }
    .choice{
    color:#007bff;    
        
    }
.pro-user{
   display: none; 
    }
 


.title {
  color: grey;
  font-size: 18px;
}
#tm_user_post::focus{
    border:2px solid white;
    }

 .timeline-post{
     padding:5px;
    }
 .timeline-post .click-to-write{
     padding:4px;
     height: 50px;
     border-radius:20px;
     background-color:#E5E5E5 ;
    }
 .timeline-post .click-to-write:hover{
     opacity: 0.5;
    }
.info-post{
     display:flex;
    justify-content:flex-start;
    align-items: center; 
    }
  .card .user-img{
     display:flex;
    justify-content:center;
    align-items: center; 
    }
.bg-model{
    height:100%;
    width:100%;
    background-color:rgba(0,0,0,0.8);
    position: fixed;
    top:0px;
    display:none;
    justify-content: center;
    align-items: center;
    }
   .get-profile{
    height:100%;
    width:100%;
    background-color:rgba(0,0,0,0.8);
    position: fixed;
    top:0px;
    display:flex;
    justify-content: center;
    align-items: center;
    }
    .get-profile .profile{
       
    }
  .bg-edit-post{
    position:fixed;
    top:0;
    height:100%;
    width:100%;
      background: rgba(0,0,0,0.8);
    display:none;
    justify-content: center;
    align-items: center;
    }  
.bg-model .comment{
    height:750px;
    width:700px;
    }
 .bg-edit-post .edit{
      height:auto;
    width:500px;
    }
.bg-model .reply-info{
    display:flex;
    justify-content: flex-start;
    padding:10px;
    }
.close-comments:hover{
    opacity:0.8;
    }
.post_here button{
    display: inline;
    width:48%;
    }
   
 
  form{
      display:none;
    }
.active-btn{
    background: #343a40;
    }
.userActivites .userActivitesHead span{
    display:inline;
    }
   .userActivites {box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);}
 .bg-model{
position: fixed;
top: 0;
width: 100%;
z-index:999;
}
.toggle-post,.toggle-post-img,.toggle-post-video,.edit-info{
    display:none;
    }
   input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color: #343a40;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
} 
input:focus,textarea:focus{
    outline:none;    
        
    }
.user-img-edit img{
    display:block;
    }
.header-self:hover{
    text-decoration: none;
    }
    .timeline-emoji, .comment-emoji{
      cursor:pointer;  
    }
  .remove-edit-post{
      color:#aaa;
    }
 .remove-edit-post:hover,
.remove-edit-post:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
.close-comments{
      color:#aaa;
    }
 .close-comments:hover,
.close-comments:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
 .delete-message{
      color:red;
     font-weight: bold;
     font-size: 20px;
     cursor:pointer;
    }
 .delete-message:hover,
.delete-message:focus {
  text-decoration: none;
  
}   
 .send-comment:hover,
.send-comment:focus {
 opacity: 0.7;
  text-decoration: none;
  cursor: pointer;
} 
#myImg {
  cursor: pointer;
}
#myImg:hover{
        opacity:0.9;    
    }
#myModelImg {
  display: none; 
  position: fixed;
  justify-content: center;
  align-items: center;
  width: 100%; 
  height: 100%; 
  overflow: auto; 
  background-color: rgb(0,0,0); 
  background-color: rgba(0,0,0,0.9);
} 
 .modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 720px;
  height:auto;
  
} 
.panel div{
     display:inline;   
    }
.modal-content{
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}
.reply-zoon{
    display: none;
    }
::-webkit-scrollbar{
      width:7px;
   margin-top: 3px;
    }
  ::-webkit-scrollbar-thumb{
  background-color: rgba(0,0,0,0.3);
      border-radius: 10px;
      margin-top: 4px;
    }
  ::-webkit-scrollbar-thumb:hover{
  background-color: rgba(0,0,0,0.6);
      border-radius: 10px;
      margin-top: 4px;
    } 
    .prepare-img{
      display: none;
        justify-content: center;
        align-items: center;
    }
    
    .logout-btn:hover{
       opacity: 0.5; 
    }
  body {margin:0}

.icon-bar {
  width: 90px;
  background-color: #555;
}

.icon-bar a {
  display: block;
  text-align: center;
  padding: 16px;
  transition: all 0.3s ease;
  color: white;
  font-size: 36px;
}

.icon-bar a:hover {
  background-color: #000;
}
.users-react{
    display: flex;
    justify-content: center;
    align-items: center;
    }
.users-react div{
    margin:auto;
    font-size:30px;
    }
    
    
    }
.active {
  background-color: #4CAF50;
}  
    .users-name:hover{
       color:#007bff; 
        
    }
 
.nav ul{
   list-style: none;
    height:100%;
    margin:0px;
    margin-right: 5px;
    cursor: pointer;
    }
.nav ul li{
    float:left;
    margin-left:30px;
    color:rgba(0,0,0,0.7)
    }
.media-post i{
    font-size:25px;
    }
.comment-control{
width:70%;
padding:40px;
border-radius:10px;
    }
.comment-control input{
    background-color:white;
    padding: 15px;
    }
.comment-control input:focus{
    outline:;
    }
.comment-control i{
   margin-left:10px;
   margin-top:10px;
    }
    video:focus{
      outline: none;  
    }
    #attach_post{
        border:1px solid white;
        border-radius: 15px;
        padding:10px;
    }
    #tm_user_post{
       border:1px solid white;
        border-radius: 15px;
        padding:10px;  
    }
    #tm_user_video{
       border:1px solid white;
        border-radius: 15px;
        padding:10px;  
    }
</style>
</head>
<body class="light">
    <nav class="navbar border-bottom" style="padding:0px; width:100%;">
      <div class="container">
  <a class="navbar-brand ml-3">
      <h4 class="font-weight-bold text-center"><span class="text-primary">W</span>ork<span class="text-primary">Z</span>one<i class="text-primary fa fa-fire"></i></h4>
  </a>  
  <div class="nav">
   <ul class="media">
       <li  data-class="timeline">
        <i style="font-size:30px;" class="fa fa-home"></i>
    </li>
       <li  data-class="messages-room">
        <i style="font-size:30px;" class="fa fa-comments"></i>
    </li>
       <li>
        <i style="font-size:30px;" class="fa fa-star"></i>
    </li>
       <li  data-class="profile-room" class="text-center">
        <img style="border-radius:50%;" height="30px" width="30px" src="http://localhost/messages/<?php echo getImg($_SESSION['id'],$db);?>"/>
    </li> 
  </ul>       
          
  </div>
     

      </div>
</nav>
     
    <section class="timeline">
        <div class="row">
        <div class="col-md-3"> 

           
        </div>
         <div class="col-md-5" style="height:auto; overflow:none; overflow-y:auto;">
                   <div class="border media-post tm-user-info p-2 ml-1 mb-4 mt-4" style="border-radius:10px 10px 10px 10px; width:100%;">
             <div class="post-head-user p-2">
                <div><img src="http://localhost/messages/<?php echo getImg($_SESSION['id'],$db)?>" style="border-radius:50%;" width="65px" height="65px"></div>
                <div><span class="font-weight-bold ml-1" style="text-transform:capitalize;"><?php echo getName($_SESSION['id'],$db)?></span><br><span class="ml-2 text-info">Now</span></div>
              </div>
    <center>
    <button class=" btn btn-info toggle-post-btn" style="width:30%; "><b><i class="fa fa-pencil"></i></b></button>
    <button class="btn btn-info  toggle-post-img-btn" style="width:30%;"><b><i class="fa fa-file-image-o"></i></b></button>
        <button class="btn btn-info  toggle-post-video-btn" style="width:30%;"><b><i class="fa fa-video-camera"></i></b></button>
       
        </center>    
           <div class="toggle-post mt-2">            
   <textarea cols="4" rows="4" placeholder="Write Post..." style="width:100%; outline:none;" id="attach_post"></textarea>
               <button class="btn btn-primary mt-3" style="width:100%;" id="upload-post"><b>Post</b></button>
             
                </div>       
         
          <div class="toggle-post-img mt-2">            
   <textarea cols="4" rows="3" placeholder="Write caption..." style="width:100%; border-radius:15px;" id="tm_user_post"></textarea>
              <center><div class="prepare-timeline-img"></div></center>
   <input type="file" name="file" id="file" style="display:none;"/>   
        <button class="btn btn-outline-success font-weight-bold mt-2 load-img" style="width:100%;" id="customFile">Attach Image <i class="fa fa-file-image-o"></i></button>
        <button class="btn btn-primary mt-3" style="width:100%;" id="upload-img"><b>Post</b></button>
             
                </div>
             <div class="toggle-post-video mt-2">            
   <textarea cols="4" rows="3" placeholder="Write caption..." style="width:100%; border-radius:15px;" id="tm_user_video"></textarea>
   <input type="file" name="video" id="video" style="display:none;"/>   
        <button class="btn btn-outline-danger font-weight-bold load-video" style="width:100%;" id="customVideo">Video <i class="fa fa-video-camera"></i></button>
        <button class="btn btn-primary mt-3" style="width:100%;" id="upload-video"><b>Post</b></button>
             
                </div>
                       
            </div>
             <div class="all-posts" ></div>
         </div>
      
        </div>
        </div>
    </section>
    <section class="profile-room">
      
 <div class="tm-user mb-2" style="height:auto; overflow:none; overflow-y:auto;">
   
             
            <div class="container">
        <div class="row">
                     <div class="col-md-5">
               <center>
               <img class="mt-2" height="200px" width="200px"  src="http://localhost/messages/<?php echo getImg($_SESSION['id'],$db)?>" class="border" style="border-radius:50%;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" id="myImg" data-bigimg="<?php echo getImg($_SESSION['id'],$db)?>"/>    
                   
                 
                 </center>
             <div class="settings tm-user-info p-2 mt-3 mode" style="height:auto; border-radius:10px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
              <h1 class="tm-user-info text-center" style=" font-weight:bold; text-transform:capitalize;">
             <?php echo getName($_SESSION['id'],$db)?>
             </h1>
             <h5 class="text-primary text-center">
             <?php echo $_SESSION['bio']?>
             </h5>
            <a  href="editinfo.php?id=<?php echo $_SESSION['id']?>" class="btn btn-info mb-2 font-weight-bold">Edit Profile</a>
            <button class="btn btn-secondary mb-2 font-weight-bold" data-color="light">Light Mode</button>
             <button class="btn btn-dark mb-2 font-weight-bold" data-color="dark">Dark Mode</button>   
            <a class="btn btn-danger mb-2 font-weight-bold" href="offstatus.php">LogOut</a>
            </div>
            </div>
            <div class="col-md-7">
  <div id="user_posts" class="mt-3"></div>
                
            </div>
  
          
            </div>
        </div>
    </div>
    </section>
    <section class="messages-room">
    <div class="row">
    <div class="col-md-2 ml-3" id="sidetwo" style="position:relative; top:10px; left:0;"></div>
      
      <div class="col-md-5 chat-app">
           <div class="container pt-2 mt-1" style=" width:100%;  border-radius:5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);">
            <div id="chat_body" style="z-index:1;">
            </div>
             <div class="mb-2 control pb-1 tm-user-info pl-2 pr-1" style="border-radius:10px;">
                  <div class="mt-1 mb-1 reply-zoon bg-light p-1 m-1" style="cursor:pointer; width:100%; word-wrap:break-word; border-radius:10px; border:1px solid green; color:black;">
                     <div class="reply-body"><strong class="text-success message-name"></strong><p class="text-center message-body"></p></div>
                 </div>
            <input type="hidden" id="message-body"/>
            <input type="hidden"  id="to_user_id"/>
            <input type="hidden"  id="chat_img"/>    
              <div class="prepare-img">
                
                </div>    
    <div class="input-group tm-user-info">
  <input type="text" style="border-radius:5px;" class="form-control" placeholder="write a message..." id="chat_message" autocomplete="off" value="">
     <div class="input-group-append ml-2"> 
         <button id="uploadimg" style="border-radius:5px; font-size:30px;" class="btn btn-light text-primary mt-1"><b><i class="fa fa-file-image-o"></i></b></button>
         <button style="border-radius:5px; font-size:30px;" class="btn btn-light text-primary mt-1 ml-1" id="btn"><b><i class="fa fa-paper-plane"></i></i></b></button>
        </div>  
</div>   
    <input type="file" name="chatimg" id="chatimg" style="display:none;"/>
                
               </div>
        </div>
        </div>
   <div class="col-md-4">
       <div class="chat-info">
       </div>   
  </div>
        </div>
    </section>
<div class="get-profile" style="height:100%; width:100%; display:none;  z-index:1000;">
<div class="profile-page tm-user-info border" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); height:740px; width:600px; overflow:none; overflow-y:scroll; z-index:999;">
        <div align="right" style="position:fixed; right:3px; top:3px; color:red; cursor:pointer; font-size:35px; font-weight:bold; " class="remove-profile mr-4">&times;</div>

    <center>
    <img height="200px" width="200px" src=""  class="border mt-3 profile-image" style="border-radius:50%;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);" id="myImg" data-bigimg="<?php echo getImg($_SESSION['id'],$db)?>"/>               
      <h1 class="tm-user-info font-weight-bold profile-name" style="text-transform:capitalize"></h1>
        <h6 class="text-primary profile-bio" style="text-transform:capitalize"></h6>
    </center>
    <div class="profile-posts mr-1" style=""></div>
</div>
</div>
<div class="bg-model" style="">
<input type="hidden" class="comment_id" style="color:red;"/>
 <div class="close-comments" style="position:absolute; top:10px; right:10px; font-size:20px;">
        <i class="fa fa-chevron-right"></i>   
        </div>
     <div class="comment-control  p-2" style="display:flex; justifiy-content:center;">
            <input id="comment_text" class="form-control" placeholder="write a comment..."/>
            <i id="post_btn" class="text-primary send-comment fa fa-paper-plane" style="font-size:30px; cursor:pointer;"></i>  
            </div>
        </div>
<div class="bg-edit-post">
<input type="hidden" id="edit-post-id"/>
  <div class="edit p-3 mt-2 mb-2 tm-user-info" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius:10px;">
            <div class="post-head-user p-2 border-bottom">
                <div><img src="http://localhost/messages/<?php echo $_SESSION['user_prof']?>" width="60px" height="60px" style="border-radius:50%;"></div>
                <div><span class="font-weight-bold users-name" style="font-size:25px;"><?php echo $_SESSION['username']?></span></div>
              </div>
       <div align="right" style="cursor:pointer; font-size:28px; font-weight:bold; " class="remove-edit-post">&times;</div>
      <h4 class="text-center text-success">Edit Post</h4>
             <textarea id="update-post-text" style="width:100%;" rows="3"></textarea>
             <button class="btn btn-success" id="update-post"><b>Update Post</b></button>

             </div>

        
</div>
 <div id="myModelImg" class="modal">
  <img class="modal-content" id="bigImg">

</div>
<script>
 $(document).on('change','#file',function(){
 var property = document.getElementById('file').files[0];
 var img_name = property.name;
         var form_data = new FormData();
         form_data.append('file',property);
         $.ajax({
           url:"upload.php",
           method:"POST",
           data:form_data,
           contentType:false,
           cache:false,
           processData:false,
           beforeSend:function(){
           $('.load-img').html('wait image Loading...');
           },
           success:function(data){
            $('.prepare-timeline-img').html(data);
            $('.load-img').html('Image Loaded...click post now');
         }
         
         });
 });
 $(document).on('change','#video',function(){
 var property = document.getElementById('video').files[0];
 var video_name = property.name;
         var form_data = new FormData();
         form_data.append('video',property);
         $.ajax({
           url:"upload_video.php",
           method:"POST",
           data:form_data,
           contentType:false,
           cache:false,
           processData:false,
           beforeSend:function(data){
           $('.load-video').html('wait video loading...');
           },
           success:function(data){ 
           $('.load-video').html('video loaded...click post now');  
         },
             
         
         });
 });
$(document).on('change','#chatimg',function(){
 var property = document.getElementById('chatimg').files[0];
 var img_name = property.name;
         var form_data = new FormData();
         form_data.append('chatimg',property);
         $.ajax({
           url:"upload_chatimg.php",
           method:"POST",
           data:form_data,
           contentType:false,
           cache:false,
           processData:false,
           success:function(data){
             $('.prepare-img').html(data); 
         }
         });
});
    
$(document).on('change','#chatimg',function(){
$('.prepare-img').css('display','flex');
var chat_img = document.getElementById('chatimg').files[0];
var imgName = chat_img.name;    
$('#chat_img').val(imgName);    
});    
 $(document).on('click','#btn',function(){
$('.prepare-img').css('display','none');
});
$(document).on('click','.prepare-img',function(){
$('.prepare-img').css('display','none');
  $('#chat_img').val('');   
});    
 
    
 
     
  fetch_user();
  fetch_user_message();
  fetch_friends();
 fetch_user_posts();
    get_all_posts();
    notification();
 fetch_timeline_chat()
    setInterval(function(){
        update_chat_history();
        fetch_timeline_chat();
    },1000);
     setInterval(function(){
       
       
         update_comments_history();
    },2000);
  setInterval(function(){

 notification();
      
    },3000);  
    setInterval(function(){
         fetch_user();
         fetch_user_message();
         fetch_friends();
         
    },5000);
    function fetch_user(){
        $.ajax({
            url:"fetch_user.php",
            method:"POST",
            success:function(data){
                $('#side').html(data);
                $('#sidetwo').html(data);
                
            }
        });    
    }
    function notification(){
        $.ajax({
            url:"notification.php",
            method:"POST",
            success:function(data){
                $('#notification').html(data);  
            }
        });    
    }
    function fetch_user_posts(){
        $.ajax({
            url:"fetch_user_posts.php",
            method:"POST",
            success:function(data){
                $('#user_posts').html(data);
                
            }
        });    
    }
    function get_all_posts(){
        $.ajax({
            url:"get_all_posts.php",
            method:"POST",
            success:function(data){
                $('.all-posts').html(data);
                
            }
        });    
    }
    function fetch_friends(){
        $.ajax({
            url:"fetch_friends.php",
            method:"POST",
            success:function(data){
                $('#friends').html(data);
                
            }
        });    
    }
     
    function fetch_user_message(){
        $.ajax({
            url:"fetch_user_message.php",
            method:"POST",
            success:function(data){
            $('#received_message').html(data);
                
            }
        });    
    }
    function chat_box(to_user_id,to_user_name,to_user_img){
        var chat;
        chat ='<div class="pl-2 pb-1 mb-1 header-chat border-bottom " style=""><span><img src="http://localhost/messages/'+to_user_img+'" height="60px;" width="60px;" style="border-radius:50%;" class="border ml-2"/></span><span class="font-weight-bold ml-1" style="font-size:25px;">'+to_user_name+' </span></div>';
        chat +=' <div style="height:445px;  overflow-y:auto; " class="chat_history" data-touserid="'+to_user_id+'" id="chat_history" >';
        chat +='</div>';
    $('#chat_body').html(chat);
    
    }
   function chat_info(to_user_name,bio,to_user_id,status,to_user_img){
    var info ='<div class="tm-chat-info tm-user-info mb-3 mt-2 p-2" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius:10px; width:100%;">';
    info +='<div><img src="http://localhost/messages/'+to_user_img+'" width="150px" height="150px;" style="border-radius:50%;" class="border" id="myImg" data-bigimg="'+to_user_img+'"/></div>';
    info +='<div class="ml-2"><h3>'+to_user_name+'</h3><h5 style="color:rgba(0,0,0,0.55)">'+bio+'</h5><h6 class="text-primary">'+status+'</h6></div></div>';
    info +='<div class="tm-user-info p-1" style=" overflow:none; overflow-y:auto; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"><h4 class="text-center text-danger"></h4><div style="height:430px;" class="profile_history"  data-touserid="'+to_user_id+'" ></div><div>';
      $('.chat-info').html(info); 
       
       
   }
    function profile(user_id){
         $.ajax({
            url:"get_profile.php",
            method:"POST",
            data:{user_id:user_id},
            success:function(data){
                $('.profile-posts').html(data);  
            }

        });  
        
    }
    function get_post_comments(to_post_id){
        $.ajax({
            url:"get_post_comments.php",
            method:"POST",
            data:{to_post_id:to_post_id},
            success:function(data){
                $('.comments-zoon').html(data);  
            }

        })  
    }
    
     function get_user_posts(to_user_id){
        $.ajax({
            url:"get_user_posts.php",
            method:"POST",
            data:{to_user_id:to_user_id},
            success:function(data){
                $('.profile_history').html(data);  
            }

        })  
    }
    
      $(document).on('click','.start_chat',function(){
             var to_user_id = $(this).data('touserid');
             var to_user_name = $(this).data('tousername');
             var to_user_img = $(this).data('touserimg');
             var bio =$(this).data('bio');
             var status =$(this).data('status');
            chat_box(to_user_id,to_user_name,to_user_img);
            chat_info(to_user_name,bio,to_user_id,status,to_user_img);
            get_user_posts(to_user_id);
           $('.chat_history').animate({scrollTop:1000000},800);
          $('.control').fadeIn('fast');
          $('.chat-app,.pro-user,.profile-toggle').show();
          $('.control #to_user_id').val(to_user_id);
            update_chat_history();
          
            });
    
     $('#timeline_chat').animate({scrollTop:1000000},800);
      $('#btn').click(function(){
                var to_user_id = $('#to_user_id').val();
                var chat_message = $('#chat_message').val();
                var reply = $('#message-body').val();
                var img = $('#chat_img').val();
                var prepare_img = $('.prepare_img').html();
                var img_exist;
                var reply_status;
          if(reply !== ''){
              reply_status = 1;
          }else{
              reply_status = 0;
          }
           if(img !== ''){
              img_exist = 1;
          }else{
              img_exist = 0;
          }
          if(chat_message !== '' || img !==''){
                $.ajax({
                    url:"testchat.php",
                    method:"post",
                    data:{
                        to_user_id:to_user_id,
                        chat_message:chat_message,
                        reply:reply,
                        reply_status:reply_status,
                        img:img,
                        img_exist:img_exist
                
                    },
                    success:function(data){
                     var chat_message =$('#chat_message').val('');
                     var reply = $('#message-body').val('');
                     var img = $('#chat_img').val('');   
                    }
                });
                 $('.chat_history').animate({scrollTop:1000000},800);
                 
          }

      });

    $(document).on('click','#btn',function(){
       $('.reply-zoon').hide();
       
    
    });
    $('#timeline_chat_btn').click(function(){
         $('#timeline_chat').animate({scrollTop:1000000},800);
                var chat_message =$('#timeline_chat_text').val();
                 var chat = document.getElementById("timeline_chat");
          if($('#timeline_chat_text').val()!= ''){
                $.ajax({
                    url:"timelinechat.php",
                    method:"post",
                    data:{
                        chat_message:chat_message,
                
                    },
                    success:function(data){
                      
                    $('#timeline_chat_text').val(''); 
                    }
                });
          }
        
      });

    function fetch_user_chat_history(to_user_id){
        $.ajax({
            url:"fetch_user_chat_history.php",
            method:"POST",
            data:{to_user_id:to_user_id},
            success:function(data){
                $('.chat_history').html(data);
                
            }

        })  
    }
    
   function fetch_timeline_chat(){
        $.ajax({
            url:"fetch_timeline_chat.php",
            method:"POST",
            success:function(data){
                $('#timeline_chat').html(data);
                
            }

        })  
    }
    
    
    function update_chat_history(){
        $('.chat_history').each(function(){
        var to_user_id = $(this).data('touserid');
        fetch_user_chat_history(to_user_id);
        });
    
    }
    function update_profile_history(){
        $('.profile_history').each(function(){
        var to_user_id = $(this).data('touserid');
        get_user_posts(to_user_id);
        });
    
    }
    function update_comments_history(){
        $('.comment-on-post').each(function(){
        var to_post_id = $(this).data('postid');
        get_post_comments(to_post_id);
        });
    
    }
    
    $(document).on('focus','.chat_message',function(){
        var is_type = 1;
        $.ajax({
            url:"update_type.php",
            method:"POST",
            data:{is_type:is_type},
            success:function(){
            
            
            }
        
        })
    
    });
    $(document).on('blur','.chat_message',function(){
        var is_type = 0;
        $.ajax({
            url:"update_type.php",
            method:"POST",
            data:{is_type:is_type},
            success:function(){
            
            
            }
        
        })
    
    });
    
  
  $('.friends').click(function(){
      $('#find_friends , .friends-con').toggleClass('apper');
      if($('#find_friends, .friends-con').hasClass('apper')){
          $('#find_friends, .friends-con').css('display','block');
      }else{
      $('#find_friends, .friends-con').css('display','none');
      }
  });
    $('.edit-info-btn').click(function(){
      $('.edit-info').toggleClass('apper');
      if($('.edit-info').hasClass('apper')){
          $('.edit-info').css('display','block');
      }else{
      $('.edit-info').css('display','none');
      }
  });
     $('.tm-user-btn').click(function(){
      $('.tm-user').toggleClass('apper');
      if($('.tm-user').hasClass('apper')){
          $('.tm-user').css('display','block');
      }else{
      $('.tm-user').css('display','none');
      }
  });
    $('.toggle-post-btn').click(function(){
     
          $('.toggle-post').css('display','block');
          $('.toggle-post-img,.toggle-post-video').css('display','none');
  
  });
    $('.toggle-post-img-btn').click(function(){
      
          $('.toggle-post-img').css('display','block');
          $('.toggle-post,.toggle-post-video').css('display','none');
     
  });
    $('.toggle-post-video-btn').click(function(){
      
          $('.toggle-post-video').css('display','block');
          $('.toggle-post,.toggle-post-img').css('display','none');
     
  }); 
     $('.open-emoji').click(function(){
      $('.emojiCaption').toggleClass('apper');
      if($('.emojiCaption').hasClass('apper')){
          $('.emojiCaption').css('display','block');
      }else{
      $('.emojiCaption').css('display','none');
      }
  });
    
    $(document).on('click','#btn-emoji',function(){
      $('.emoji').toggleClass('apper');
      if($('.emoji').hasClass('apper')){
          $('.emoji').css('display','block');
      }else{
      $('.emoji').css('display','none');
      }
  });
   $(document).on('click','#btn-emoji',function(){
      $('.timeline-emoji').toggleClass('apper');
      if($('.timeline-emoji').hasClass('apper')){
          $('.timeline-emoji').css('display','block');
      }else{
      $('.timeline-emoji').css('display','none');
      }
  });  
$('.emoji span').click(function(){
    var emo = $(this).data('emoji');
    var msg = $('#chat_message').val();
    var emoji = '&#' + emo;
    $('#chat_message').val(msg = msg + emoji);
}); 
  $('.timeline-emoji span').click(function(){
    var emo = $(this).data('emoji');
    var msg = $('#timeline_chat_text').val();
    var emoji = '&#' + emo;
    $('#timeline_chat_text').val(msg = msg + emoji);
});  
  $('.comment-emoji span').click(function(){
    var emo = $(this).data('emoji');
    var msg = $('#comment_text').val();
    var emoji = '&#' + emo;
    $('#comment_text').val(msg = msg + emoji);
});    
 $('.emojiCaption span').click(function(){
    var emo = $(this).data('emoji');
    var msg = $('#tm_user_post').val();
    var emoji = '&#' + emo;
    $('#tm_user_post').val(msg = msg + emoji);
});
  $('.emojiPost span').click(function(){
    var emo = $(this).data('emoji');
    var msg = $('#attach_post').val();
    var emoji = '&#' + emo;
    $('#attach_post').val(msg = msg + emoji);
});
    $('.open-profile').click(function(){
      $('.header-chat,#profile').toggleClass('apper');
      if($('.header-chat,#profile').hasClass('apper')){
          $('.header-chat,#profile').css('display','block');
      }else{
      $('.header-chat,#profile').css('display','none');
      }
  });
  $('.view_profile').click(function(){
      $('.profile_history').toggleClass('apperance');
      if($('.profile_history').hasClass('apperance')){
          $('.profile_history').css('display','block');
      }else{
      $('.profile_history').css('display','none');
      }
  }); 
 $('.media li').click(function(){
 $(this).addClass('text-primary').siblings().removeClass('text-primary');     
 $('section').hide();
 $('.'+$(this).data('class')).fadeIn(100);
 
 });
$('.post_here button').click(function(){    
 $('divi').hide();
 $('.'+$(this).data('class')).fadeIn(100);
 
 });
 $(document).on('click','.heart-btn',function(){
   var post_id = $(this).data('id');
   var $click = $(this);
   if($click.hasClass('fa-heart-o')){
        var action ='heart';
   }else if($click.hasClass('fa-heart')){
        var action ='unheart';
   }
     $.ajax({
        url:"rate.php",
        method:"POST",
        data:{post_id:post_id,action:action}, 
        success:function(data){
            if(action == 'heart'){
               $click.removeClass('fa-heart-o');
               $click.addClass('fa-heart'); 
            }else if(action == 'unheart'){
                $click.removeClass('fa-heart');
                $click.addClass('fa-heart-o'); 
            }
            fetch_user_posts();
            get_all_posts();
             update_profile_history();
        }
     });
 });
 $(document).on('click','.likecomment-btn',function(){
   var comment_id = $(this).data('id');
   var post_id = $(this).data('post');     
   var $click = $(this);
   if($click.hasClass('fa-thumbs-o-up')){
        var action ='like';
   }else if($click.hasClass('fa-thumbs-up')){
        var action ='unlike';
   }
     $.ajax({
        url:"ratecomment.php",
        method:"POST",
        data:{comment_id:comment_id,post_id:post_id,action:action}, 
        success:function(data){
            if(action == 'like'){
               $click.removeClass('fa-thumbs-o-up');
               $click.addClass('fa-thumbs-up'); 
            }else if(action == 'unlike'){
                $click.removeClass('fa-thumbs-up');
                $click.addClass('fa-thumbs-o-up'); 
            }
    get_all_posts();
      update_profile_history();
             fetch_user_posts();
        }
     });
 });    
$(document).on('click','.star-btn',function(){
   var post_id = $(this).data('id');
   var $click = $(this);
   if($click.hasClass('fa-star-o')){
        var action ='star';
   }else if($click.hasClass('fa-star')){
        var action ='unstar';
   }
     $.ajax({
        url:"rate.php",
        method:"POST",
        data:{post_id:post_id,action:action}, 
        success:function(data){
            if(action == 'star'){
               $click.removeClass('fa-star-o');
               $click.addClass('fa-star'); 
            }else if(action == 'unstar'){
                $click.removeClass('fa-star');
                $click.addClass('fa-star-o'); 
            }
 fetch_user_posts();
          update_profile_history();
            get_all_posts();
        }
     });
 });
 $(document).on('click','.dislikecomment-btn',function(){
   var comment_id = $(this).data('id');
   var post_id = $(this).data('post');  
   var $click = $(this);
   if($click.hasClass('fa-thumbs-o-down')){
        var action ='dislike';
   }else if($click.hasClass('fa-thumbs-down')){
        var action ='undislike';
   }
     $.ajax({
        url:"ratecomment.php",
        method:"POST",
        data:{comment_id:comment_id,post_id:post_id,action:action}, 
        success:function(data){
            if(action == 'dislike'){
               $click.removeClass('fa-thumbs-o-down');
               $click.addClass('fa-thumbs-down'); 
            }else if(action == 'undislike'){
                $click.removeClass('fa-thumbs-down');
                $click.addClass('fa-thumbs-o-down'); 
            }
            get_all_posts();
             update_profile_history();
        }
     });
 });   
 $(document).on('click','.users-name',function(){
  $('.profile-page').animate({scrollTop:-1000000},800);    
$('.get-profile').css('display','flex');
var name =$(this).data('name');     
var img =$(this).data('img');
var bio =$(this).data('bio');
var id = $(this).data('id');
     $('.profile-name').html(name);
     $('.profile-bio').html(bio);
     profile(id);
     $('.profile-image').attr('src','http://localhost/messages/'+img+'');
     
 });
    $('.remove-profile').click(function(){
    $('.get-profile').hide();
    
    });
$(document).on('click','.comment-btn',function(){
       var post_id = $(this).data('id');
       var name = $(this).data('username');
       var img =$(this).data('img');
    var post =$(this).data('post');
    var post_img =$(this).data('postimg');
    var existimg =$(this).data('existimg');
     get_post_comments(post_id);
    var date =$(this).data('date');
        $('.comment_id').val(post_id);
         $('.author').html(name);
    $('.author-post').html(post);
    $('.author-date').html(date);

    if(existimg == 1){
    $('.author-post-img').attr('src','http://localhost/messages/'+post_img+'');
    }else if(existimg ==0){
      $('.author-post-img').attr('src','');   
    }
    $('.author-img').attr('src','http://localhost/messages/'+img+'');
        $('.bg-model').css('display','flex');
    
});
 $(document).on('click','.edit-post',function(){
       var post_id = $(this).data('id');
       var post = $(this).data('post');
        $('#edit-post-id').val(post_id);
        $('#update-post-text').val(post);
        $('.bg-edit-post').css('display','flex');
    
});  
 $(document).on('click','.remove-edit-post',function(){
        $('.bg-edit-post').css('display','none');
    
}); 
  $(document).on('click','#update-post',function(){
        $('.bg-edit-post').css('display','none');
    
});       
  $(document).on('click','.click-to-write',function(){
        $('.bg-post').css('display','flex');
    
});  
 $(document).on('click','.send-comment',function(){
     var p_id=$('.comment_id').val();
     var comment_body=$('#comment_text').val();
     if($('#comment_text').val()!=''){
                $.ajax({
                    url:"sendcomment.php",
                    method:"post",
                    data:{p_id:p_id,comment_body:comment_body},
                    success:function(data){
                     var comment_body =$('#comment_text').val(''); 
                    get_all_posts();
                    fetch_user_posts();
                        
                    }
                });
 }
 }); 
$(document).on('click','.close-comments',function(){
     $('.bg-model').css('display','none');
          

});
 $(document).on('click','.close-posts',function(){
     $('.bg-post').css('display','none');
});
    $(document).on('click','.delete-message',function(){
    var message_id = $(this).data('id');
        if(confirm('you sure you want remove this message..?')){
         $.ajax({
                 url:"delete_message.php",
                  method:"post",
                  data:{message_id:message_id},
                  success:function(data){
                     update_chat_history();
                    }
                });
        }
    });
    
     $(document).on('click','#delete-comment',function(){
    var comment_id = $(this).data('id');
         $.ajax({
                 url:"delete_comment.php",
                  method:"post",
                  data:{comment_id:comment_id},
                  success:function(data){
                 get_all_posts();
                  update_profile_history();
                       fetch_user_posts();
                    }
                });
    });

    $(document).on('click','#update-post',function(){
    var post_id = $('#edit-post-id').val();
    var post =$('#update-post-text').val();
         $.ajax({
                 url:"update_post.php",
                  method:"post",
                  data:{post_id:post_id,post:post},
                  success:function(data){
                 $('#update-post-text').val('');
                      get_all_posts();
                       update_profile_history();
                       fetch_user_posts();
                    }
                });
    });
    $(document).on('click','.remove-post',function(){
    var post_id = $(this).data('id');
        if(confirm('you sure you want remove this post..?')){
         $.ajax({
                 url:"delete_post.php",
                  method:"post",
                  data:{post_id:post_id},
                  success:function(data){
                      get_all_posts();
                       update_profile_history();
                       fetch_user_posts();
                    }
         });
        }});
   $(document).on('click','.return-message',function(){
    var message_id = $(this).data('id');
         $.ajax({
                 url:"return_message.php",
                  method:"post",
                  data:{message_id:message_id},
                  success:function(data){
                     update_chat_history();
                    }
                });
    }); 
$(document).on("click","#upload-img",function(){
  var property = document.getElementById("file").files[0];
    var post_img = property.name;
    var caption = $('#tm_user_post').val();
    $.ajax({
        url:"insertimg.php",
        method:"post",
        data:{post_img:post_img,caption:caption},
        success:function(data){
        $('#file').val('');
        $('#tm_user_post').val('');
        $('.prepare-timeline-img').html('');
         $('.prepare-timeline-img').css('display','none');   
            get_all_posts();
             update_profile_history();
             fetch_user_posts();
        }
     
    
    });
});
 $(document).on("click","#upload-video",function(){
  var property = document.getElementById("video").files[0];
    var post_video = property.name;
    var caption = $('#tm_user_video').val();
    $.ajax({
        url:"insertvideo.php",
        method:"post",
        data:{post_video:post_video,caption:caption},
        success:function(data){    
        $('#video').val('');
        $('#tm_user_video').val('');
            get_all_posts();
            update_profile_history();
            fetch_user_posts();
        }
     
    
    });
});   
 $(document).on("click","#upload-post",function(){
    var attach_post = $('#attach_post').val();
    $.ajax({
        url:"insertpost.php",
        method:"post",
        data:{attach_post:attach_post},
        success:function(data){
        $('#attach_post').val('');
        get_all_posts(); 
          update_profile_history();
             fetch_user_posts();
        }
     
    
    });
});   
 $(document).on("click","#myImg",function(){
 var big = $(this).data('bigimg');
     $('#myModelImg').css('display','flex');
     $('#bigImg').attr('src','http://localhost/messages/'+big+'');
 });
  $(document).on("click","#myModelImg",function(){
     $(this).css('display','none');
     
 });
  $(document).on("click","#bigImg",function(){
     $("#myModelImg").css('display','flex');
     
 });
      
 $(document).on('click','.reply-btn',function(){
 $('.reply-zoon').show();
     var msg = $(this).data('message');
     var name = $(this).data('name');
     $('.message-name').html(name);
     $('.message-body').html(msg);
     $('#message-body').val(msg);
 
 });      
$(document).on('click','.reply-zoon',function(){
 $('.reply-zoon').hide();
 $('#message-body').val('');    
 
 });      
     
   
   
               
</script>
 <script lang="javascript">
       document.body.classList.add(localStorage.getItem("pageColor"));
     var ele = document.querySelectorAll('.mode button');
     var classeslist =[];
     for(var i=0; i<ele.length ; i++){
       classeslist.push(ele[i].getAttribute('data-color'));
         
         ele[i].addEventListener('click',function(){
        document.body.classList.remove(...classeslist);
        document.body.classList.add(this.getAttribute('data-color'));
         localStorage.setItem("pageColor",this.getAttribute('data-color'));
         
         
         },false);
     
     }
      document.body.classList.add(localStorage.getItem("pageColor"));
     var ele = document.querySelectorAll('.mode button');
   
     for(var i=0; i<ele.length ; i++){
       
         ele[i].addEventListener('click',function(){
        document.body.classList.remove('light dark');
        document.body.classList.add(this.getAttribute('data-color'));
         localStorage.setItem("pageColor",this.getAttribute('data-color'));
         
         
         },false);
     
     }
     console.log(classeslist);
     
     var customFile = document.getElementById("customFile");
     var realFile = document.getElementById("file");
     var postBtn = document.getElementById("upload-img");
     var text = document.getElementById("customText");
      var customVideo = document.getElementById("customVideo");
     var realVideo = document.getElementById("video");
     var videoBtn = document.getElementById("upload-video");
     customFile.addEventListener("click",function(){
          realFile.click();
         
     
     });
     realFile.addEventListener("change",function(){
          customFile.textContent= 'Image Selected';
     
     });
     postBtn.addEventListener("click",function(){
     customFile.textContent='Attach Img';
     });
     customVideo.addEventListener("click",function(){
          realVideo.click();
         
     
     });
     videoBtn.addEventListener("click",function(){
     customFile.textContent='Video';
     });
   var cloud = document.getElementById('uploadimg');
     
   var chatimg = document.getElementById('chatimg');
      cloud.addEventListener("click",function(){
          chatimg.click();
     }); 
</script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> 
    
</body>
</html>

<?php
           }else{
    header('location:login.php');
}

            
  