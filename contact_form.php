<?php
 include ("database/db3.php"); 
 if (isset($_POST['name']) && isset($_POST['email'])){
    if (isset($_REQUEST['name'])){
    // $time = stripslashes($_REQUEST['time']); 
    //$time = mysqli_real_escape_string($con,$time); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $name = stripslashes($_REQUEST['name']); 
    $name = mysqli_real_escape_string($con,$name); 
     $phone = stripslashes($_REQUEST['phone']); 
    $phone = mysqli_real_escape_string($con,$phone); 
    $message = stripslashes($_REQUEST['message']);
    $message = mysqli_real_escape_string($con,$message);
   
  

$query = "INSERT INTO contacts (time, email, name, message, phone) VALUES (now(), '$email', '$name', '$message', '$phone')";
        $result = mysqli_query($con,$query);
        
    $query = "INSERT INTO contacts1 (time, email, name, message, phone) VALUES (now(), '$email', '$name', '$message', '$phone')";
        $result = mysqli_query($con,$query);

        if($result){
          $smsg =" Your message  has been successfully sent!";
          
        }
    else{
    	 $fmsg =" Error! The message was unable to send. Please try again later!";
    }

}}

?>