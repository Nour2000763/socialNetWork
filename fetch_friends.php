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
ul {
   list-style: none; 
    
    }

    
    
   
</style>
    </head>
<body>
<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$stat= $db->prepare('select *from message_user where phone !='.$_SESSION['phone'].'');
$stat->execute();
$rows = $stat->fetchAll();
echo '<h3 class="text-primary ml-3"><b>Find Friends</b><h3>';  
$output ='<ul>';
foreach($rows as $row){
$output .='<div class="row">
<div class="col-md-6">
<li style="color:white;" class="mt-4"><div class="row"><img height="60px;" width="60px;" style="border-radius:50%;" class="border ml-2"/>'.'  '.'<h4 class="text-dark ml-2"><b>'. $row['username'].'</b>'.unseen_message($row['id'],$_SESSION['id'],$db).'</h4></div></li>
</div>
<div class="col-md-6 mt-4">
<button class="btn btn-dark" style="float:left;"><i class="fa fa-user-plus"></i></button>
</div>
</div>';

}
$output .='</ul>';
echo $output;
    }else{
  header('location:login.php');  
    
}
    
?> 
    </body>
</html>