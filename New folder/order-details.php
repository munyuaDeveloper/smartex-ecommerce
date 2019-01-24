<?php include("header.php");?>
<?php include("sidebar.php");?>
<?php include("database/db.php");?>
<?php
error_reporting(1);
 include ("database/db.php");
 extract($_POST);
$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($upd){
 if (isset($_POST['title']) && isset($_POST['user_job'])){
    if (isset($_REQUEST['title'])){
    $user = stripslashes($_REQUEST['user']); 
    $user = mysqli_real_escape_string($con,$user); 
    $user_job = stripslashes($_REQUEST['user_job']); 
    $user_job = mysqli_real_escape_string($con,$user_job); 
    $job = stripslashes($_REQUEST['job']); 
    $job = mysqli_real_escape_string($con,$job); 
    $title = stripslashes($_REQUEST['title']); 
    $title = mysqli_real_escape_string($con,$title); 
    $file_path= stripslashes($_FILES['fileToUpload']['name']);
    $temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename = round(microtime(true)).'.'.end($temp);

   $query="INSERT INTO project_files(title, user, name, writer, user_job, job) VALUES('$title', '$user', '$newfilename', '$writer_id', '$user_job', '$job')";
        $result = mysqli_query($con,$query);        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "files/".$newfilename);
    $query = "UPDATE user_job SET status='Submitting' WHERE job ='$job'";
     $result = mysqli_query($con,$query);        
          if($result){
       // Print '<script>alert("Error! Failed to upload!");</script>'; 
        }}}}?>
<?php $user_job = $_GET['id'];
 $result = mysqli_query($con,"SELECT * FROM user_job WHERE id ='$user_job'");
      while($row = mysqli_fetch_array($result)) { 
        $job = $row['job'];
        $amount =$row['amount'];
        $currency =$row['currency'];
        $user_job =$row['id'];
        $user =$row['user'];
        $date = date('Y-m-d H:i:s');
        $deadline =$row['deadline'];
$date1=strtotime($deadline);
         $date2=strtotime($date);
        $due = ($date1 - $date2);

         $hrs = floor($due/3600);
        $mins = floor(($due/60)%60);
        $secs= $due % 60;
        
          if ($hrs <= '1') {  
            $btn = 'btn-danger';
          }else{
            $btn = 'btn-info';
          }
        }$res = mysqli_query($con,"SELECT * FROM jobs WHERE id = '$job'");
      while($row = mysqli_fetch_array($res)) { 
$subject =$row['subject'];
        $time =$row['time'];
         $name =$row['name'];
          $name1 =$row['name1'];
           $name2 =$row['name2'];
        $urgency =$row['urgency'];
        $description =$row['description'];
       }?> 
<style type="text/css">
  .table-data tr>td>b{
    font-size: 18px;
    font-weight: bold;
    color: #000;
  }
</style>
 <div id="page-wrapper">
            <div class="container-fluid card">
                <div class="row bg-title card">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h3 class="page-title text-dark">My Orders</h3> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">My Orders</li>
                        </ol>
                    </div>
                </div>
<div class="row">
<div class="col-lg-12">
<h3>View order details</h3>

<div class="row">
<div class="col-lg-5">
<table class="table table-data">
  <tr><td><b>Subject:</b></td><td><?php echo $subject; ?></td></tr>
  <tr> <td><b>Price:</b></td><td><?php echo $amount; ?> <?php echo $currency; ?></td></tr>
  <tr> <td><b>Order date:</b></td><td><?php echo $time; ?></td></tr>
  <tr><td><b>Urgency:</b></td><td><?php echo $urgency; ?> hours</td></tr>
  <tr> <td><b>Date to submit:</b></td><td><?php echo $deadline; ?></td></tr>
  <tr> <td><b>Remaining time:</b></td><td><?php echo $hrs.'hrs '. $mins. 'mins '. $secs. 'secs'; ?></td></tr>
  <tr> <td><b>Attached files:</b></td><td>
      <?php if ($name != 'null') {?>
               <a href="files/<?php echo $name; ?>" target="_blank"><?php echo $name; ?></a>
              <?php }?>  <?php if ($name1 != 'null') {?>
       <br><a href="files/<?php echo $name1; ?>" target="_blank"><?php echo $name1; ?></a> 
              <?php }?>  <?php if ($name2 != 'null') {?>
       <br><a href="files/<?php echo $name2; ?>" target="_blank"><?php echo $name2; ?></a> 
            <?php }?>
  </td></tr>
</table>
</div><div class="col-lg-7">
 <div class="btn <?php echo $btn;?> col-xs-12">This order will be due in <?php echo $hrs.'hrs '. $mins. 'mins '. $secs. 'secs'; ?></div>

  <div class="col-xs-12 bg-light">
  <h4>Order description</h4>
  <?php echo $description; ?>
 </div>
 <h4>Submit your work</h4>
<div class="row">
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="user" value="<?php echo $user; ?>">
      <input type="hidden" name="job" value="<?php echo $job; ?>">
      
        <input type="hidden" name="user_job" value="<?php echo $user_job; ?>">
    <div class="row col-xs-12">
    <div class="col-lg-6">
    <input type="text" name="title" class="form-control" placeholder="File title" required>
  </div><div class="col-lg-5">
    <input type="file" name="fileToUpload" class="form-control" required>
  </div><div class="col-lg-1">
    <input type="submit" value="Save" name="upd" class="btn btn-success">
  </div></div>
    
  </form>
</div>

<table class="table bg-light">
  <tr style="font-size: 18px;">
    <th>#</th>
    <th>File title</th>
    <th>File</th>
    <th>Date</th>
    <th>Download</th>
  </tr>
   <?php $result = mysqli_query($con,"SELECT * FROM project_files WHERE job = '$job'");
      while($row = mysqli_fetch_array($result)) {  $i += 1;
        $user_job = $row['user_job'];
        $title = $row['title'];
        $name = $row['name'];
       $date = $row['date'];
      $res = mysqli_query($con,"SELECT * FROM user_job WHERE id = '$user_job'");
      while($row = mysqli_fetch_array($res)) { 
        if ($row['status'] == 'Escalation') {
         $color = 'bg-inverse';
        }
        ?>
    <tr class="<?php echo $color;?>">
    <td><?php echo $i; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $name; ?></td>
     <td><?php echo $date; ?></td>
    <td><a href="files/<?php echo $name; ?>" download>Download</a></td>
  </tr>
  <?php }}?>
</table>
</div></div>
</div>
</div>
 <?php mysqli_close($con); ?>
<?php include("footer.php");?>