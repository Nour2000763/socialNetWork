<?php 
session_start();
include 'C:\xampp\htdocs\messages\db.php'; 

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $stat=$db->prepare('select * from message_user where phone=? and password=?');
    $stat->execute(array($phone,$pass));
    $rows = $stat->fetch();
    $count= $stat->rowCount();
 
    if($count > 0){
        $_SESSION['id'] = $rows['id'];
        $_SESSION['username'] = $rows['username'];
       $_SESSION['phone'] = $rows['phone'];
         $_SESSION['bio'] = $rows['bio'];
        $_SESSION['user_prof'] = $rows['user_prof'];
         $_SESSION['user_cover'] = $rows['user_cover'];
        $_SESSION['password'] = $rows['password'];
        $user = $rows['id'];
        $stat=$db->prepare('update message_user set status="online" where phone='.$rows['phone'].'');
        $stat->execute();
        header('location:new-feed.php');
        
    }else{
        
     $error_login = '<div class="alert alert-danger">Please Check <b>Phone Number Or Password</b></div>';
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
<style>
* {
  box-sizing:border-box;
}

/* Style the body */
body {
  font-family:serif;
  margin: 0;
  padding: 0;
  background-color:aliceblue;
    width:96%;


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
  margin-top:120px;
   width:100%;
    margin-left:10px;
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



   
</style>
</head>
<body>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="bg-img">
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="p-2" method="POST">
     <h1 class="font-weight-bold text-center"><span class="text-primary">W</span>ork<span class="text-primary">Z</span>one<i class="text-primary fa fa-fire"></i></h1>
      <h3 class=""><i>Let's be In touch Together</i></h3>
      <?php
      if(isset($error_login)){
          
          echo $error_login;
      }
      ?>
    <label for="email" class="text-primary"><b>Phone Number</b></label>
    <input type="text" placeholder="Enter username" name="phone" autocomplete="off" required>

    <label for="psw" class="text-primary"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit" class="btn btn-primary" name="login"><b>Login</b></button><br>
      <a class="btn-btn-link text-dark m-2" href="index.php">I Don't have Account..<b>Create One</b>.</a>
  </form>
        </div>
        </div>
        <div class="col-md-6"></div>
    </div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>