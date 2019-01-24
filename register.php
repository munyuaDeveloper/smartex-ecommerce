
    
<?php
session_start();
error_reporting(1);
include ("database/db3.php"); 

extract($_POST);
if ($login) {
     if (isset($_POST['email'])){
    $email = stripslashes($_REQUEST['email']); 
    $email = mysqli_real_escape_string($con,$email); 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

     $result = mysqli_query($con,"SELECT * FROM customer WHERE email='$email'");
    while($row = mysqli_fetch_array($result)) { $customer = $row['id'];}

       $query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
       $result = mysqli_query($con,$query) or die(mysqli_error());
      $rows = mysqli_num_rows($result);
      if($rows==1){
        $query = "UPDATE orders SET customer='$customer' WHERE cart='{$_GET['cart']}'";
        $result = mysqli_query($con,$query);
        unset($_SESSION['cart_number']);
        $_SESSION['user_email'] = $email;
        $query = "UPDATE page_visits SET payment=payment + 1 WHERE id='1'";
        $result = mysqli_query($con,$query);
        Print '<script>window.location.assign("congratulations.php");</script>';
    }else{
      $fmsg ="Login failed! Wrong email or password.";
      }
    }
}
  extract($_POST);
 if($register) {
    $email = stripslashes($_REQUEST['email']); 
    $email = mysqli_real_escape_string($con,$email); 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $phone = stripslashes($_REQUEST['phone']); 
    $phone = mysqli_real_escape_string($con,$phone); 
    $names = stripslashes($_REQUEST['names']);
    $names = mysqli_real_escape_string($con,$names);

    $query = "SELECT * FROM customer WHERE email='$email'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
    if($rows!==0){
      $fmsg ="Registration failed! This email has already been registered.";
    }else{
      $query="INSERT INTO customer(names, email, password, phone) VALUES('$names', '$email', '$password', '$phone')";
      if( $result = mysqli_query($con,$query)){
        $_SESSION['user_email'] = $email;
        echo"<script> alert('You were registered successful!')</script>";
        Print '<script>window.location.assign("index.php");</script>';
      }
      
    }
//     $result = mysqli_query($con,"SELECT * FROM customer WHERE email='$email'");
//     while($row = mysqli_fetch_array($result)) { 
//       $customer = $row['id'];
//     }
//     $query = "UPDATE orders SET customer='$customer' WHERE cart='{$_GET['cart']}'";
//     $result = mysqli_query($con,$query);
//     unset($_SESSION['cart_number']);
//     $_SESSION['user_email'] = $email;
//     $query = "UPDATE page_visits SET payment=payment + 1 WHERE id='1'";
//     $result = mysqli_query($con,$query);
//     Print '<script>window.location.assign("index.php");</script>';
}
?>
<?php include ("header.php"); ?>
<?php include ("database/db3.php");?>
<?php
  $query = "UPDATE page_visits SET cart=cart + 1 WHERE id='1'";
  $result = mysqli_query($con,$query);
?>
<body>
  
  <div class="row">
<div class="col-sm-2"> </div>

<div class="col-sm-8 body-content">  

<div class="row">
<div class="col-md-12 animate-box">
<div class="section-title">
<h2>Register Account!</h2>

</div>
<div class="row d-flex flex-center">
<div class="col-xs-10  animate-box">
<div class="login-panel panel panel-default">

<div class="panel-body">
    <div class="row">
          <div class="col-sm-12" style="background: #f2f2f2;">
            <h5>Don't have an account? Register</h5>
            <form action="" method="post">
              Full name
              <input type="text" name="names" class="form-control" placeholder=" Full name" required>
              Email address
              <input type="email" name="email" class="form-control" placeholder="Email address" required>
              Phone number
              <input type="number" name="phone" class="form-control" placeholder="Phone number" required>
              Enter password
              <input type="password" name="password" class="form-control" placeholder="Enter password" required>
              <input style="margin-top: 5px;" type="submit" value="Register" name="register" class="btn-primary">
            </form>
          </div>
        </div>
    
</div>
</div>
</div>
</div></div></div>
<?php include ("footer.php"); ?>
</div>

</div>
<div class="col-sm-2"></div> 
   <?php mysqli_close($con); ?>
   

</body> 
</html>