
    
<?php
session_start();
error_reporting(1);
include ("database/db3.php"); 

// if (@!$_SESSION['user_email']) {
//   echo"<script>alert('You have to login to access this page!!!!')</script>";
//   echo"<script>window.open('login.php','_self')</script>";
//   die();
//}
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
      $result = mysqli_query($con,$query); 
    }
    $result = mysqli_query($con,"SELECT * FROM customer WHERE email='$email'");
    while($row = mysqli_fetch_array($result)) { 
      $customer = $row['id'];
    }
    $query = "UPDATE orders SET customer='$customer' WHERE cart='{$_GET['cart']}'";
    $result = mysqli_query($con,$query);
    unset($_SESSION['cart_number']);
    $_SESSION['user_email'] = $email;
    $query = "UPDATE page_visits SET payment=payment + 1 WHERE id='1'";
    $result = mysqli_query($con,$query);
    Print '<script>window.location.assign("congratulations.php");</script>';
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
    <div class="col-sm-2">
      
    </div>
      <div class="col-sm-8 body-content">  
        <div class="">
            <div class="row">
                 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div>
                  <?php } ?>  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
           <h3>
             <div class="col-md-9">
              Riview and checkout<?php $_SESSION['user_email']?></div><div class="col-md-3"><a href="index.php">
              <button class="btn btn-primary btn-outline" style="padding: 4px;"><i class="fa fa-plus"></i> Add new</button></a>
            </div>
          </h3>
          This is your shopping basket, you can add items, edit or remove from your basket then checkout to complete your order. 
          </div>
          <table class="table-striped table animate-box">
            <tr style="background-color: #5a10fb; color: #fff; border-radius: 8px;">
              <th>#</th>
              <th>Item</th>
              <th>Category</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Action</th>
            </tr>
          <?php
          error_reporting(1);
           $result = mysqli_query($con,"SELECT * FROM orders WHERE cart='{$_GET['cart']}'");
           while($row = mysqli_fetch_array($result)) {
            $i += 1; 
             $rest = mysqli_query($con,"SELECT * FROM items WHERE id='{$row['item']}'");
           while($rows = mysqli_fetch_array($rest)) {
             $rest = mysqli_query($con,"SELECT * FROM categories WHERE id='{$rows['category']}'");
           while($rowc = mysqli_fetch_array($rest)) {
                 ?>
          <tr>
            <td style="width: 10px;"><?php echo $i;?></td>
            <td><?php echo $rows['name'];?></td>
            <td><?php echo $rowc['name'];?></td>
            <td>Naira: <?php echo $rows['price'];?></td>
            <td><?php echo $row['quantity'];?></td>
            <td>Naira: <?php echo $rows['price'] * $row['quantity'];?></td>
            <td style="font-size: 13px;">
              <a href="delitem.php?item=<?php echo $rows['id'];?>&cart=<?php echo $_SESSION['cart_number'];?>" class="btn btn-warning"><i class="fa fa-remove"></i>Remove </a>
            </td> 
          </tr>
          <?php }}}?>
        </table>
        <hr style="border: solid 1px #5a10fb; margin: 0;" class="animate-box">
        <div class="text-right animate-box" style="margin-top: 5px;"><a href="delcart.php?cart=<?php echo $_SESSION['cart_number'];?>">
         <button class="btn btn-danger" style="padding: 7px;"><i class="fa fa-trash"></i> Empty cart</button>
      </a></div>

      <div class="row animate-box">
          <!-- <div class="col-md-12 btn-warning text-center">
              Order Summary
          </div> -->
         
      <div class="col-md-9"></div>
        <div class="col-md-3 text-right" style="margin-top: 5px;">
          <button class="btn btn-success"  data-toggle="modal" data-target="#<?php echo $_GET['cart'];?>"><i class="fa fa-shopping-cart"></i> Checkout</button><br>
          Finish order 
        </div>
      </div>
    </div>
       <?php mysqli_close($con); ?>
       <?php include ("footer.php"); ?>
    </div>
  </div>
  </div>
  <div class="col-sm-2"></div> 
</body> 
</html>


<div class="modal fade" id="<?php echo $_GET['cart'];?>" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <h4>Payment details</h4>
     </div>
        <div class="modal-body" style="padding: 20px;">
          <div class="row">
          <div class="col-sm-6">
            <h4>Use Paypal</h4>
            <p>
              <img src="icon/payment-methods.png">
            </p>
            <form action="" method="post">
              Email address
              <input type="text" name="email" class="form-control" placeholder="Email address" required>
              Password
              <input type="password" name="password" class="form-control" placeholder="Password" required><br>
              <input type="submit" value="Login" class="" name="login">
            </form>
          </div>
          <div class="col-sm-6" style="background: #f2f2f2;">
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
        </div>
      </div>                                      
    <div class="modal-footer">
      <div class="col-lg-9"></div>
        <div class="col-lg-3">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>