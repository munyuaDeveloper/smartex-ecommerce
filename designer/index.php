
<?php include("header.php");?>
<?php include("sidebar.php");?>
         <?php $result = mysqli_query($con,"SELECT * FROM orders ORDER BY id DESC LIMIT 1");
     while($row = mysqli_fetch_array($result)) {
      $orders_id = $row['id'];
      $item = $row['item'];
      $package = $row['package']; 
    }$result = mysqli_query($con,"SELECT * FROM projects WHERE users_id='$users_id' ORDER BY id DESC LIMIT 1");
     while($row = mysqli_fetch_array($result)) {
      $projects_id = $row['id'];
      $project_name = $row['name'];
      }?>
      <style type="text/css">
        .icon{
          height: 4em;
        }
      </style>
        <div id="page-wrapper">
            <div class="container-fluid card">
                <div class="row bg-title card">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h2 class="page-title text-dark">Dashboard</h2> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                                         <ol class="breadcrumb">
                            <li><a href="#">Dashboard</a></li>
                        </ol>
                    </div>
                   </div>
               
                <div class="row">
   
                  <a href="requests.php">
                    <div class="col-lg-4 col-sm-6 col-xs-12">
                      <div class="col-xs-12 bg-info bg">
                      <div class="col-lg-3">
                          <h1 style="font-size: 80px;"><i class="fa fa-shopping-cart"></i></h1>
                            </div>
                        <div class="col-lg-9 text-success text-center">
                            <h4 class="box-title text-white">New order</h4>
                            <h1>Designs</h1>
                            </div>
                    </div></div>
                </a>
                 <a href="items.php">  
                     <div class="col-lg-4 col-sm-6 col-xs-12">
                      <div class="col-xs-12 bg-danger bg">
                      <div class="col-lg-3">
                           <h1 style="font-size: 80px;"><i class="fa fa-user"></i></h1>
                            </div>
                        <div class="col-lg-9 text-success text-center">
                            <h4 class="box-title text-white">Add New</h4>
                            <h1>Item</h1>
                            </div>
                    </div></div>
                </a>

                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                      <br>
                        <div class="white-box bg-light">
                         
                    <?php include ("db.php"); 
                      $result = mysqli_query($con,"SELECT * FROM  page_visits");
                         
                      while($row = mysqli_fetch_array($result)) {
                         
                          $Visitors = $row['homepage'];
                          $product = $row['product'];
                          $cart = $row['cart'];
                          $payment = $row['payment'];
                          $completed = $row['completed'];                   
                        } 
                        $did_not_complete = $Visitors -$completed;
                        ?>

                  <div class="row">
                  <h3 class="text-center text-info">Products Statistics</h3>
                  <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body easypiechart-panel">
                        <h4>Visitors Who Viewed Products</h4>
                        <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent"><?php echo $product;?></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body easypiechart-panel">
                        <h4>Visitors Who Clicked To Buy</h4>
                        <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent"><?php echo $cart;?></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body easypiechart-panel">
                        <h4>Visitors Who Bought Products</h4>
                        <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent"><?php echo $completed;?></span></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-md-3">
                    <div class="panel panel-default">
                      <div class="panel-body easypiechart-panel">
                        <h4>Visitor Who Didn't Complete</h4>
                        <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent"><?php echo $did_not_complete;?></span></div>
                      </div>
                    </div>
                  </div>
                </div>

                            <div id="ct-visits" style="height: 250px;"></div>
                        </div>

                          
                        </div>
                    </div>
                </div>
               
                         
     

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
   <script src="js/waves.js"></script>
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <script src="plugins/bower_components/chartist-js/dist/chartist.min.js"></script>
  <script src="plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>