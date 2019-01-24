<?php 
session_start();
//error_reporting(1);
 function uniqueID() {
$unique_ref_length = 8; 
$unique_ref_found = false; 
$possible_chars = "1234567890";  
while (!$unique_ref_found) {
    $unique_ref = "";  
    $i = 0;   
    while ($i < $unique_ref_length) { 
        $char = substr($possible_chars, mt_rand(0, strlen($possible_chars)-1), 1);  
        $unique_ref .= $char; 
        $i++; 
    }  
        return $unique_ref;
        $unique_ref_found = true; 
    } 
}?>
<?php 
error_reporting(1);

 extract($_POST);
 if ($cart) {
   include ("database/db3.php"); 
 if (isset($_POST['item']) && isset($_POST['quantity'])){
    $item = stripslashes($_REQUEST['item']);
    $item = mysqli_real_escape_string($con,$item);
    $quantity = stripslashes($_REQUEST['quantity']);
    $quantity = mysqli_real_escape_string($con,$quantity);
    
  if ($_SESSION['cart_number']) {
  $cart = $_SESSION['cart_number'];
}else{
$cart = uniqueID();
$_SESSION['cart_number'] = $cart;
}   

    $query = "INSERT INTO orders(item, quantity, cart) VALUES ('$item', '$quantity', '$cart')";
        $result = mysqli_query($con,$query);
if ($result) {
  $URL="cart.php?cart=$cart";
  echo '<script>alert("Product Added Successful!");</script>';  
}


}}
extract($_POST);
$target_dir = "files/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($post){
 include ("database/db3.php"); 
if($videoFileType != "JPG" && $videoFileType != "jpg" && $videoFileType != "png" && $videoFileType != "JPEG" && $videoFileType != "gif" && $videoFileType != "BMP" && $videoFileType != "bmp" && $videoFileType != ""){
     $fmsg ="Bad image type!";
       
} else{
$name = ($_POST['name']);
$category = ($_POST['category']);
$price = ($_POST['price']);
$file_path=$_FILES['fileToUpload']['name'];
$query = "INSERT INTO items (name, price, category, image) VALUES('$name', $price, '$category', '$file_path')";
$result = mysqli_query($con,$query);
move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.basename($_FILES['fileToUpload']['name']));

  if ($_SESSION['cart_number']) {
  $cart = $_SESSION['cart_number'];
}else{
$cart = uniqueID();
$_SESSION['cart_number'] = $cart;
}   

 $result = mysqli_query($con,"SELECT * FROM items WHERE name='$name' AND category='$category'");
  while($row = mysqli_fetch_array($result)) { $item = $row['id'];}

$query = "INSERT INTO orders(item, quantity, cart) VALUES ('$item', '$quantity', '123')";
  $result = mysqli_query($con,$query);

}
if($result){
  $URL="cart.php?cart=$cart";
  echo '<script>alert("Product Added Successful!");</script>';  

}else{
    Print '<script>alert("Error inserting");</script>';
    }
}

?>

 <?php include ("header.php"); ?>
   <?php include ("database/db3.php"); 
$category = $_GET['category'];
$category_no = $_GET['id'];
   ?>
<?php
$query = "UPDATE page_visits SET product=product + 1 WHERE id='1'";
$result = mysqli_query($con,$query);
?>
  <body>
  

   <div class="row">
 <div class="col-sm-2"> </div>


     <div class="col-sm-8 body-content">  
<div class="col-sm-12">
<h2 class="text-center"><?php echo $category;?> designs</h2>
<button class="btn btn-info" data-toggle="modal" data-target="#hire">Post your own design</button>
</div>
 <div class="row">

<!--WHERE category='$category_no'-->
<?php
 $result = mysqli_query($con,"SELECT * FROM items WHERE category='$category_no'");
 while($row = mysqli_fetch_array($result)) {?>
   <div class="col-sm-3 body-content1">
   
<img src="files/<?php echo $row['image'];?>" style="height: 120px; max-width: 100%; min-width: 80%;"> <br>

<p><?php echo $row['name'];?></p>
<h4>Naira:<?php echo $row['price'];?></h4>
<form action="" method="post">
  <input type="hidden" name="item" value="<?php echo $row['id'];?>">
  <div class="row">
  <div class="col-sm-6">  <input type="number" required name="quantity" value="1" class="" style="padding: 2px; width: 80px;"> </div>
     <div class="col-sm-6">  <input type="submit" value="Add to cart" name="cart" class="btn btn-primary" style="padding: 4px;"> </div>
  </div>
</form>
</div> 
<br>
	
  <?php }?>

</div>
<?php include ("footer.php"); ?>
        </div>

   </div>
   
<div class="col-sm-2"></div> 
</body> 
</html>

<div class="modal fade" id="hire" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
          <div class="modal-content">
           <div class="modal-header">
            <h4>Post a design to the designer</h4>
           </div>
            <div class="modal-body" style="padding: 20px; background: #f2f2f2;">
              <form action="" method="post" enctype="multipart/form-data">
                Name of your design
                <input type="text" name="name" class="form-control" placeholder="Name of your design" required>
                 price of your design
                <input type="number" name="price" class="form-control" placeholder="Price of the design" required>
                Select category
                <select class="form-control" name="category">
                <option>Select category</option>
                <?php
                $result = mysqli_query($con,"SELECT * FROM categories");
                while($row = mysqli_fetch_array($result)) {?>
                      <option value="<?php echo $row['id'];?>"><?php echo $row['name'];?></option>
                      <?php }?>
                      </select>
                      Attach an image file
                      <input type="file" name="fileToUpload" class="form-control" required>
                      Attach a brief description
                      <textarea class="form-control" name="description" placeholder="Attach a brief description"></textarea>
                      <input type="submit" name="post" value="Post Design" style="margin-top: 50px;">
                    </form>
            </div>                                      
        <div class="modal-footer">
      <div class="col-lg-9">          
    </div>          
    <div class="col-lg-3">
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</div>
</div>

  <?php mysqli_close($con); ?>