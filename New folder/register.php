
   <?php
  include ("db.php"); 
    if (isset($_POST['name']) && isset($_POST['phone'])){
    if (isset($_POST['name'])){
    $name = stripslashes($_REQUEST['name']);
    $name = mysqli_real_escape_string($con,$name);
    $phone = stripslashes($_REQUEST['phone']); 
    $phone = mysqli_real_escape_string($con,$phone); 
     $password = stripslashes($_REQUEST['password']); 
    $password = mysqli_real_escape_string($con,$password); 
     $password1 = stripslashes($_REQUEST['password1']);
    $password1 = mysqli_real_escape_string($con,$password1);
     $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
   
    if ($password != $password1) {
       $fmsg ="Passwords dont match! Please review your input values...";
      }else{

 $query = "SELECT * FROM user WHERE phone='$phone' || email='$email'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows!=0){
            $fmsg ="Failed! A user with similar phone number or email already exists!";
         }else{
  $query = "INSERT INTO user (name, phone, password, email, created) VALUES('$name', '$phone', '$password', '$email', now())";
     $result = mysqli_query($con,$query);
          if($result){
            Print '<script>alert("Account creation succeeded! please login to continue..");</script>';
        $URL="login.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
          
        }else{
           $fmsg ="Failed to register!";
        }}}
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sportnami - Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
     <style type="text/css">
      body{
        background-color: black;
      }
    </style>
</head>
<body>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">Registers</div>
                <div class="panel-body">
      <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
<?php } ?><?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<form action="" method="post">
                        <fieldset>
                            <div class="form-group">
               <input class="form-control" placeholder="Full name" name="name" type="text">
                            </div>
                               <div class="form-group">
               <input class="form-control" placeholder="Email address" name="email" type="text">
                            </div>
                            <div class="form-group">
               <input class="form-control" placeholder="Phone number" name="phone" type="text">
                            </div>
                            <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>
                            <div class="form-group">
                <input class="form-control" placeholder="Re-enter password" name="password1" type="password">
                            </div>
                             <input type="submit" value="Register" class="btn btn-success"></fieldset>
                    </form>
                   
                    <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">Already have an account? <a href="login.php">Login</a></div>
                </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->    
    

<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
