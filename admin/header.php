
<?php
error_reporting(1);
   session_start();
   if(!$_SESSION['email']){ 
    Print '<script>alert("You need to be logged in first!");</script>';
           $URL="login.php";
  echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
   }  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="image/favicon.png" type="image/png">
    <title>Smartex ecommerce shop</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    
    </head>
<body>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>Administrator</span></a>
                <ul class="nav navbar-top-links navbar-right">
                    <!-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#"> <em class="fa fa-user-md"></em>
                    </a>
                      
                    </li> -->
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                       <em class="fa fa-power-off"></em>
                    </a>
                        <ul class="dropdown-menu">
                               <li><a href="logout.php"> <em class="fa fa-power-off"></em> Logout </a></li>
                               <li><a href="../index.php"> <em class="fa fa-eye"></em>Visit Site </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>


