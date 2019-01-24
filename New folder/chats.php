     <?php include("header.php");?>
    <?php
//error_reporting(1);
 include ("database/db.php");
 extract($_POST);
$target_dir = "../chatfiles/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
if($upd){
 if (isset($_POST['message']) && isset($_POST['user'])){
    if (isset($_REQUEST['message'])){
    $message = stripslashes($_REQUEST['message']); 
    $message = mysqli_real_escape_string($con,$message); 
    $user = stripslashes($_REQUEST['user']); 
    $user = mysqli_real_escape_string($con,$user); 
    $file_path= stripslashes($_FILES['fileToUpload']['name']);
    if($fileType != "docx" && $fileType != "doc" && $fileType != "ppt" && $fileType != "pdf" && $fileType != "zip" && $fileType != "rar" && $fileType != "tar" && $fileType != "txt" && $fileType != "rtf" && $fileType != "png" && $fileType != "jpeg" && $fileType != "jpg" && $fileType != "gif" && $fileType != ""){
     $fmsg ="<h3>Error!</h3> 
     Bad file type!<br> Please ensure your file has an extension as listed below;<br> 
     <ol>
     <li>.doc</li>
     <li>.docx</li>
     <li>.ppt</li>
     <li>.pdf</li>
     <li>.zip</li>
     <li>.rar</li>
     <li>.tar</li>
     <li>.txt</li>
     <li>.rtf</li>
     </ol>";
       
}else{
    if ($_GET['user']) {
     $getid = 'user';
    }
     if ($_GET['admin']) {
     $getid = 'admin';
    }
    if ($file_path != null) {
$temp = explode(".", $_FILES["fileToUpload"]["name"]);
    $newfilename = round(microtime(true)).'.'.end($temp);
   $query="INSERT INTO chat(message, user, admin, name, date, destination, writer) VALUES('$message', '$user', '$admin', '$newfilename', now(), '$getid', '$writer_id')";
        $result = mysqli_query($con,$query);        
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../chatfiles/".$newfilename);
    }else{
 $query="INSERT INTO chat(message, user, admin, name, date, destination, writer) VALUES('$message', '$user', '$admin', '', now(), '$getid', '$writer_id')";
        $result = mysqli_query($con,$query);     
        }
          if($result){
      
              } }}}}?>

<?php include("sidebar.php");?>
 <div id="page-wrapper">
            <div class="container-fluid card">
                <div class="row bg-title card">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-silver">My Chats</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                       
                        <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">My Chats</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                <div class="col-lg-7 bg">
     <div class="chat">
      <div style="padding: 5px; border-bottom: solid 1px black; font-size: 20px;">Chat with your student</div>
                        <div class="chat-history"><?php if($_GET['user'] || $_GET['admin']){?>
                                  <h4>Student ID: <?php echo $_GET['user'];?></h4>
                                  <?php }else{?><h4>Please choose a user on the right menu to open a message</h4> <?php }?>
                                  <?php if($_GET['user'] || $_GET['admin']){?>
                                <ul class="m-b-0">
      <?php $res = mysqli_query($con,"SELECT * FROM chat WHERE writer='$writer_id' AND user = '{$_GET['user']}'");
                          while($row = mysqli_fetch_array($res)) { 

                  $query="UPDATE chat SET status = 'Read' WHERE user= '{$_GET['user']}' AND destination = 'writer'";
                          $result = mysqli_query($con,$query); 
                            if ($row['destination'] == 'user' || $row['destination'] == 'admin') {?> 

                                        <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time" ><?php echo $row['date'];?></span>                                           
                                        </div>

                                        <div class="message other-message float-right">
                                          <?php if ($row['name']) { ?>
             <a href="../chatfiles/<?php echo $row['name'];?>" download>
    <img src="../chatfiles/<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" style="max-width: 300px; max-height: 150px;">          </a><br> 
                                         <?php }?>
          
                                          
                                          <?php echo $row['message'];?></div>
                                    </li>
                                    <?php }else{?>

                                    <li class="clearfix">
                                        <div class="message-data">
                                            <span class="message-data-time"><?php echo $row['date'];?></span>
                                        </div>
                                        <div class="message my-message">
                                           <?php if ($row['name']) { ?>
             <a href="../chatfiles/<?php echo $row['name'];?>" download>
    <img src="../chatfiles/<?php echo $row['name'];?>" alt="<?php echo $row['name'];?>" style="max-width: 300px; max-height: 150px;">          </a><br> 
                                         <?php }?>
                                          <?php echo $row['message'];?></div>                                    
                                    </li>  <?php }}?>                             
                                   </ul>
  <?php }?>
                            </div> 
                            <?php if($_GET['user'] || $_GET['admin']){?>
                            <form action="" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="user" value="<?php echo $user; ?>">
                                    <input type="file" class="custom-file-input" name="fileToUpload">
                                    <input type="hidden" name="user" value="<?php echo $_GET['user'];?>">
                                     <input type="hidden" name="admin" value="<?php echo $_GET['admin'];?>">
                                   <div class="row"><div class="col-lg-10">
                                   <input type="text" class="form-control" name="message" placeholder="Enter message here..."></div>
                                <div class="col-lg-2"> <input type="submit" class="btn btn-success" value="Reply" name="upd" id="input01"></div></div>
                          </form>
                          <?php }?>
                        </div>
</div><div class="col-lg-3">
  <ul class="nav">
  <?php
$result=mysqli_query($con,"SELECT * FROM chat WHERE writer='$writer_id' AND admin='0' GROUP BY user HAVING COUNT(*)=1 OR COUNT(*)>1 ORDER BY id DESC");
              while($row = mysqli_fetch_array($result)) { ?>
                        <a href="chats.php?user=<?php echo $row['user']; ?>">
                        <li class="bg-light" style="padding: 2px;">
                          <h5>Student ID: <?php echo $row['user']; ?></h5> 
                          <i><?php echo $row['date']; ?></i>
                          </li>
                        </a>

                        <?php } 
$result=mysqli_query($con,"SELECT * FROM chat WHERE writer='$writer_id' AND admin !='0' GROUP BY admin HAVING COUNT(*)=1 OR COUNT(*)>1 ORDER BY id DESC");
              while($row = mysqli_fetch_array($result)) { ?>
                        <a href="chats.php?admin=<?php echo $row['admin']; ?>">
                        <li class="bg-light" style="padding: 2px;">
                          <h4>Administrator</h4> 
                          <i><?php echo $row['date']; ?></i>
                          </li>
                        </a>

                        <?php } ?> 
                      </ul>
</div></div>


<?php include("footer.php");?>