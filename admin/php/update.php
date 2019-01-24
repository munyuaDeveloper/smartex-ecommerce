<?php

include ("../db.php"); 
$pro = $_GET['pro_id'];
$newname= $_POST['newName'];
$newprice= $_POST['newPrice'];
$query = "UPDATE items SET name ='$newname', price='$newprice' WHERE id='11' ";
$run = mysqli_query($con,$query);
if($run){
Print '<script>alert("Product updated successful");</script>';
header('Location:'.$_SERVER['HTTP_REFERER']);
}else{
    Print '<script>alert("Error updating the product");</script>';
}



?>