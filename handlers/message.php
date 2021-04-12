<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href = "style.css"/>
</head>
<body>
   
</body>
</html>


<?php 
include('../config.php');

session_start();
switch($_REQUEST['action'] ){

    case "sendMessage" : 
 

           

       echo "Something came from php";
       $user = $_SESSION['username'];
       $message = $_REQUEST['message'];
      $sql = "INSERT INTO messages (user , message) values ('$user','$message' ) " ;

      $result = mysqli_query($con,$sql);

      if(isset($result)){
                 
         echo "data successfully inserted";
         
         

      }
      
           
      
      break;


      case "getMessage" : 

         $sql = "SELECT * FROM messages";
         $result = mysqli_query($con,$sql);

           if($result->num_rows > 0){


            while($rows = mysqli_fetch_assoc($result)){  ?>
               
               
               
                <div class="container">
 
  <p> <?php  echo $rows['message']; ?></p>
  <span class="time-right"> <?php echo $rows['user']?></span>
</div>


        <?php     }
           }


         break;
          
          }
          
        



         
  



?>