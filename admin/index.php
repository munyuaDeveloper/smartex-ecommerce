<?php include("header.php"); ?>
<?php include("sidebar.php"); ?>
<?php include("db.php"); ?>


    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#">
                   <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->

         <div class="row">
          <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center" style="height: 35px; padding: 0 40px;">Administrator
                        <span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
                    <div class="panel-body">
        
                <div class="panel panel-container">
            <div class="row">
                <div class="col-xs-6 col-md-4 col-lg-4">
                    <div class="panel panel-teal panel-widget border-right">
                        <div class="row no-padding">
                           <h1><em class="fa fa-home color-blue"></em></h1>
                         <div class="text-muted">Dashboard</div>
                        </div>
                    </div>
                </div>
                <a href="users.php">
                <div class="col-xs-6 col-md-4 col-lg-4">
                   <div class="panel panel-blue panel-widget border-right">
                        <div class="row no-padding">
                           <h1><em class="fa fa-group color-orange"></em></h1>
                             <div class="text-muted">Users</div>
                        </div>
                    </div>
                   </div></a>
                 <a href="../designer/index.php">
                <div class="col-xs-6 col-md-4 col-lg-4">
                    <div class="panel panel-orange panel-widget border-right">
                        <div class="row no-padding">
                          <h1><em class="fa fa-user color-teal"></em></h1>
                             <div class="text-muted"> Designers</div>
                        </div>
                    </div>
                 </div></a>
                 
            </div><!--/.row-->
        </div>
      </div>
      </div>
      </div>
      </div>
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


    <div class="row">
    <h3 class="text-center text-info">Page Statistics</h3>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Home Page</h4>
            <div class="easypiechart" id="easypiechart-blue" data-percent="92" ><span class="percent"><?php echo $Visitors;?></span></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Products Page</h4>
            <div class="easypiechart" id="easypiechart-orange" data-percent="65" ><span class="percent"><?php echo $product;?></span></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Cart Page</h4>
            <div class="easypiechart" id="easypiechart-teal" data-percent="56" ><span class="percent"><?php echo $cart;?></span></div>
          </div>
        </div>
      </div>
      <div class="col-xs-6 col-md-3">
        <div class="panel panel-default">
          <div class="panel-body easypiechart-panel">
            <h4>Payments Page</h4>
            <div class="easypiechart" id="easypiechart-red" data-percent="27" ><span class="percent"><?php echo $payment;?></span></div>
          </div>
        </div>
      </div>
    </div>

 <!-- <div class="row">
        <div class="col-md-12">
              <div class="panel panel-primary">
                 
                  <div class="panel-body">                                     
                   
                  </div>
              </div>
          </div>
         
      </div> -->

         <?php include("footer.php"); ?>