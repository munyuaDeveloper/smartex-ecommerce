<?php
error_reporting(1);
include ("db.php"); 
extract($_POST);
$target_dir = "../files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($post){
 if($videoFileType != "JPG" && $videoFileType != "jpg" && $videoFileType != "png" && $videoFileType != "JPEG" && $videoFileType != "gif" && $videoFileType != "BMP" && $videoFileType != "bmp" && $videoFileType != ""){
     $fmsg ="Bad image type!";
       
} else{
$name = ($_POST['name']);
$price = ($_POST['price']);
$category = ($_POST['category']);
$file_path=$_FILES['fileToUpload']['name'];
$query = "INSERT INTO items (name, category, image, price) VALUES('$name', '$category', '$file_path', '$price')";
$result = mysqli_query($con,$query);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.basename($_FILES['fileToUpload']['name']));

 

if($result){
  Print '<script>alert("Product inserted successful!");</script>';

}else{
    Print '<script>alert("Error inserting");</script>';
    }
}
}
if($postcat){
 if($videoFileType != "JPG" && $videoFileType != "jpg" && $videoFileType != "png" && $videoFileType != "JPEG" && $videoFileType != "gif" && $videoFileType != "BMP" && $videoFileType != "bmp" && $videoFileType != ""){
     $fmsg ="Bad image type!";
       
} else{
$name = ($_POST['name']);
$file_path=$_FILES['fileToUpload']['name'];
$query = "INSERT INTO categories(name, image) VALUES('$name', '$file_path')";
$result = mysqli_query($con,$query);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.basename($_FILES['fileToUpload']['name']));

 

if($result){
 

}else{
    Print '<script>alert("Error inserting");</script>';
    }
}
}
?>

<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
         <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-diamond"></em>
                </a></li>
                <li class="active">Items</li>
            </ol>
         </div>
<div class="panel panel-primary">
<div class="panel-heading" style="height: 35px; padding: 0 40px;">
<div> View items and categories </div> 
</div>
<div class="panel-body">
<div class="panel panel-container">
<div class="row">
<div class="col-md-5" style="background: gray;">
<h3>Categories</h3>
<button class="btn btn-primary" class="btn" data-toggle="collapse" href="#category"><i class="fa fa-plus"></i> Add category</button>
<?php include ("db.php"); 
$result = mysqli_query($con,"SELECT * FROM  categories");?>
<table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
    <thead>
      <tr>
      <th>No.</th>
      <th>Category name</th>
      <th>Image</th>
      <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="collapse" id="category">
        <td></td>
        <form method="post" action="" enctype="multipart/form-data">
        <td><input type="text" name="name" class="form" placeholder="Category name" style="width: 120px;"></td>
        <td><input type="file" name="fileToUpload" class="" style="width: 60px;"></td>
        <td><input type="submit" value="Add"  name="postcat" class="btn btn-success"></td>
    </form>
             </tr>
     <?php while($row = mysqli_fetch_array($result)) {?>
        <tr class="odd gradeX">
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><img src="../files/<?php echo $row['image'];?>" height="25"></td>
            <td>
            
             <a href="items.php?category=<?php echo $row['id'];?>"><button class="btn btn-primary">View</button></a>
            <a href="php/delcat.php?id=<?php echo $row['id'];?>"><button class="btn btn-danger"><em class="fa fa-trash"></em></button></a>
              </td>
               </tr><?php } ?>
            </tbody>
            </table>
    </div>
     <div class="col-md-7">
      <?php if ($_GET['category']) {
       include ("db.php"); 
      $result = mysqli_query($con,"SELECT * FROM  categories WHERE id='{$_GET['category']}'");
      while($row = mysqli_fetch_array($result)) {?>
      <h4>Items in <?php echo $row['name'];}?> category</h4>
      <button class="btn btn-primary" class="btn" data-toggle="collapse" href="#add"><i class="fa fa-plus"></i> Add item</button>
      <?php 
      $category = $_GET['category'];
      $result = mysqli_query($con,"SELECT * FROM  items WHERE category='$category'");?>
        <table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
              <thead>
                <tr>
                <th>Product ID</th>
                <th>Item name</th>
                <th>Price(in Naira)</th>
                <th>Image</th>
                <th>Action</th>
                </tr>
              </thead>
               <tbody>
             <tr class="collapse" id="add">
                  <td></td>
                  <form method="post" action="" enctype="multipart/form-data">
                    <input type="hidden" name="category" value="<?php echo $_GET['category'];?>">
                  <td><input type="text" name="name" class="form" placeholder="Item name"></td>
                  <td><input type="number" name="price" class="form" placeholder="Price" style="width: 80px;"></td>
                  <td><input type="file" name="fileToUpload" class="" style="width: 80px;"></td>
                  <td><input type="submit" value="Add"  name="post" class="btn btn-success"></td>

              </form>
                       </tr>
    
    
               <?php while($row = mysqli_fetch_array($result)) {?>
                  <tr class="odd gradeX">
                    <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['name'];?></td>
                      <td><?php echo $row['price'];?></td>
                      <td><img src="../files/<?php echo $row['image'];?>" height="35"></td>
                      <td>
                        <a href="php/delitem.php?id=<?php echo $row['id'];?>"><button class="btn btn-danger"><em class="fa fa-trash"></em> Delete</button></a>
                      </td>
                       </tr><?php } ?>
                    </tbody></table>
                  
                  <form action="" method="post" style="margin-top: 50px;">
                  <tr>
                  <td colspan="5"><h3>Update Products Here!</h3></td>
                  </tr>
                    <td><input type="number" name="pro_id" placeholder="Enter Product ID" required> </td>
                      <td><input type="text" name="newName" placeholder="Enter New Product Name" required></td>
                      <td><input type="text" name="newPrice" placeholder="Enter New Price" required> </td>
                      
                      <td>
                        <input class="btn btn-success" type="submit" name="update" value="Update">
                      </td>
                       </tr>
                    </tbody></table>
                  </form>
                      <?php

                    if(isset($_POST['update'])){
                      extract($_POST);
                      $target_dir = "../files/";
                      $target_file = $target_dir . basename($_FILES["newImg"]["name"]);
                      $videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                      if($videoFileType != "JPG" && $videoFileType != "jpg" && $videoFileType != "png" && $videoFileType != "JPEG" && $videoFileType != "gif" && $videoFileType != "BMP" && $videoFileType != "bmp" && $videoFileType != ""){
                          echo "<script>window.open('items.php','_self')</script>";
                          die();
                          
                      } else{
                       include ("db.php");
                      $pro = $_POST['pro_id'];
                      $newname= $_POST['newName'];
                      $newprice= $_POST['newPrice'];
                      $file_path=$_FILES['newImg']['name'];
                      $query = "UPDATE items SET name ='$newname', price='$newprice'  WHERE id='$pro' ";
                      $run = mysqli_query($con,$query);
                      
                      if($run){
                      move_uploaded_file($_FILES["newImg"]["tmp_name"], $target_dir.basename($_FILES['newImg']['name']));
                      Print '<script>alert("Product updated successful");</script>';
                      echo "<script>window.open('items.php','_self')</script>";
                      }else{
                          Print '<script>alert("Error updating the product");</script>';
                      }
                    }
                         
                    }
                    
                    ?>

                  <?php }else{ ?>
                    <h3>Select view button of a category to manage its items</h3>
                    <?php }?>
                    

    </div>
  </div>
                  
</div></div></div></div>

<?php include("footer.php"); ?>