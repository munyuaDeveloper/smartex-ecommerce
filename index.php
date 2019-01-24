

 <?php include ("header.php"); ?>
   <?php include ("database/db3.php"); ?>
     <?php
$query = "UPDATE page_visits SET homepage=homepage + 1 WHERE id='1'";
        $result = mysqli_query($con,$query);
           ?>
  <body>
  

   <div class="row">
 <div class="col-sm-2"> </div>


     <div class="col-sm-8 body-content">  
<div class="col-sm-12">
<h1 class="text-center large">Smartex ecommerce shop </h1><div class="rangi"></div>
</div>
 <div class="row">


<?php
 $result = mysqli_query($con,"SELECT * FROM categories");
 while($row = mysqli_fetch_array($result)) {?>
 <a href="items.php?id=<?php echo $row['id'];?>&category=<?php echo $row['name'];?>">
  <div class="col-sm-4 body-content1">
   
<img src="files/<?php echo $row['image'];?>" style="height: 120px; max-width: 100%; min-width: 80%;"> <br>

<p style="font-size: 18px; font-weight: bold;"><?php echo $row['name'];?></p>

</div> </a>
<br>
	
  <?php } mysqli_close($con); ?>


</div>
<?php include ("footer.php"); ?>
        </div>

   </div>
   


<div class="col-sm-2"></div> 
</body> 
</html>
