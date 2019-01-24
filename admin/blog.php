<?php
error_reporting(1);
 include ("db.php");
 extract($_POST);
$target_dir = "../img/work/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$videoFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($upd){

if($videoFileType != "JPG" && $videoFileType != "jpg" && $videoFileType != "png" && $videoFileType != "JPEG" && $videoFileType != "gif" && $videoFileType != "BMP" && $videoFileType != "bmp" && $videoFileType != ""){
     $fmsg ="Bad image type!";
       
} else{
 if (isset($_POST['title']) && isset($_POST['publisher'])){
    if (isset($_REQUEST['title'])){
    $title = stripslashes($_REQUEST['title']); 
    $title = mysqli_real_escape_string($con,$title); 
    $publisher = stripslashes($_REQUEST['publisher']);
    $publisher = mysqli_real_escape_string($con,$publisher);
    $id = stripslashes($_REQUEST['id']);
    $id = mysqli_real_escape_string($con,$id);
     $description = stripslashes($_REQUEST['description']);
    $description = mysqli_real_escape_string($con,$description);
    $file_path= stripslashes($_FILES['fileToUpload']['name']);
     
$query = "INSERT INTO blog (title, publisher, description, name, date) VALUES ('$title', '$publisher', '$description', '$file_path', now())";
        $result = mysqli_query($con,$query);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.basename($_FILES['fileToUpload']['name']));
       
        if($result){
          Print '<script>alert("Article added successfully");</script>'; 
           }
    else{
        Print '<script>alert("Error! Failed to record article!");</script>'; 
        }


}}
}}
?>
<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>

 <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-book"></em>
                </a></li>
                <li class="active">Sermons</li>
            </ol>
        </div><!--/.row-->
    <div class="panel panel-primary">
                    <div class="panel-heading" style="height: 35px; padding: 0 40px;">
                    <div data-target="#new" href="#" data-toggle="modal"> New article </div>	
                        </div>
                    <div class="panel-body">
        
                <div class="panel panel-container">
       	                <?php include ("db.php"); 
                            $result = mysqli_query($con,"SELECT * FROM  blog");?>
                          <table class="table table-striped table-hover" id="dataTables-example" style="font-size: 13px;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Sermon Title</th>
                                        <th>publisher</th>
                                        <th>Image</th>
                                        <th>Date</th>
                                        <th>Options</th>
                                   </tr>
                                </thead>
                                <tbody>
                                 <?php while($row = mysqli_fetch_array($result)) {?>
                                    <tr class="odd gradeX">
                                        <td><?php echo $row['id'];?></td>
                                        <td><?php echo $row['title'];?></td>
                                        <td><?php echo $row['publisher'];?></td>
                                        <td><img src="../img/work/<?php echo $row['name'];?>" height="30"></td>
                                        <td><?php echo $row['date'];?></td>
                                        <td>
                                        	<em class="fa fa-eye" data-target="#view<?php echo $row['id'];?>" href="#" data-toggle="modal"></em></em> |
                                  <em class="fa fa-edit" data-target="#edit<?php echo $row['id'];?>" href="#" data-toggle="modal"></em> | 
                                      <a href="php/del.php?id=<?php echo $row['id'];?>"><em class="fa fa-trash"></em></a>
                                        </td>
                                         </tr><?php } ?>
                                      </tbody></table>
                                    


    </table>



        </div></div></div>


 
       <?php        $result = mysqli_query($con,"SELECT * FROM  blog LIMIT 5");
while($row = mysqli_fetch_array($result)) {?>
            <div id="edit<?php echo $row['id'];?>" class="modal fade row" tabindex="-1" role="form"
     aria-labelledby="edit<?php echo $row['id'];?>" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #fff;">
        <div class="modal-description">
            <div class="modal-header">

              <b style="margin: auto;">Edit article</b>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">X</button><br>
               
            </div>
              <div class="modal-body">
                
                    
                             <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
  <div class="col-md-6">
  Article title
  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
           <input type="text" name="title" class="form-control" style="background-color: #f2f2f2; color: #000;" value="<?php echo $row['title'];?>"></div>

  <div class="col-md-6">
   	publisher name
   <input type="text" name="publisher" class="form-control" style="background-color: #f2f2f2; color: #000;" value="<?php echo $row['publisher'];?>"></div></div><br>
     <div class="row">
  <div class="col-md-6">
    <img src="../img/work/<?php echo $row['name'];?>" alt="Image load error" style="max-width: 200px; max-height: 50px;">
 </div>

  <div class="col-md-6">
   	publisher's photo
   <input type="file" name="fileToUpload" class="form-control"></div></div><br>
   <div class="row">
  <div class="col-md-12">
  	Sermon description
<textarea class="form-control" name="description"><?php echo $row['description'];?></textarea>

  </div></div><br>


                                 <input type="submit" value="Update" name="upd" class="btn btn-success" style="width: 100%;">
                            </form>





            </div></div></div></div>
            <?php } ?>
             <?php        $result = mysqli_query($con,"SELECT * FROM  blog LIMIT 5");
while($row = mysqli_fetch_array($result)) {?>
            <div id="view<?php echo $row['id'];?>" class="modal fade row" tabindex="-1" role="form"
     aria-labelledby="view<?php echo $row['id'];?>" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #fff;">
        <div class="modal-description">
            <div class="modal-header">
             <b style="margin: auto;">View article</b>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button><br>
            </div>
              <div class="modal-body">
              
                             
    <div class="row">
  <div class="col-md-6">
  Sermon title => <?php echo $row['title'];?></div>

  <div class="col-md-6">
   	publisher => <?php echo $row['publisher'];?></div></div><br>

   	<div class="row">
  <div class="col-md-12">
  	Sermon name => <?php echo $row['name'];?><br>

  </div></div>

   <div class="row">
  <div class="col-md-12">
  <?php echo $row['description'];?>

  </div></div>

            </div></div></div></div>
            <?php } ?>

<?php mysqli_close($con); ?> 
    <div id="new" class="modal fade" tabindex="-1" role="form"
     aria-labelledby="new" aria-hidden="true">
    <div class="modal-dialog" style="background-color: #fff;">
        <div class="modal-description">
            <div class="modal-header">

              <b style="margin: auto;">New article</b>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">X</button><br>
               
            </div>
              <div class="modal-body">
                <?php
 include ("db.php"); 
$result = mysqli_query($con,"SELECT * FROM admin WHERE email='{$_SESSION['email']}'");
 while($row = mysqli_fetch_array($result)) {?>
                         <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
  <div class="col-md-6">
  Article title
  <input type="hidden" name="id">
           <input type="text" name="title" class="form-control" style="background-color: #f2f2f2; color: #000;" nameholder="Article title"></div>

  <div class="col-md-6">
    publisher
   <input type="text" name="publisher" class="form-control" value="<?php echo $row['name'];?>" readonly style="background-color: #f2f2f2; color: #000;" nameholder="Article publisher"></div></div><br>
     <div class="row">
  <div class="col-md-6">
 </div>

  <div class="col-md-6">
    publisher's photo
   <input type="file" name="fileToUpload" class="form-control"></div></div><br>
   <div class="row">
  <div class="col-md-12">
    Description
<textarea class="form-control" name="description" nameholder="Article description"></textarea>

  </div></div><br>


                                 <input type="submit" value="Save" name="upd" class="btn btn-success" style="width: 100%;">
                            </form>



 <?php } mysqli_close($con); ?>
            </div></div></div></div>

              <?php include("footer.php"); ?>