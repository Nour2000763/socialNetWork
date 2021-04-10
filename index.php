<?php 
session_start();
include 'C:\xampp\htdocs\messages\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $stat =$db->prepare('select * from message_user where phone=?');
    $stat->execute(array($_POST['phone']));
    $count = $stat->rowCount();
    if($count == 1){
        $alert_phone = '<div class="mt-2 ml-4 alert alert-danger" role="alert">
        This Phone Number Already Exist
         </div>';
    }else{
        
   if($_POST['img'] == ''){
       $_POST['img'] = 'black.jpg';
       
   }
$allowed_imgs = array('jpg','png','webp','gif');
$img = $_POST['img'];
$end = explode('.',$img);
$img_extention = end($end);
if(in_array($img_extention,$allowed_imgs)){
    $_POST['img'] = $_POST['img'];
}else{
    $_POST['img'] = 'black.jpg';
    
}
        $stat=$db->prepare('insert into message_user(username,phone,password,bio,user_prof) values(:username,:phone,:password,:bio,:user_prof)');
          $done  = $stat->execute(array(
            'username'=>$_POST['username'],
            'phone'=>$_POST['phone'],
            'password'=>$_POST['password'],
              'bio'=>$_POST['bio'],
              'user_prof'=>$_POST['img']
            )); 
        if($done){
            $stat=$db->prepare('select id from message_user where phone='.$_POST['phone'].'');
            $stat->execute();
            $id = $stat->fetch();
            $_SESSION['id'] = $id['id'];
           $_SESSION['username']=$_POST['username'];
           $_SESSION['phone']=$_POST['phone'];
            $_SESSION['bio']=$_POST['bio'];
           $_SESSION['user_prof']=$_POST['img'];
             header('location:accepte.php');
             
            
        }else{
           header('location:login.php');
            echo '<script>alert("Try Again")</script>';
            
        }
    }
            
     
}

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
  font-family: Poppins,sans-serif;
  margin: 0;
  padding: 0;
   background-color:aliceblue;
    padding:0px;
    margin: 0px;
    height:auto;
    overflow-x: hidden;

}
    * {
  box-sizing: border-box;
}
.navbar{
    background-color: white;
    padding:0px;
    
    width:100%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

.bg-img {
    background-color:white;
  display: flex;
  justify-content: center;
    align-items: center;
  border-radius: 15px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
margin-top: 10px;
}
.register-img{
    display: flex;
  justify-content: center;
    align-items: center;
    cursor: pointer;
    color:white;
    
    }
.register-img:hover{
    opacity: 0.8;
    
    }
  input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  border-bottom:1px solid #007bff;
  background-color:whitesmoke;
}

input[type=text]:focus, input[type=password]:focus {
  outline: none;
}

/* Set a style for the submit button */
.btn {
 
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
#load_img{
     display: none;   
        
    }

/** For tablet devices **/
@media (min-width: 768px) and (max-width: 1023px) {
    .text-fade{
    display: flex;
    
    }
    }
@media (min-width: 760px) and (max-width:770px){
    .caption h1{
      position:static;
    }
    
    }
/** For mobile devices **/
@media (max-width: 767px) {
    .caption h1{
      position:static;
    }
    }
 #login{ 
background-color:#007bff;
     color:white;
     border-radius:15px;
     text-align:center;
     letter-spacing:5px;
     margin-top:2px;
    }
    #login:hover{
      opacity:0.8;  
    }
.caption{
     background-color:aliceblue;
     height:auto;
     width:100%;
    padding: 20px;
    }

.caption h1{
    color:black;
    font-weight:700;
    }
.features{
      padding:100px;
    background-color:white;
    }
.features h2{
    font-weight:900;
    padding-bottom:70px;
    }
.features .feat{
    padding:10px;
    
    }
.features .feat p {
font-weight:bold;
    color:rgba(0,0,0,0.6);
    
    }
.features .feat i{
    font-size:40px;
    }
form {
  border: 3px solid white;
    
    background-color:white;
}

/* Full-width inputs */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #007bff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the avatar image inside this container */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}
.sign-up{
  padding:50px;
   background-image: url('http://localhost/messages/work1.jpg');
    background-size: cover;
    }
.sign-up h1{
    font-weight:700;
  padding-bottom:20px;
    position: absolute;
    top:40%;
    }
 * {
  box-sizing: border-box;
}

body {
  background-color: rgba(0,0,0,0.1);
  font-family: Helvetica, sans-serif;
}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
}


/* Container around content */
.container-timeline {
  padding: 10px 40px;
  position: relative;
  background-color: inherit;
  width: 50%;
}

/* The circles on the timeline */
.container-timeline::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -17px;
}

/* Place the container to the left */
.left {
  left: 0;
}

/* Place the container to the right */
.right {
  left: 50%;
}



/* Fix the circle for containers on the right side */
.right::after {
  left: -16px;
}

/* The actual content */
.content {
  padding: 20px 30px;
  background-color:white;
  position: relative;
  border-radius: 6px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.3);
}

/* Media queries - Responsive timeline on screens less than 600px wide */
@media screen and (max-width: 600px) {
  /* Place the timelime to the left */
  .timeline::after {
  left: 31px;
  }
  
  /* Full-width containers */
  .container-timeline {
  width: 100%;
  padding-left: 70px;
  padding-right: 25px;
    box-shadow:0 4px 8px 0 rgba(0,0,0,0.2);
  }
  
  /* Make sure that all arrows are pointing leftwards */
  .container-timeline::before {
  left: 60px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
  }

  /* Make sure all circles are at the same spot */
  .left::after, .right::after {
  left: 15px;
  }
  
  /* Make all right containers behave like the left ones */
  .right {
  left: 0%;
  }
}
.sign-model{
     height:100%;
     width:100%;
     position: fixed;
    top:0px;
     background-color: rgba(0,0,0,0.5);
     display: none;   
    }
.users{
    padding:70px;
    }
.users h1{
    font-weight: 600;
    padding-bottom:20px;
    }

.users
</style>
</head>
<body>
 
 <nav class="navbar navbar-expand-lg navbar-light">
     <div class="container">
  <h2 class="font-weight-bold text-center"><span class="text-primary">W</span>ork<span class="text-primary">Z</span>one<i class="text-primary fa fa-fire"></i></h2>
  <ul style="list-style:none;">
     <li class="nav-item">
        <a href="login.php" class="nav-link p-1 pl-2 pr-2 ml-3 mt-3" id="login">Login</a>
      </li>    
         
  </ul>
  
    </div>
    </nav>
<section class="caption">
 <div class="container">
     <div class="row">
         <div class="col-lg-5 col-md-6 col-xs-12 text-center">
             <h1 class="mt-4 pt-4"><span class="text-primary">Sign In</span> WorkZone Now, Together Whenever<br><center><i style="font-size:300px;" class="fa fa-globe text-primary"></i></center></h1>
         </div>
         <div class="col-lg-7 col-md-6 col-xs-12">
          <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
  <div class="imgcontainer container">
    <div id="register-img" class="container register-img text-center bg-light" style="height:200px; width:200px; border-radius:50%; overflow:hidden; border:1px solid black;">
        <h4 class="text-dark">Select Image</h4>
    </div>
  </div>

  <div class="container">
      <input type="file" id="img" name="img" style="display:none;">
      <label for="phone">Phone</label>
    <input type="text" placeholder="Enter Phone" name="phone" autocomplete="off" required>
      <label for="username">Username</label>
    <input type="text" autocomplete="off" placeholder="Enter Username" name="username" required>
      <label for="password">Password</label>
    <input type="password" placeholder="Enter Password" name="password" required>
      <label for="bio">Bio</label>
    <input type="text" autocomplete="off" placeholder="Enter Bio" name="bio">
    <button type="submit" class="btn btn-success">Create Account</button>
  </div>
</form>     
         
         </div>
     </div>    
 </div>
    
</section>
<section class="features text-center fade-in">
    <h2>Join Our Application Now</h2>
<div class="container text-center">
<div class="row">
<div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
<div class="feat">
 <i class="fa fa-check text-primary"></i>
 <h4 class="font-weight-bold">100% Responsive</h4>
 <p>This Application Is Responsive You Can Work It On Large Screens And Small Screens Enjoy This Application And Work</p>
</div>      
</div>
 <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
<div class="feat">
 <i class="fa fa-book text-primary"></i>
 <h4 class="font-weight-bold">Share Posts</h4>
 <p>You Can Share Posts In Our Application And Enjoy With Your Team On WorkZone Enjoy The Konlage In Any Moment</p>
</div>      
</div>
 <div class="col-lg-4 col-md-3 col-sm-6 col-xs-12">
<div class="feat">
 <i class="fa fa-comments text-primary"></i>
 <h4 class="font-weight-bold">Send Messages</h4>
 <p>You Can Send Messages On Contach With Your Team Members Join Our Application And Enjoy Talking</p>
</div>      
</div>   
</div>   
</div>   
</section>
   
    
    <div class="sign-model">
 <div class="row">
     <div class="col-lg-3 col-md-3 col-xs-12">
     </div>
     <div class="col-lg-6 col-md-6 col-xs-12">
            
     </div>
     <div class="col-lg-3 col-md-3 col-xs-12">
     </div>
        
</div>
    </div>
<script>
 $('h1').fadeIn(500);
 $(document).on('change','#img',function(){
 var property = document.getElementById('img').files[0];
 var img_name = property.name;
         var form_data = new FormData();
         form_data.append('img',property);
         $.ajax({
           url:"upload_img.php",
           method:"POST",
           data:form_data,
           contentType:false,
           cache:false,
           processData:false,
           success:function(data){
               $('.register-img').html(data);
         }
         
         });
 });
    
    </script>
<script>
    var img = document.getElementById('img');
   var register = document.getElementById('register-img');
    var submit = document.getElementById('signup');
      register.addEventListener("click",function(){
          img.click();
     });
    
    
    
    
    </script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
