    
<?php
session_start();
error_reporting(1);
$action = $_GET['action'];
  include ("database/db.php"); 
  session_start();
   if (isset($_POST['password']) && isset($_POST['email'])){
    if (isset($_POST['password'])){
     $email = stripslashes($_REQUEST['email']); 
    $email = mysqli_real_escape_string($con,$email); 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
     $result = mysqli_query($con,"SELECT * FROM designer WHERE email='$email'");
     while($row = mysqli_fetch_array($result)) { $users_id = $row['id'];}
     
   $query = "SELECT * FROM designer WHERE email='$email'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
$query = "SELECT * FROM designer WHERE  email='$email' AND password='$password'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
if($rows==1){
     $query = "UPDATE designer SET lastlogin=now() WHERE email='$email'";
   $result = mysqli_query($con,$query);
     $_SESSION['writer_email'] = $email;

     

    
       
    Print '<script>window.location.assign("index.php");</script>';
   
 }else{
 
    $fmsg ="Login failed! Wrong password. ";

 }
  }else
       {
        $fmsg ="Login failed! email address does not exist.";
        }

       
    }
    else
    {
        $smsg ="<b>Customer authentication window.</b>";
    }}
?>
<!DOCTYPE html>
<html lang="en" class="bg-dark">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Optimal writers account</title>
    <link rel="stylesheet" href="css/chatapp.css">

    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/default.css" id="theme" rel="stylesheet">
</head>

<body class="bg-dark">
    
  <div class="about-area ptb--100">
        <div class="container">
               <div class="row d-flex flex-center">
                <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                   <div class="login-panel panel panel-default card">
                <div class="panel-heading text-center" style="background-color: transparent; color: #f2f2f2;"><i class="fa fa-arrow-right"> </i> Login to my writing account</div>
                <div class="panel-body">
                   <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
<?php } ?>  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<form action="" method="post">
                        <fieldset>
                            <div class="form-group">
               <input class="form-control" placeholder="Email address" name="email" type="text">
                            </div>
                            <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>
                           
                             <input type="submit" value="Login" class="btn btn-primary">
                            <!-- <a href="recoverPass.php"> Forgot password?</a> -->
                             <a href="../index.php"> go to site</a>
                         </fieldset>
                      </form></div>
            </div>
                </div>
            </div>
        </div>
    </div>
       