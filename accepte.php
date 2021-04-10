<?php 
session_start();
include 'C:\xampp\htdocs\messages\db.php';
if(isset($_SESSION['phone'])){
    


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
  margin: 0;
  padding: 0;
  width: 96%;
  background-color:aliceblue;
 

}
    * {
  box-sizing: border-box;
}

.card {
  /* Add shadows to create the "card" effect */
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
}

/* On mouse-over, add a deeper shadow */
.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

/* Add some padding inside the card container */
.container {
  padding: 2px 16px;
}


   
</style>
</head>
<body>
    <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 mt-4">    
 <div class="card" style="width:100%; height:auto;">
     <h1 class="font-weight-bold text-center"><span class="text-primary">W</span>ork<span class="text-primary">Z</span>one<i class="text-primary fa fa-fire"></i></h1>
  <img src="http://localhost/messages/<?php echo $_SESSION['user_prof']; ?>" alt="photo of <?php echo $_SESSION['username']; ?>" style="width:100%" height="auto" >
  <div class="container">
    <h2 class="text-center" style="text-transform:capitalize;"><b><?php echo $_SESSION['username']; ?></b></h2>
    <p class="text-center"  style="text-transform:capitalize; color:rgba(0,0,0,0.6)"><?php echo $_SESSION['bio']; ?></p>
  </div>
     <a class="btn btn-primary m-2 text-light font-weight-bold" href="conn_page.php?<?php echo $_SESSION['username']?>">Login</a>
</div>
    </div>
    <div class="col-md-3"></div>
    </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>
<?php
    
}else{
    header('location:login.php');
    
}
    ?>




