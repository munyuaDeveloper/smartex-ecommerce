<?php
 include ("../db.php"); 
$id = $_GET['id'];
        $query = "DELETE FROM categories WHERE id='$id'";
        $result = mysqli_query($con,$query);
        $query = "DELETE FROM items WHERE category='$id'";
        $result = mysqli_query($con,$query);
        if($result){
        header('Location:'.$_SERVER['HTTP_REFERER']);
        }
   
?>