    
<?php
session_start();
error_reporting(1);

include ("database/db3.php"); 
session_start();
if (isset($_POST['password']) && isset($_POST['email'])){
    // if (isset($_POST['password'])){
      $email = stripslashes($_REQUEST['email']); 
      $email = mysqli_real_escape_string($con,$email); 
      $password = stripslashes($_REQUEST['password']);
      $password = mysqli_real_escape_string($con,$password);

      $query = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
      $result = mysqli_query($con,$query) or die(mysqli_error());
      $rows = mysqli_num_rows($result);
      if($rows==1){
          // $query = "SELECT * FROM customer WHERE  email='$email' AND password='$password'";
          // $result = mysqli_query($con,$query) or die(mysqli_error());
          // $rows = mysqli_num_rows($result);
          // if($rows==1){
              $_SESSION['user_email'] = $email;
              Print '<script>window.location.assign("index.php");</script>';
        }
        else{
            $fmsg ="Login failed! Wrong password or email. ";
        }
      // }
      // else
      // {
      //   $fmsg ="Login failed! email address does not exist.";
      // }
}
else{
  $smsg ="<b>Customer authentication window.</b>";
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
<h2>Account login</h2>

</div>
<div class="row d-flex flex-center">
<div class="col-sm-3"></div>
<div class="col-sm-6 animate-box">
<div class="login-panel panel panel-default">
<div class="panel-heading text-center"><i class="fa fa-arrow-right"> </i> Login to portal</div>
<div class="panel-body">
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
    <form action="" method="post">
        <fieldset>
            <div class="form-group">
            <input class="form-control" placeholder="Email address" name="email" type="text" required>
            </div>
            <div class="form-group">
            <input class="form-control" placeholder="Password" name="password" type="password" required>
            </div>

            <input type="submit" value="Login" class="btn btn-primary">
            <a href="recoverPass.php"> Forgot password?</a>
        </fieldset>
    </form>
    <h5><a href="register.php">You don't have an account? Click here!</a></h5>
</div>
</div>
</div>
</div></div></div>
<?php include ("footer.php"); ?>
</div>

</div>


<div class="col-sm-2"></div> 


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
                <div class="col-lg-9">
                 
                </div>
                 
                   <div class="col-lg-3">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
  </div>
</body> 
</html>
