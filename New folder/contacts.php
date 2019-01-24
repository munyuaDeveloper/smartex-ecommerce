<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
  <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-contacts"></em>
                </a></li>
                <li class="active">Contacts</li>
            </ol>
        </div>
        <h3>Members who contacted</h3><br>
         <?php include ("db.php"); 
         $result = mysqli_query($con,"SELECT * FROM contacts");?>
        <table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Time</th>
                                        
                                        <th>Options</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 <?php while($row = mysqli_fetch_array($result)) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['name'];?></td>
                                        <td><?php echo $row['time'];?></td>
                                        <td>
                                          <em class="fa fa-eye btn" data-target="#viewcontact<?php echo $row['id'];?>" href="#" data-toggle="modal"> View</em>
                                        </td>
                                         </tr><?php } ?>
                                      </tbody></table>
                                       <?php        $result = mysqli_query($con,"SELECT * FROM  contacts LIMIT 5");
while($row = mysqli_fetch_array($result)) {?>
            <div id="viewcontact<?php echo $row['id'];?>" class="modal fade row" tabindex="-1" role="form"
     aria-labelledby="viewcontact<?php echo $row['id'];?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <b style="margin: auto;"><?php echo $row['name'];?></b>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button><br>
            </div>
              <div class="modal-body">
              
                             
    <div class="row">
  <div class="col-md-12">

  <h3><?php echo $row['subject'];?></h3> </div>
</div><br>

    <div class="row panel panel-info">
  <div class="col-md-12">
  <?php echo $row['message'];?><br>

  </div></div>

   <div class="row panel panel-info">
  <div class="col-md-4">
  <?php echo $row['email'];?>
  </div>
   <div class="col-md-4">
  <?php echo $row['phone'];?>
  </div>
   <div class="col-md-4">
  <?php echo $row['time'];?>
  </div>
</div>

            </div></div></div></div>
            <?php } ?>
                                      <?php mysqli_close($con); ?> 
         

  <?php include("footer.php"); ?>