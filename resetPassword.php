
<?php
   session_start();
   if($_SESSION['email']){ 
   }
   else{
  Print '<script>alert("You need to be logged in first!");</script>';
           $URL="../login.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   }
   $email = $_SESSION['email']; 

   ?>

<?php
  include ("database/db.php"); 
   if (isset($_POST['password']) && isset($_POST['newpassword'])){
    if (isset($_POST['password'])){
     $newpassword1 = stripslashes($_REQUEST['newpassword1']); 
    $newpassword1 = mysqli_real_escape_string($con,$newpassword1); 
    $newpassword = stripslashes($_REQUEST['newpassword']); 
    $newpassword = mysqli_real_escape_string($con,$newpassword); 
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
   $query = "SELECT * FROM users WHERE email='{$_SESSION['email']}' AND password = '$password'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){

 if ($newpassword == $newpassword1) {
    $query = "UPDATE users SET password='$newpassword' WHERE email='{$_SESSION['email']}'";
   $result = mysqli_query($con,$query);
   Print '<script>window.location.assign("../portal/");</script>';
   }else{
   	$fmsg ="The new passwords you provided does not match!";
   }

}else{
$fmsg ="The old password you entered is incorrect!";
}
    }}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Kakai Softwares Limited - Portal</title>

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

<body class="fix-header">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header" style="background-color: #3c4451;">
                <div class="top-left-part" style="border-radius: 30px; background-color: silver;">
                   
                    <a class="logo" href="index.php">
                                       
                        <img src="plugins/images/admin-logo-dark.png" alt="home"/>
                     </a>
               
                </div>
                   <ul class="nav navbar-top-links navbar-right pull-right">
                     <li>
                       <a href="chats.php">
                        <i class="fa fa-comments fa-fw text-white" aria-hidden="true"></i>
                      
                    </a>
                    </li>
                    <li>
                      <a href="#">
                     <i class="fa fa-shopping-cart fa-fw text-white" aria-hidden="true"></i>
                        </a>
                   </li>
                    <li>

                      <a href="#">
                      <i class="fa fa-tasks fa-fw text-white" aria-hidden="true"></i>
                   </a>
                   </li>
                     <li>

                     <a href="#">
                      <i class="fa fa-money fa-fw text-white" aria-hidden="true"></i>
                    </a>
                              </li>
                     <li>
                     <a href="logout.php">  
                      <i class="fa fa-power-off fa-fw text-white" aria-hidden="true"></i></a>
                    </li>
                  
                    <li>
                        <a class="profile-pic" href="profile.php"> <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"></b></a>
                    </li>
                </ul>
            </div>
            
        </nav>


<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 animate-box">

<div class="login-panel panel panel-default">
                <div class="panel-heading text-center"><i class="icon-arrow-right-outline"> </i> Please change your password</div>
                <div class="panel-body">
                   <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
<?php } ?>  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<form action="" method="post">
                        <fieldset>
                        	   <div class="form-group">
                              Old password
               <input class="form-control" placeholder="Old password" name="password" value="askme" type="password">
                            </div>
                            <div class="form-group">
                              New password
               <input class="form-control" placeholder="New password" name="newpassword" type="password">
                            </div>
                            <div class="form-group">
                              Confirm new password
                <input class="form-control" placeholder="Confirm new password" name="newpassword1" type="password">
                            </div>
                           
                             <input type="submit" value="Change password" class="btn btn-success col-xs-12">
                                             </fieldset>
                    </form></div>
            </div>
</div>
<?php include("footer.php");?>