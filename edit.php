<?php
session_start();
include 'C:\xampp\htdocs\messages\db.php';
if(isset($_SESSION['username'])){
    if(isset($_POST['update'])){
        $stat=$db->prepare('update message_user set phone='.$_POST["phone"].',username="'.$_POST["username"].'",password='.$_POST["password"].',bio="'.$_POST['bio'].'" where id='.$_POST["id"].'');
        $stat->execute();
        if($stat->execute()){
           header('location:conn_page.php?'.$_SESSION['username'].''); 
        }
    }
    $stat=$db->prepare('select * from message_user where id ='.$_SESSION['id'].'');
    $stat->execute();
    $info = $stat->fetch();
    
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
<style>
* {
  box-sizing:border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  
  background-color:whitesmoke;
 

}
    * {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  background-image: url("img_nature.jpg");

  /* Control the height of the image */
  min-height: 380px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 470px;
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
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


   
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info post navbar-fixed bg-dark" style=" box-shadow:1px 1px 4px 0px;">
    <a class="navbar-brand" href="http://localhost/Eshop/admin/login.php"><h3 class="text-light"><b>Tellme</b></h3></a>
    <button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
        
  
  </nav>
    <div class="col-md-2">
        
    
    
    </div>
    <div class="col-md-8 mt-4">
  <div class="bg-img" >
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="container" style="box-shadow:1px 2px 5px 0px;" method="POST">
    <h1 style="font-family:harlow solid italic;">Edit Info</h1>

    <label for="phone"><b>Phone Number</b></label>
    <input type="text" placeholder="Change Phone Number.." name="phone" autocomplete="off" value="<?php echo $info['phone']?>" required>
      <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Edit username.." name="username" autocomplete="off" value="<?php echo $info['username']?>" required>
    <label for="psw"><b>Password</b></label> 
    <input type="text" placeholder="Edit Password.." name="password" value="<?php echo $info['password']?>" required>

      <label for="bio"><b>Bio</b></label> 
    <input type="text" placeholder="Edit Bio.." value="<?php echo $info['bio']?>" name="bio">
      <input type="hidden" name="id" value="<?php echo $info['id']?>"/>
      <button type="submit" class="btn btn-dark" name="update">Update</button>
      <a class="btn-btn-link text-dark m-2 font-weight-bold " href="conn_page.php?<?php echo $_SESSION['username'];?>"><i>Back</i></a>
  </form>
</div>
    </div>
    <div class="col-md-2"></div>
    







<?php

}else{
    header('location:login.php');  
}








?>

