<?php



try{

    $con = new mysqli("localhost","root","","chat_message");

// Check connection
if ($con -> connect_errno) {
  echo "Failed to connect to MySQL: " . $con -> connect_error;
  exit();
}

}catch(Exception $e){

    echo $e->getMessage();


}




?>