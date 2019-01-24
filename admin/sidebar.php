

<?php
 include ("db.php"); 
$result = mysqli_query($con,"SELECT * FROM admin WHERE email='{$_SESSION['email']}'");
 while($row = mysqli_fetch_array($result)) {?>
 
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
               <img src="11.png" width="50"/>
            </div>
            <div class="profile-usertitle">

               <div class="profile-usertitle-name"><?php echo $row['name'];?></div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
            </div>
      
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <ul class="nav menu">
         <li><a href="index.php"><em class="fa fa-home">&nbsp;</em>Dashboard</a></li>
          <li><a href="items.php"><em class="fa fa-book">&nbsp;</em>Items</a></li>
        <li class=""><a href="views.php"><em class="fa fa-eye">&nbsp;</em>Site views</a></li>
        <li class=""><a href="users.php"><em class="fa fa-group">&nbsp;</em>Users</a></li>
        <li class=""><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
        </ul>
    </div><!--/.sidebar-->
     <?php } mysqli_close($con); ?>