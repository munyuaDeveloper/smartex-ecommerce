    
<?php
session_start();
error_reporting(1);

include ("database/db3.php"); 
session_start();
if (isset($_POST['phone']) && isset($_POST['email'])){
    // if (isset($_POST['password'])){
      $email = stripslashes($_REQUEST['email']); 
      $email = mysqli_real_escape_string($con,$email); 
      $phone = stripslashes($_REQUEST['phone']);
      $phone = mysqli_real_escape_string($con,$phone);

      $query = "SELECT * FROM customer WHERE email='$email' AND phone='$phone'";
      $result = mysqli_query($con,$query) or die(mysqli_error());
      while($rows = mysqli_fetch_array($result)){
          $password = $rows['password'];
        }
        if ($password) {
          $pass =$password;
        }
        else{
            $fmsg ="Sorry! There is no record of customer with the details provided ";
        }
}
else{
  $smsg ="Please fill all the feilds and try again!</b>";
}
//}
?>
<?php include ("header.php"); ?>
<body>


<div class="row">
<div class="col-sm-2"> </div>

<div class="col-sm-8 body-content">  

<div class="row">
<div class="col-md-12 animate-box">
<div class="section-title">
<h2>Recover Password Here</h2>

</div>
<div class="row d-flex flex-center">
<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4 animate-box">
<div class="login-panel panel panel-default">
<div class="panel-heading text-center"><i class="fa fa-arrow-right"> </i> Recover Password Window</div>
<div class="panel-body">
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
<?php if(isset($pass)){ ?><div class="alert alert-danger" role="alert">Your Password is: <?php echo $pass; ?> </div><?php } ?>

    <form action="" method="post">
        <fieldset>
            <div class="form-group">
            <input class="form-control" placeholder="Email address" name="email" type="text" required>
            </div>
            <div class="form-group">
            <input class="form-control" placeholder="phone" name="phone" type="password" required>
            </div>

            <input type="submit" value="Recover Password" class="btn btn-primary">
           <button class="btn btn-sm btn-primary pull-right"><a href="login.php" style="text-decoration: none; color: #fff;">Login</></button>
        </fieldset>
        
    </form>
    <div style="color: green;">
      <p><a href="" data-toggle="modal" data-target=".modal">You don't have an account? Click here!</a></p>
    </div>
    
</div>
</div>
</div>
</div></div></div>
<?php include ("footer.php"); ?>
</div>
  <div class="modal fade" id="<?php echo $_GET['cart'];?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
             <div class="modal-header">
              <h4>Register Here!</h4>
             </div>
              <div class="modal-body" style="padding: 20px;">
                <div class="row">
                  <div class="col-sm-2">
                    
                  </div>
                  <div class="col-sm-8" style="background: #f2f2f2;">
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
                      <input type="submit" value="Register" name="register" class="btn-primary">
                    </form>
                  </div>
                  <div class="col-sm-2">
                    
                  </div>
                </div>

              </div>                                      
                <div class="modal-footer">
</div>


<div class="col-sm-2"></div> 
</body> 
</html>