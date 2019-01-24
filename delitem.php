<?php
 include ("database/db3.php"); 
         $query = "DELETE FROM orders WHERE cart='{$_GET['cart']}' AND item = '{$_GET['item']}'";
        $result = mysqli_query($con,$query);
        if($result){
        header('Location:'.$_SERVER['HTTP_REFERER']);
        }
   
?>