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
$output="";    
$output .='<div class="text-center bg-primary text-light font-weight-bold  p-2 mb-2 toggle-chats-btn" style="cursor:pointer; border-radius:5px; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);"><h3>Chats</h3></div>';   
foreach($rows as $row){
$output .='
<div class="toggle-chats">
<div style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); border-radius:5px; width:100%; cursor:pointer;" class="start_chat mb-2 p-2 tm-user-info" data-touserid='.$row['id'].' data-status='.$row['status'].' data-bio="'.$row['bio'].'" data-tousername='.$row['username'].' data-touserimg="'.$row['user_prof'].'">
<span><img src="http://localhost/messages/'.$row['user_prof'].'" width="40px;" height="40px;" style="border-radius:50%" class="mr-2"/></span>
<span><h4>'.$row['username'].'</h4></span>
<span>'.unseen_message($row['id'],$_SESSION['id'],$db).'</span>
</div>
</div>
';

}
echo $output;
    }else{
  header('location:login.php');  
    
}
?> 
    </body>
</html>