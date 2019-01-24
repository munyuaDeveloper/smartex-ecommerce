<?php
error_reporting(1);
 extract($_POST);
if($update){
  if (isset($_POST['specialization'])){
    if (isset($_REQUEST['specialization'])){
    $id = stripslashes($_REQUEST['id']);                                                        
    $id = mysqli_real_escape_string($con,$id);
    $name = stripslashes($_REQUEST['name']);                                                        
    $name = mysqli_real_escape_string($con,$name); 
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $password1 = stripslashes($_REQUEST['password1']);
    $password1 = mysqli_real_escape_string($con,$password1);
    $phone = mysqli_real_escape_string($con,$phone); 
    $phone = stripslashes($_REQUEST['phone']);
   

if ($password !== $password1)
{
$fmsg ="The passwords you entered do not match";
} else{
$query = "UPDATE writer SET name='$name', phone='$phone', email='$email', password='$password' WHERE id='$id'";



        $result = mysqli_query($con,$query);
               if($result){
          $smsg ="Writer updated successfully. Passworrd is $password";
          
        }
    else{
    }}}}}
?>
<?php include("header.php");?>
<?php include("sidebar.php");?>
 <div id="page-wrapper">
            <div class="container-fluid card">
                <div class="row bg-title card">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profile page</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Profile Page</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">

 <?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php } ?>  
<?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>

                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                        <a href="javascript:void(0)"><img src="plugins/images/users/genu.jpg" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white"><?php echo $name;?></h4>
                                        <h5 class="text-white"><?php echo $email;?></h5>
                                        <h4><?php echo $phone;?></h4> </div>
                                </div>
                            </div>

                
                            </div>
                        </div>


                    </div>
                    <div class="col-md-8 col-xs-12">
                        <form action="" method="post">
                                      <div class="user-btm-box">
                                
                                 <div class="form-group">
                                    <label class="col-md-12">Full Name</label>
                                    <div class="col-md-12">
                                        <input type="hidden" name="id" value="<?php echo $writer_id;?>">
                                        <input type="text" placeholder="Full name" required name="name" value="<?php echo $name;?>" class="form-control form-control-line"> </div>
                                </div>
                               
                               
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Phone number" required name="phone" value="<?php echo $phone;?>" class="form-control form-control-line"> </div>
                                </div>
                                 <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="Email address" required name="email" value="<?php echo $email;?>" class="form-control form-control-line" readonly> </div>
                                </div>

                                 <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" placeholder="Enter password" required name="password" value="<?php echo $password;?>" class="form-control form-control-line"> 
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" placeholder="Re-enter password" required name="password1" value="<?php echo $password;?>" class="form-control form-control-line"> 
                                    </div>
                                    <div class="col-md-6">
                                        <button class="btn btn-success">Update Profile</button>
                                    </div>
                                </div>




                    </div>
                </div>
                <!-- /.row -->
            </div>
             <?php mysqli_close($con); ?>
<?php include("footer.php");?>