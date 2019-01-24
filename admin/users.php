 <?php
 include ("db.php");
 if (isset($_POST['email']) && isset($_POST['firstname'])){
    if (isset($_REQUEST['email'])){
    $id = stripslashes($_REQUEST['id']); 
    $id = mysqli_real_escape_string($con,$id); 
    $firstname = stripslashes($_REQUEST['firstname']); 
    $firstname = mysqli_real_escape_string($con,$firstname); 
    $middlename = stripslashes($_REQUEST['middlename']);
    $middlename = mysqli_real_escape_string($con,$middlename);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($con,$lastname);
     $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
     $county = stripslashes($_REQUEST['county']); 
    $county = mysqli_real_escape_string($con,$county); 
     $homechurch = stripslashes($_REQUEST['homechurch']); 
    $homechurch = mysqli_real_escape_string($con,$homechurch); 
     $phone = stripslashes($_REQUEST['phone']); 
    $phone = mysqli_real_escape_string($con,$phone); 
    $gender = stripslashes($_REQUEST['gender']); 
    $gender = mysqli_real_escape_string($con,$gender); 

    if ($id==null) {    	
        $result = mysqli_query($con,"SELECT * FROM registration_details WHERE phone='$phone' || email='$email'");
  $num_rows = mysqli_num_rows($result);
  if($num_rows !== 0){
     Print '<script>alert("Error! This person already exists in the records!");</script>'; 
}


else{    
$query = "INSERT INTO registration_details (firstname, middlename, lastname, email, phone, homechurch, county, gender, date) VALUES ('$firstname', '$middlename', '$lastname', '$email', '$phone', '$homechurch', '$county', '$gender', now())";
        $result = mysqli_query($con,$query);
       
        if($result){
          Print '<script>alert("You have been added successfully registered!");</script>';   
        }
    else{
        Print '<script>alert("Error! Registration failed!");</script>'; 
        }

}}else{
$query = "UPDATE registration_details SET firstname='$firstname', middlename='$middlename', lastname='$lastname', email='$email', phone='$phone', homechurch='$homechurch', county='$county', gender='$gender' WHERE id='$id'";
        $result = mysqli_query($con,$query);
         if($result){
          Print '<script>alert("Your details have been successfully updated!");</script>';   
        }
    else{
        Print '<script>alert("Error! Update failed!");</script>'; 
        }

}}}
?>
 <?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-users"></em>
                </a></li>
                <li class="active">Users</li>
            </ol>
        </div><!--/.row-->
<div class="panel panel-primary">
                    <div class="panel-heading" style="height: 35px; padding: 0 40px;">
                    <div> View users </div> 
                        </div>
                    <div class="panel-body">
        
                <div class="panel panel-container">

                      <?php include ("db.php"); 
                            $result = mysqli_query($con,"SELECT * FROM  customer");?>
                          <table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Full name</th>
                                        <th>Email address</th>
                                        <th>Phone number</th>
                                        <th>Date registered</th>
                                        <th>Options</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 <?php while($row = mysqli_fetch_array($result)) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['names'];?></td>
                                        <td><?php echo $row['email'];?></td>
                                         <td><?php echo $row['phone'];?></td>
                                         <td><?php echo $row['date'];?></td>
                                        <td>
                                         <!--  <em class="fa fa-eye" data-target="#viewmember<?php echo $row['id'];?>" href="#" data-toggle="modal"></em></em> |
                                  <em class="fa fa-edit" data-target="#editmember<?php echo $row['id'];?>" href="#" data-toggle="modal"></em> | --> 
                                <a href="php/delmember.php?id=<?php echo $row['id'];?>"><em class="fa fa-trash"></em></a>
                                        </td>
                                         </tr><?php } ?>
                                      </tbody></table>
                                    


    </table>



        </div></div></div>

</div>
 <div id="newmember" class="modal fade row" tabindex="-1" role="form"
     aria-labelledby="newmember" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

              <b style="margin: auto;">New member</b>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">X</button><br>
               
            </div>
              <div class="modal-body">
                           <form method="post" action="">
    <div class="row">
 <div class="col-md-4">First name:</div> <div class="col-md-8"> 
 	<input type="hidden" name="id">
 	<input type="text" class="form-control" required name="firstname"> </div> </div><br>
   <div class="row">
 <div class="col-md-4">Midle name:</div> <div class="col-md-8"> <input required class="form-control" type="text" name="middlename"></div></div><br>
   <div class="row">
 <div class="col-md-4">Last name:</div> <div class="col-md-8">  <input required class="form-control" type="text" name="lastname"> </div></div><br>
   <div class="row">
 <div class="col-md-4">Email:</div> <div class="col-md-8"> <input required class="form-control" type="email" name="email">  </div></div><br>
   <div class="row">
 <div class="col-md-4">Phone:</div> <div class="col-md-8">  <input required class="form-control" type="number" name="phone">  </div></div><br>
   <div class="row">
 <div class="col-md-4">County:</div> <div class="col-md-8"> <input required class="form-control" type="text" name="county"> </div></div><br>
   <div class="row">
 <div class="col-md-4">Home Church:</div> <div class="col-md-8">  <input required class="form-control" type="text" name="homechurch"> </div></div><br>
<div class="row">
 <div class="col-md-4">Gender:</div> <div class="col-md-8">  
<select name="gender" class="form-control">
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	<option value="Other">Other</option>
</select>
  </div></div><br>

 <input class="btn btn-danger" type="reset" value="Reset">
<input class="btn btn-success" type="submit" value="Submit" align="right">
</form>




            </div></div></div></div>
       <?php        $result = mysqli_query($con,"SELECT * FROM  registration_details LIMIT 5");
while($row = mysqli_fetch_array($result)) {?>
            <div id="editmember<?php echo $row['id'];?>" class="modal fade row" tabindex="-1" role="form"
     aria-labelledby="editmember<?php echo $row['id'];?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

              <b style="margin: auto;">Edit member</b>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">X</button><br>
               
            </div>
              <div class="modal-body">
                
                    
                                <form method="post" action="">
    <div class="row">
 <div class="col-md-4">First name:</div> <div class="col-md-8"> 
<input type="hidden" name="id" value="<?php echo $row['id'];?>">
 	<input value="<?php echo $row['firstname'];?>" type="text" class="form-control" required name="firstname"> </div> </div><br>
   <div class="row">
 <div class="col-md-4">Midle name:</div> <div class="col-md-8"> <input value="<?php echo $row['middlename'];?>" required class="form-control" type="text" name="middlename"></div></div><br>
   <div class="row">
 <div class="col-md-4">Last name:</div> <div class="col-md-8">  <input value="<?php echo $row['lastname'];?>" required class="form-control" type="text" name="lastname"> </div></div><br>
   <div class="row">
 <div class="col-md-4">Email:</div> <div class="col-md-8"> <input value="<?php echo $row['email'];?>" required class="form-control" type="email" name="email">  </div></div><br>
   <div class="row">
 <div class="col-md-4">Phone:</div> <div class="col-md-8">  <input value="<?php echo $row['phone'];?>" required class="form-control" type="number" name="phone">  </div></div><br>
   <div class="row">
 <div class="col-md-4">County:</div> <div class="col-md-8"> <input value="<?php echo $row['county'];?>" required class="form-control" type="text" name="county"> </div></div><br>
   <div class="row">
 <div class="col-md-4">Home Church:</div> <div class="col-md-8">  <input value="<?php echo $row['homechurch'];?>" required class="form-control" type="text" name="homechurch"> </div></div><br>
  <div class="row">
 <div class="col-md-4">Gender:</div> <div class="col-md-8">  
<select name="gender" class="form-control">
	<option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?></option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
	<option value="Other">Other</option>
</select>
  </div></div><br>


 <input class="btn btn-danger" type="reset" value="Reset">
<input class="btn btn-success" type="submit" value="Update" align="right">
</form>





            </div></div></div></div>
            <?php } ?>
             <?php        $result = mysqli_query($con,"SELECT * FROM  registration_details LIMIT 5");
while($row = mysqli_fetch_array($result)) {?>
            <div id="viewmember<?php echo $row['id'];?>" class="modal fade row" tabindex="-1" role="form"
     aria-labelledby="viewmember<?php echo $row['id'];?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <b style="margin: auto;">View member</b>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button><br>
            </div>
              <div class="modal-body">
              
                             
   View not available

            </div></div></div></div>
            <?php } ?>

<?php mysqli_close($con); ?> 

              <?php include("footer.php"); ?>