<?php
 include ("database/db3.php"); 
         $query = "DELETE FROM orders WHERE cart='{$_GET['cart']}'";
        $result = mysqli_query($con,$query);
        if($result){
        header('Location:'.$_SERVER['HTTP_REFERER']);
        }
   
?>