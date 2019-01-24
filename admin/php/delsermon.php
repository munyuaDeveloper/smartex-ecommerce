<?php
 include ("../db.php"); 
$id = $_GET['id'];
        $query = "DELETE FROM sermon WHERE id='$id'";
        $result = mysqli_query($con,$query);
        if($result){
        $URL="../sermons.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
        }
   
?>