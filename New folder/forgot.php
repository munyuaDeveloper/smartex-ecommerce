
<?php
  include ("db.php"); 
 session_start();
   if (isset($_POST['email']) && isset($_POST['phone'])){
    if (isset($_POST['email'])){
     $phone = stripslashes($_REQUEST['phone']); 
    $phone = mysqli_real_escape_string($con,$phone); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);

   $query = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){

    $to =  $email;
     $from =  "sportnami.com";
    $subject = "<b>Sportnami Password Recovery</b>";
    $message = "Please the link below to reset your sportnami password. <a href=''>Reset password</a>";
     $headers = "From:" . $from;
     mail($to,$subject,$message,$headers);
    
 Print '<script>alert("Your password reset link has been mailed to you. Kindly follow it to reset your password.");</script>';
        $URL="login.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";


  }else
       {
         $fmsg ="failed! Your email does not match any account.";
        }

       
    }
    else
    {
        $smsg ="<b>Authentication window.</b>";
    }}
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
                <div class="panel-heading">Enter your valid email address</div>
                <div class="panel-body">
                   <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
<?php } ?>  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<form action="" method="post">
                        <fieldset>
                            <div class="form-group">
               <input class="form-control" placeholder="Email address" name="email" type="email">
                            </div>
                           
               <input class="form-control" name="phone" type="hidden">
                             
                             <input type="submit" value="Proceed reset" class="btn btn-success"></fieldset>
                    </form><div class="row">
                    <div class="col-md-6"><a href="register.php"> Create an account </a></div>
                    <div class="col-md-6"><a href="login.php"> Back to login</a></div>
                </div></div>
            </div>
        </div><!-- /.col-->
    </div><!-- /.row -->    
    

<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
