<?php
include 'C:\xampp\htdocs\messages\db.php';
session_start();
if(isset($_SESSION['username'])){

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

<style>
* {
  box-sizing:border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
  padding: 0;
  background-color:  #f1f1f1;
 

}
.user_dialog{
    background-color: #343a40;
    color:white;
    border-radius:10px;
    height:50px;
    padding:5px;
    
    
    }

   
</style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info post navbar-fixed" style="background-color: white; box-shadow:0px 1px 4px 0px;">
    <a class="navbar-brand" href="http://localhost/Eshop/admin/login.php"><h3 class="text-success"><b>Tellme</b></h3></a>
    <button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
       
  </nav>
  <div class="row">
       <div class="col-md-3 bg-dark" style="overflow-y:scroll; height:700px; overflow:none" id="side">
        
        </div>
        <div  class="col-md-5  ml-4 mt-4"> 
        
          <input id="to_user_id"/>
        <input id="chat_message"/>
        <button id="btn">insert</button>
    
                    
            <p></p>
      

            <div class="chat"></div>
    
   
        
 <div class="col-md-3 mt-4 " style="">
            <div class="container" style="box-shadow:1px 1px 3px 0px;">
                <div class="row p-2">
                     <div class="col-md-5">
                    <img src="" width="100%" height="100%"   style="box-shadow:1px 1px 3px 0px;"/>
                    </div>
                    <div class="col-md-7">
                <h4><b><span class="text-success">Name:</span><?php echo $_SESSION['username']; ?></b></h4>
                  <button class="btn btn-success m-2 text-light font-weight-bold"><i class="fa fa-picture-o"></i></button>
           <a class="btn btn-dark text-light font-weight-bold m-2" href="logout.php"><i class="fa fa-sign-out"></i></a>  
                    </div>   
                </div>
            </div>
    
        </div>
    </div>

    </div>

    
<script>
     
  fetch_user();
    function fetch_user(){
        $.ajax({
            url:"fetch_user.php",
            method:"POST",
            success:function(data){
                $('#side').html(data);
                
            }
        });    
    }
    
     
      
      $(document).on('click','.start_chat',function(){
             var to_user_id = $(this).data('touserid');
             var to_user_name = $(this).data('tousername'); 
            chat_box(to_user_id,to_user_name);
            $("#user_dialog_"+to_user_id).dialog({
                autoOpen:false,
                width:400
            
            });
            $("#user_dialog_"+to_user_id).dialog('open');
            });
    
      $('#btn').click(function(){
                var to_user_id = $('#to_user_id').val();
                var chat_message =$('#chat_message').val();
                $.ajax({
                    url:"testchat.php",
                    method:"post",
                    data:{
                        to_user_id:to_user_id,
                        chat_message:chat_message
                
                    },
                    success:function(data){
                        alert('inserted');
                        $('p').html(data);

                        
                    }
                
                
                });
            });    

     
        
     
  
</script>
   
   
</body>
</html>

<?php
           }else{
    header('location:login.php');
}

