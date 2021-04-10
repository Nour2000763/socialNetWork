<?php 
session_start();
include 'C:\xampp\htdocs\messages\db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if ($_POST['img'] == ''){
        $_POST['img'] = $_SESSION['user_prof'];
    }else{
       $_POST['img']=$_POST['img'] ;
    }
    $stat = $db->prepare('update message_user set username = ? , phone = ? ,  password=? , bio=?, user_prof =? where id='.$_SESSION['id'].'');
   $stat->execute(array( $_POST['username'],
  $_POST['phone'],$_POST['password'],$_POST['bio'],$_POST['img']));
    if($stat->rowCount()>0){
        header('location:conn_page.php');
        
    }else{
         header('location:conn_page.php');
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
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
 width:96%;
   background-color: rgba(0,0,0,0.04);  

}
    * {
  box-sizing: border-box;
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
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
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

.nav-intro a{
    list-style: none;
    float:left;
    
    font-weight: bold;
    color: rgba(0, 0, 0, .55);
    cursor:pointer;
    font-size:14px;
    }
 .nav-intro a:hover{
     color:#343a40;
     
    }
  .nav-intro{
      position: relative;
      left:55%;
     
    }
   
</style>
</head>
<body>
       
    <div class="row">
    <div class="col-md-3">
        
        </div>
    <div class="col-md-6">
  <div class="bg-img" >
<?php
 $stat = $db->prepare('select * from message_user where id ='.$_SESSION['id'].'');
    $stat->execute();
    $row = $stat->fetch();   
          
?>  
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="container" method="POST">
  <h1 class="text-primary">Edit Info</h1>
      <center>
          <div class="register-img" id="register-img" style="border-radius:50%; width:200px; height:200px; background-color:black;">
             <img src="http://localhost/messages/<?php echo $row['user_prof']?>" width="100%" height="100%" style="border-radius:50%;"/>    
        </div>
           <input type="file" name="img" id="img" style="display:none;">
      </center>
    
    <input type="text" value="<?php echo $row['phone']?>" name="phone" autocomplete="off" required>
    <input type="text" value="<?php echo $row['username']?>" name="username" autocomplete="off" required> 
    <input type="text" value="<?php echo $row['password']?>" name="password" required>
    <input type="text" value="<?php echo $row['bio']?>" name="bio">
     <button type="submit" class="btn btn-primary"><b>Update</b></button><br>
      
  </form>
</div>
    </div>
    
    </div>
    <script>
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
      register.addEventListener("click",function(){
          img.click();
     });  

    </script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>