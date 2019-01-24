<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-book"></em>
                </a></li>
                <li class="active">Gallery</li>
            </ol>
        </div><!--/.row-->
 <div class="row">
 	<?php
include ("db.php"); 

$result = mysqli_query($con,"SELECT * FROM blog ORDER BY id");
while($row = mysqli_fetch_array($result))
{ ?>
 <div class="col-sm-4"><br>
 <img src="../img/work/<?php echo $row['name'];?>" alt="Image load error" style="max-width: 300px;">
 </div>
 
 <?php }  mysqli_close($con); ?>
</div>
  <?php include("footer.php"); ?>
