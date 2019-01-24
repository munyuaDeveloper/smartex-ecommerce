<?php include("header.php");?>
<?php include("sidebar.php");?>
<?php include("database/db.php");?>
<?php 
error_reporting(1);
session_start();
  if (isset($_POST['amount'])){
    $amount = stripslashes($_REQUEST['amount']);
    $amount = mysqli_real_escape_string($con,$amount);
   
$query="UPDATE invoices SET status='Requesting' WHERE writer='$writer_id' AND status='Completed'";
$result = mysqli_query($con,$query);
$query="INSERT INTO my_invoice(writer, amount) VALUES('$writer_id', '$amount')";
$result = mysqli_query($con,$query);
}?>
<style type="text/css">
  .btn-right{
    float: right;
  }
   .nav-right li>b{
    width: 100%;
    text-align: left;
    font-weight: bold;
    margin-bottom: 5px;
    padding: 0 0 0 4px;

     }
  .nav-right li>b>i{
   font-weight: bold;
    float: right;
       }   
 .nav-right li>b>h5{
   font-weight: bold;
   float: left;
       }   
</style>
 <div id="page-wrapper">
            <div class="container-fluid card">
                <div class="row bg-title card">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h3 class="page-title text-dark">Transactions</h3> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Invoices</li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-10">
<h3>My invoices and status</h3>
<table class="table table-stripped bg-light">
    <thead style="font-size: 17px;">
      <tr>
        <th>#</th>
        <th>Invoice ID</th>
        <th>Order ID</th>
        <th>Date created</th>
        <th>Amount</th>
        <th>Status</th>
        
      </tr>
    </thead>
    <tbody>
      <?php $result = mysqli_query($con,"SELECT * FROM invoices WHERE writer = '$writer_id'");
      while($row = mysqli_fetch_array($result)) { 
        $i += 1;
        if ($row['status'] == 'Building') {
         $color = 'btn-primary';
        }elseif ($row['status'] == 'Completed') {
          $color = 'btn-success';
        }elseif ($row['status'] == 'Requesting') {
          $color = 'btn-info';
        }else{
           $color = 'btn-danger';
        }
        ?> 
                            
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['job']; ?></td>
        <td><?php echo $row['time']; ?></td>
        <td><?php echo $row['amount']; ?> <?php echo $row['currency']; ?></td>
        <td><button class="btn <?php echo $color; ?>"><?php echo $row['status']; ?> </button></td>
       
      </tr>
      <?php }?>
    </tbody>
  </table>
</div>
<div class="col-lg-2">
<h3>Summary</h3><hr>



<ul class="nav nav-right">
  <li></li>
<li><b class="btn bg-light"> <h5>Building</h5><i class="fa fa-money btn btn-primary"> <?php echo $num_building;?></i></b></li>
<li><b class="btn bg-light"> <h5>Confirmed</h5> <i class="fa fa-money btn btn-success"> <?php echo $num_ready;?></i></b> </li>
<li><b class="btn bg-light"> <h5>Failed</h5> <i class="fa fa-money btn btn-danger"> <?php echo $num_failed;?></i></b> </li>
<li data-toggle="modal" data-target="#view"><b class="btn bg-info"><h5>View invoice</h5> <i class="fa fa-money btn btn-info"></i></b></li>

  </ul>

</div></div>



     
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                  <div class="modal-body">

    <div class="bg-white invoice1">                        
                        <div class="body">
                            <div class="invoice-top clearfix">
                              <div class="row">
                              <div class="col-lg-7">
                <div class="info">
                <h2>Optimal Writers Limited</h2>
                 <p> <i class="fa fa-envelope"></i> info@optimalwriters.com <br>
                   <i class="fa fa-globe"></i> www.optimalwriters.com <br>
                     <i class="fa fa-globe"></i>  writersoptimal@gmail.com <br>
                     <i class="fa fa-phone"></i> +254700935525<br>
                                                        
                </p>
          </div>
                            </div><div class="col-lg-5">
                  <div class="title">
                                      <h2>Invoice #. <?php echo $row['id'];?></h2>
                                    <p>Created on: <?php echo $row['time'];?><br>
                                        Payment Due: <?php echo $due;?>


                                    </p>
                                </div>
                                </div></div>
                                
                               
                            </div>
                            <hr>

                            <div class="invoice-mid clearfix">
                      <div class="row">
                        <div class="col-lg-6">
                                <?php
                            $res = mysqli_query($con,"SELECT * FROM writer WHERE id='$writer_id'");
                                 while($row = mysqli_fetch_array($res)) { 
                                  ?>
                                <div class="info">
                                    <h3><?php echo $row['name'];?></h3>
                                    <p><?php echo $row['email'];?><br>
                                        <?php echo $row['phone'];}?></p>
                                    
                                      </div>   
                              
                            </div></div></div>
                            <div class="table-responsive">
         <h4>Invoice details</h4>                                                
      <table class="table" align="center">
        <tr>
          <th>#</th>
          <th>Order No</th>
          <th>Order title</th>
          <th>Amount claimed</th>
          <th>Date</th>
          </tr>
    

      <?php $result = mysqli_query($con,"SELECT * FROM invoices WHERE writer = '$writer_id' AND status='Completed'");
      while($row = mysqli_fetch_array($result)) { 
        $j += 1;
        $job = $row['job'];
        $amount = $row['amount'];
        $currency = $row['currency'];
        $time = $row['time'];
     $res = mysqli_query($con,"SELECT * FROM jobs WHERE id = '$job'");
      while($row = mysqli_fetch_array($res)) { $subject = $row['subject']; }?>
            <tr style="font-size: 12px;">
          <td><?php echo $j;?></td>
          <td><?php echo $job;?></td>
          <td><?php echo $subject;?></td>
          <td><?php echo $amount;?> <?php echo $currency;?></td>
          <td><?php echo $time;?></td>
          </tr>
        <?php } $result = mysqli_query($con,"SELECT SUM(amount) AS sumtotal FROM invoices WHERE writer='$writer_id' AND status='Completed'");
      while($row = mysqli_fetch_array($result)) {
        if (!$row['sumtotal']) {
          $row['sumtotal'] = 0;
         } ?>   </table>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-md-8">
                             <p>This invoice is prepared considering the terms and conditions of our agreement contract, and has not in any way been altered. Thank you for your continued patnership with us.</p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <p class="m-b-0"><b>Sub-total:</b> <?php echo $row['sumtotal'];?></p>
                                    
                                     <?php 
                                    $sumtotal = $row['sumtotal'];
                                    $deduction = $sumtotal * 6/100;
                                    $less_diductions = $sumtotal * (100-6)/100;
                                    ?>    
                                    <p class="m-b-0">Deductions 6.0%: <?php echo $deduction;?></p>                                   
                                    <h3 class="m-b-0 m-t-10"><?php echo $currency;?> <?php echo $less_diductions;?></h3>
                                </div>                                    
                                
                            </div>
                            <?php if($less_diductions >= 30){?>
                            <div class="row clearfix text-center">
 <form action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="amount" value="<?php echo $less_diductions; ?>">
          <input type="submit" value="Request Payment" class="btn btn-success">
        </form>

                            </div>
                            <?php }?>
                        </div>
                    </div>
<?php }?>
                                      </div></div></div></div>














 <?php mysqli_close($con); ?>
<?php include("footer.php");?>