<?php 
 include ("database/db3.php"); 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
       <title>Smartex ecommerce shop </title>
   <link rel="shortcut icon" href="profiles/39.png">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="icon/11.png">
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  </head>
 <header id="home" class="home-section">
      <div class="container">
     <div class="header-top-area">
      <div class="container">
          <div class="row">
              <div class="col-sm-3 hidden-xs">
                  <div >
                   <a href="index.php"><h4>Smartex Ecommerce</h4></a>
                     
                  </div>
              </div>
              
              <div class="col-sm-9">
                  <div class="navigation-menu">
                      <div class="navbar">
                          <div class="navbar-header">
                              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                              </button>
                          </div>
                          <div class="navbar-collapse collapse">
                              <ul class="nav navbar-nav navbar-right">
                                  <li class="active"><a class="smoth-scroll" href="index.php">Home <div class="ripple-wrapper"></div></a></li>
                                   <li><a class="smoth-scroll" href="about.php">About Us</a>
                                  <li class="active"><a class="smoth-scroll" href="products.php">Products <div class="ripple-wrapper"></div></a></li>
                                  <li><a class="smoth-scroll" href="cart.php?cart=<?php echo $_SESSION['cart_number'];?>">My Cart</a>
                                  </li>
                                  
                                  </li>
                                  <li><a href="account.php">My Account</a></li>
                                  <li><a href="contacts.php"> Contact Us</a></li>
                                  <li>

                  								<?php
                      								error_reporting(1);
                      								if ($_SESSION['user_email']) {
                                        echo '<a onclick="return checkLogout()" class="smoth-scroll" href="logout.php">Logout</a>';
                                      }else{
                                        echo '<a class="smoth-scroll" href="login.php">Login </a>';
                                      }
                      								?>
                                  </li> 
                                  <li ><a href="admin/index.php">Admin</a></li>
                                  <li ><a href="designer/index.php">Designer </a></li>
                                  
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div></div>
</header>
     <div class="">
         
<?php
$con=mysql_connect('localhost', 'root', '');
$db=mysql_select_db('shivling');
if(isset($_POST['button'])){   
$search=$_POST['search'];

 $query=mysql_query("SELECT * FROM publicposts WHERE cat like '%{$search}%' || item like '%{$search}%' || brand like '%{$search}%'");
if (mysql_num_rows($query) > 0) {
 
  while ($row = mysql_fetch_array($query)) {
echo    '<a href=shop.php?id='.$row["id"].'&category='.$row["cat"].'&item='.$row["item"].'>';
    echo "<div><table bgcolor='white' align='center' border='0' width='68%'>";
echo "<tr bgcolor='white'>";
echo "<td align='left' width='10%'><h5>" . $row['cat'] . "</h5></td>";
echo "<td align='left' width='25%'><h5>" . $row['item'] . "</h5></td>";
echo "<td align='left' width='25%'><h5>" . $row['brand'] . "</h5></td>";
echo '<td align="center" width="20"><h5>'.' shop '.'</h5></td>';
echo "</tr>";
echo "</table></div></a>";
  }
}else{
    echo "No record Found<br>";
  }


mysql_close();
}
?>

     </div>