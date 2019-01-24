<?php
error_reporting(1);
   session_start();
   if($_SESSION['writer_email']){ 
   }else{
  Print '<script>alert("You need to be logged in first!");</script>';
           $URL="login.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   } $email = $_SESSION['writer_email']; 
   ?>

<?php
  include ("database/db.php"); 
   $result = mysqli_query($con,"SELECT * FROM writer WHERE email='{$_SESSION['writer_email']}'");
 while($row = mysqli_fetch_array($result)) {
  $writer_id = $row['id'];
    $email = $row['email'];
    $name = $row['name'];
    $phone = $row['phone'];
    $password = $row['password'];
    $specialization_id = $row['specialization'];
     $specialization_id1 = $row['specialization1'];
      $specialization_id2 = $row['specialization2'];
       $specialization_id3 = $row['specialization3'];
        $specialization_id4 = $row['specialization4'];
        $writer_status = $row['status'];
if ($row['password'] == 'askme') {
   Print '<script>alert("Hello, you need to reset your password to continue!");</script>';
    $URL="reset-password.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
} }?>
 
<?php $result = mysqli_query($con,"SELECT * FROM orders WHERE user='$users_id' ORDER BY id DESC LIMIT 1");
     while($row = mysqli_fetch_array($result)) {
      $orders_id = $row['id'];
      $item = $row['item'];
      $cart = $row['cart'];
      $package = $row['package'];
     }$result = mysqli_query($con,"SELECT * FROM projects WHERE users_id='$users_id'");
      while($row = mysqli_fetch_array($result)) {
        
      $projects_id = $row['id'];
      $project_name = $row['name'];
      }
       $result = mysqli_query($con,"SELECT * FROM specialization WHERE id='$specialization_id'");
 while($row = mysqli_fetch_array($result)) { 
$specialization = $row['name'];
 }
  $result = mysqli_query($con,"SELECT * FROM specialization WHERE id='$specialization_id1'");
 while($row = mysqli_fetch_array($result)) { 
$specialization1 = $row['name'];
 }
  $result = mysqli_query($con,"SELECT * FROM specialization WHERE id='$specialization_id2'");
 while($row = mysqli_fetch_array($result)) { 
$specialization2 = $row['name'];
 }
  $result = mysqli_query($con,"SELECT * FROM specialization WHERE id='$specialization_id3'");
 while($row = mysqli_fetch_array($result)) { 
$specialization3 = $row['name'];
 }
  $result = mysqli_query($con,"SELECT * FROM specialization WHERE id='$specialization_id4'");
 while($row = mysqli_fetch_array($result)) { 
$specialization4 = $row['name'];
 } ?>
      <?php 
$result = mysqli_query($con,"SELECT * FROM user_job WHERE writer = '$writer_id' AND status='Ongoing'");
$num_orders = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM jobs WHERE (subject = '$specialization' OR subject = '$specialization1' OR subject = '$specialization2' OR subject = '$specialization3' OR subject = '$specialization4') AND (status = 'Bidding' OR status='Posted')");
$num_assignments = mysqli_num_rows($result);
$result=mysqli_query($con,"SELECT * FROM user_job WHERE user='$writer_id' AND status='Escalation' AND escalation!='0'");
$num_escalations = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM user_job WHERE status = 'Completed' AND writer = '$writer_id'");
$num_completed = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM invoices WHERE writer='$writer_id' AND status='Building'");
$num_building = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM invoices WHERE writer='$writer_id' AND status='Completed'");
$num_ready = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM invoices WHERE writer='$writer_id' AND status='Failed'");
$num_failed = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM chat WHERE writer='$writer_id' AND status='Pending'");
$num_chat = mysqli_num_rows($result);
$result = mysqli_query($con,"SELECT * FROM feedback WHERE writer='$writer_id'");
$num_feedback = mysqli_num_rows($result);
?>   
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/admin-logo-dark.png">
    <title>Smartex designers</title>
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

<body class="fix-header card">
    
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header" style="background-color: #3c4451;">
              <div class="row">
                <div class="col-sm-2">
                 <div class="top-left-part" style="border-radius: 30px; background-color: silver;">
                   
                    <a class="logo" href="index.php">
                                       
                        <img src="plugins/images/admin-logo-dark.png" style="width: 40px;" alt="home"/>
                     </a>
               
                </div></div>
                <div class="col-sm-8" style="padding-left: 30px;">
                   <ul class="nav navbar-top-links navbar-left pull-left" id="top-menu">
                     <li>
                       <a href="index.php">
                        <i class="fa fa-home fa-fw" aria-hidden="true"></i>Dashboard
                        </a>
                    </li>
                   
                   <li>

                    <a href="profile.php">   
                      <i class="fa fa-user fa-fw" aria-hidden="true"></i> My profile
                        </a>
                    </li>
                    
                    </ul>
              </div><div class="col-sm-2">

                   <ul class="nav navbar-top-links navbar-right pull-right">
                     
                    <li> <A HREF="javascript:history.go(0)"><i class="fa fa-refresh"></i></A></li>
                    
                      <li>
                     <a href="logout.php">  
                      <i class="fa fa-arrow-left fa-fw text-white" aria-hidden="true"></i> Logout</a>
                    </li>
                  
                   
                </ul>
              </div></div>
            </div>
            
        </nav>