
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-user"></em>
                </a></li>
                <li class="active">Website views</li>
            </ol>
        </div><!--/.row-->
    <div class="panel panel-primary">
<div class="panel-heading" style="height: 35px; padding: 0 40px;">
Website views
</div>
<div class="panel-body">

<div class="panel panel-container">
<?php include ("db.php"); 
  $result = mysqli_query($con,"SELECT * FROM  page_visits");?>
<table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
      <thead>
          <tr>
              <th>Homepage</th>
              <th>Products page</th>
              <th>Shopping basket</th>
              <th>Process Payment</th>
              <th>Payment Completed</th>
              </tr>
      </thead>
      <tbody>
     
            <?php while($row = mysqli_fetch_array($result)) {?>
              <tr>
              <td><?php echo $row['homepage'];?></td>
              <td><?php echo $row['product'];?></td>
              <td><?php echo $row['cart'];?></td>
              <td><?php echo $row['payment'];?></td>
              <td><?php echo $row['completed'];?></td>
              </tr>
                
           <?php } ?>
            </tbody></table>
          


    </table>



        </div></div></div>

</div>

<?php mysqli_close($con); ?> 

              <?php include("footer.php"); ?>