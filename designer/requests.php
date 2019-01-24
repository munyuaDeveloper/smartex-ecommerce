<?php include("header.php");?>
<?php include("sidebar.php");?>
<?php include("database/db.php");?>
<?php 
error_reporting(1);
session_start();
 include ("database/db.php"); 
 if (isset($_POST['user']) && isset($_POST['job'])){
    $user = stripslashes($_REQUEST['user']);
    $user = mysqli_real_escape_string($con,$user);
    $job = stripslashes($_REQUEST['job']);
    $job = mysqli_real_escape_string($con,$job);
    $writer = stripslashes($_REQUEST['writer']); 
    $writer = mysqli_real_escape_string($con,$writer); 
    $amount = stripslashes($_REQUEST['amount']); 
    $amount = mysqli_real_escape_string($con,$amount);
    $currency = stripslashes($_REQUEST['currency']); 
    $currency = mysqli_real_escape_string($con,$currency);
   
     $query = "SELECT * FROM bidders WHERE writer='$writer' AND job='$job'";
    $result = mysqli_query($con,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows!=0){
          Print '<script>alert("Error! You are allowed to bid one job once!");</script>';
        }else{
$query="INSERT INTO bidders(writer, user, job, currency, amount) VALUES('$writer', '$user', '$job', '$currency', '$amount')";
$result = mysqli_query($con,$query);
$query="UPDATE jobs SET status='Bidding' WHERE id='$job'";
$result = mysqli_query($con,$query);
if ($result) { 
  $query="INSERT INTO chat(message, user, name, date, destination, writer) VALUES('A writer of ID $writer requests to take your assignment at $currency $amount. Follow this link to grant the writer approval to start writing. <a href=order_details.php?user=$user&id=$job>Here</a>', '$user', '', now(), 'user', '$writer')";
        $result = mysqli_query($con,$query); 
}}} ?>


<style type="text/css">
  .detail-order{
    border-bottom: solid 1px silver;
    width: 100%;
  }
</style>
 <div id="page-wrapper">
            <div class="container-fluid card">
                <div class="row bg-title card">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h2 class="page-title text-dark">Design requests</h2> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    </div>
                </div>

<div class="row">

<div class="col-lg-12 bg"> 
  <table class="table table-stripped bg-light">
    <thead style="font-size: 17px;">
      <tr>
        <th>#</th>
        <th>Item name</th>
        <th>Category</th>
        <th>Image</th>
        <th>Unit price</th>
        <th>Quantity</th>
        <th>Total price</th>
        <th>Customer</th>
        <th>Phone number</th>
        <th>Date of order</th>
      </tr>
    </thead>
    <tbody>
    <?php $result = mysqli_query($con,"SELECT * FROM orders");
      while($row = mysqli_fetch_array($result)) { 
      
       $relsts = mysqli_query($con,"SELECT * FROM items WHERE id = '{$row['item']}'");
      while($rowi = mysqli_fetch_array($relsts)) { 

        $rest = mysqli_query($con,"SELECT * FROM categories WHERE id = '{$rowi['category']}'");
      while($rowc = mysqli_fetch_array($rest)) { 

      $rest = mysqli_query($con,"SELECT * FROM customer WHERE id = '{$row['customer']}'");
      while($rowcu = mysqli_fetch_array($rest)) { 
       $i += 1;
       ?> 
                            
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $rowi['name']; ?></td>
        <td><?php echo $rowc['name']; ?></td>
        <td><img src="../files/<?php echo $rowi['image']; ?>" width="30"></td>
        <td><?php echo $rowi['price']; ?></td>
        <td><?php echo $row['quantity'];?></td>
        <td><?php echo $rowi['price'] * $row['quantity']; ?></td>
        <td><?php echo $rowcu['names']; ?></td>
       <td><?php echo $rowcu['phone']; ?></td>
       <td><?php echo $row['date']; ?></td>
      </tr>
      <?php }}}}?>
    </tbody>
  </table>



 <?php $result = mysqli_query($con,"SELECT * FROM jobs");
      while($row = mysqli_fetch_array($result)) { 
       $i += 1;?> 

<div class="modal fade" id="order<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                      <h2>View order: <?php echo $row['subject']; ?></h2>
                                      </div>  
                                      <div class="modal-body">
                                        <div class="row">
                                       <div class="col-lg-8">
                                        <h5 class="detail-order col-lg-12"> Order subject: <?php echo $row['subject']; ?></h5><br>
                                        <h5 class="detail-order col-lg-12"> Ordered on: <?php echo $row['time']; ?></h5><br>
                                        <h5 class="detail-order col-lg-12"> Urgency: <?php echo $row['urgency']; ?> hours</h5><br>
                                        <h5 class="detail-order col-lg-12"> Deadline: <?php echo $row['deadline']; ?></h5><br>
                                        <h5 class="detail-order col-lg-12"> Amount set: <?php echo $row['currency']; ?> <?php echo $row['admin_amount']; ?></h5></div></div>
                                    <div class="row">
                                      <div class="col-lg-12">
                                         <h4>Description</h4>
                                        <?php echo $row['description']; ?>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-12">
                                        <h4>Attachments</h4>
                          <?php if ($row['name'] != 'null') {?>
                           <a href="files/<?php echo $row['name']; ?>" target="_blank"><?php echo $row['name']; ?></a>
                          <?php }?>  <?php if ($row['name1'] != 'null') {?>
                   <br><a href="files/<?php echo $row['name1']; ?>" target="_blank"><?php echo $row['name1']; ?></a> 
                          <?php }?>  <?php if ($row['name2'] != 'null') {?>
                   <br><a href="files/<?php echo $row['name2']; ?>" target="_blank"><?php echo $row['name2']; ?></a> 
                          <?php }?>


                                      </div></div>
                                    <div class="row">
                                      <div class="col-lg-3">
            <button class="btn btn-info" data-toggle="collapse" href="#bid<?php echo $row['id']; ?>">Bid</button>
                                        </div><div class="col-lg-9 children collapse panel-body" id="bid<?php echo $row['id']; ?>">         
             
         <form action="" method="post">
          <input type="hidden" name="writer" value="<?php echo $writer_id; ?>">
           <input type="hidden" name="user" value="<?php echo $row['user']; ?>">
           <input type="hidden" name="job" value="<?php echo $row['id']; ?>">
           <div class="row">
                  <div class="col-sm-3 select">
            <select name="currency" class="form-control " >
               <option value="USD">  USD </option>
               </select>
      </div>
         <div class="col-sm-6"> 
           <input type="number" name="amount" class="form-control" placeholder="Enter amount">

      </div>
       <div class="col-sm-3">
        <input type="submit" value="Respond" class="btn btn-success">
     
    </div></div>
           </form>

                 
     
                                        </div></div>
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
 <?php }?>

</div>

<script src="js/libscripts.bundle.js"></script>    
<script src="js/bootstrap-tagsinput.js"></script> 
<?php include("footer.php");?>