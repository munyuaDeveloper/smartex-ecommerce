<?php include("header.php");?>
<?php include("sidebar.php");?>
<?php include("database/db.php");?>
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
                        <h3 class="page-title text-dark">My escalations</h3> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Orders in escalation </li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-10">
<h3>Escalated orders</h3>
<table class="table table-stripped bg-light">
    <thead style="font-size: 17px;">
      <tr>
        <th>#</th>
        <th>Order ID</th>
        <th>Subject</th>
        <th>Urgency</th>
        <th>Deadline</th>
        <th>Writing cost</th>
        <th>Due in</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php $result = mysqli_query($con,"SELECT * FROM user_job WHERE writer = '$writer_id' AND escalation !='0' AND status = 'Escalation'");
      while($row = mysqli_fetch_array($result)) { 
        $job = $row['job'];
        $amount =$row['amount'];
        $currency =$row['currency'];
        $user_job =$row['id'];
         $date =$row['date'];
          $deadline =$row['deadline'];
        $res = mysqli_query($con,"SELECT * FROM jobs WHERE id = '$job'");
      while($row = mysqli_fetch_array($res)) { 
       $i += 1;

        $date1=strtotime($deadline);
         $date2=strtotime($date);
        $due = ($date1 - $date2);

         $hrs = floor($due/3600);
        $mins = floor(($due/60)%60);
        $secs= $due % 60;
        
          if ($hrs <= '1') {  
            $btn = 'btn-danger';
          }?> 
                            
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['subject']; ?></td>
        <td><?php echo $row['urgency']; ?> hours</td>
       <td><?php echo $deadline; ?></td>
        <td><?php echo $currency; ?> <?php echo $amount; ?></td>
        <td><button class="btn <?php echo $btn;?>"><?php echo $hrs.'hrs '. $mins. 'mins '. $secs. 'secs'; ?></button></td>
        <td><a href="order-details.php?id=<?php echo $user_job; ?>"><button class="btn btn-info">View</button></a></td>
      </tr>
      <?php }}?>
    </tbody>
  </table>
</div>
<div class="col-lg-2">
<h3>Summary</h3><hr>



<ul class="nav nav-right">
  <li></li>
<li><b class="btn bg-light"> <h5>In progress</h5><i class="fa fa-shopping-cart btn btn-success"> 3</i></b></li>
<li><b class="btn bg-light"> <h5>Completed</h5> <i class="fa fa-shopping-cart btn btn-info"> 7</i></b> </li>
<li><b class="btn bg-light"> <h5>Failed</h5> <i class="fa fa-shopping-cart btn btn-danger"> 0</i></b> </li>

  </ul>

</div></div>
 <?php mysqli_close($con); ?>
<?php include("footer.php");?>