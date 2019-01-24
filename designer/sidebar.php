        <?php  $result = mysqli_query($con,"SELECT * FROM customer WHERE email='{$_SESSION['writer_email']}'");
     while($row = mysqli_fetch_array($result)) {
     $id = $row['id'];
      $name = $row['names']; }
      ?>
     <style type="text/css">
       .side-text{
        color: #f2f2f2;
        font-weight: bold;
       }
     </style>
        <div class="navbar-default sidebar" role="navigation" style="background-color: #3c4451;">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                   <li style="padding: 60px 5px 5px;">
                    <div class="row bg-light" style="padding: 7px; border-right: solid 5px black;">
                       <div class="col-sm-12">
                       <h2 style="border-bottom: solid 1px #fff;">My profile</h2>
                     </div>
                       <div class="col-sm-5">
                       <img src="plugins/images/users/varun.jpg" style="width: 80px;">
                     </div><div class="col-sm-7">
                      <h4><?php echo $name;?></h4>
                      <b>ID: <?php echo $id;?></b>
                    </div>
                     <div class="col-sm-12">
                       <a href="profile.php"><button class="btn btn-info col-sm-12"><i class="fa fa-edit"></i> Edit profile</button></a>
                     </div>
                  </div>
                    </li>
                   

                    <li>
                       <div class="row">
                          <div class="col-sm-12">
                       <button class="btn bg-silver col-sm-12"><i class="fa fa-bar-chart-o"></i> My account statistics</button>
                     </div>
                       </div>
                    </li>
                    <li><div class="row" style="padding: 4px 7px; border-bottom: solid 1px #656d6d;">
                       <div class="col-sm-6"><h5 class="side-text">Orders</h5></div>
                       <div class="col-sm-6 text-right"><button class="btn btn-success"><?php echo $num_orders;?><a href="requests.php">order</a></button></div>
                     </div>
                    </li>
                    </li>
                    <li><div class="row" style="padding: 4px 7px;">
                      <div class="col-sm-12 text-right"><button class="btn col-sm-12" style="font-size: 20px;"><i class="fa fa-envelope"></i> designer@gmail.com</button></div>
                     </div>
                    </li>
                    <li><div class="row" style="padding: 4px 7px;">
                      <div class="col-sm-12 text-right"><button class="btn col-sm-12" style="font-size: 20px;"><i class="fa fa-twitter"></i> smatexdesigner</button></div>
                     </div>
                    </li>
                    <li><div class="row" style="padding: 4px 7px;">
                      <div class="col-sm-12 text-right"><button class="btn col-sm-12" style="font-size: 20px;"><i class="fa fa-facebook"></i> smatexdesigner</button></div>
                     </div>
                    </li>
                 <li><div class="row" style="padding: 4px 7px;">
                      <div class="col-sm-12 text-right"><button class="btn col-sm-12" style="font-size: 20px;"><i class="fa fa-phone"></i> +254700935525</button></div>
                     </div>
                    </li>

                </ul>
               
            </div>
            
        </div>