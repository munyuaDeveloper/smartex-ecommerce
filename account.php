
    
<?php
session_start();
error_reporting(1);
include ("database/db3.php"); 
if (@!$_SESSION['user_email']) {
  echo"<script>alert('You have to login to access this page!!!!')</script>";
  echo"<script>window.open('login.php','_self')</script>";
  die();
}
?>
<?php include ("header.php"); ?>

<body>
  
  <div class="row">
<div class="col-sm-2"> </div>

<div class="col-sm-8 body-content">  

<div class="row">
<div class="col-md-12 animate-box">
<div class="section-title">
<h2>My Account!</h2>

</div>
<div class="row d-flex flex-center">
<div class="col-xs-12 animate-box">
<div class="login-panel panel panel-default">

<div class="panel-body">
    <div class="row">
          <div class="col-sm-12" style="background: #f2f2f2;">
           <?php include ("database/db3.php"); 
           $email = $_SESSION['user_email'];
              $result = mysqli_query($con,"SELECT * FROM  customer where email='$email'");
              
              ?>
              
            <table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
                  <thead>
                      <tr>
                          <th>Full name</th>
                          <th>Email address</th>
                          <th>Phone number</th>
                          <th>Date registered</th>
                          <th>Order ID</th>
                          <th>Quantity</th>
                          <th>Date</th>
                     </tr>
                  </thead>
                  <tbody>
                   <?php while($row = mysqli_fetch_array($result)) {?>
                      <tr class="odd gradeX">
                          <?php $id=$row['id'];?>
                          <td><?php echo $row['names'];?></td>
                          <td><?php echo $row['email'];?></td>
                           <td><?php echo $row['phone'];?></td>
                           <td><?php echo $row['date'];?></td>
                           <?php }?>
                           <?php $order = mysqli_query($con,"SELECT * FROM  orders where customer='$id'");?>
                           <?php while($row = mysqli_fetch_assoc($order)) {
                            $order_id = $row['cart'];
                            $items = $row['quantity'];
                            $date = $row['date'];
                            }?>
                           <td><?php echo $order_id; ?></td>
                           <td><?php echo $items; ?></td>
                           <td><?php echo $date; ?></td>
                           </tr>
                        </tbody>

                    </table>
               </table>
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
  
</body> 
</html>