
 <?php include ("contact_form.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
       <title>Contact us</title>
    <link rel="shortcut icon" href="profiles/39.png">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon" href="icon/11.png">
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 </head>
<script language="JavaScript" type="text/javascript">
function checkLogout(){
    return confirm('Are you sure you want to logout <?php echo $_SESSION['email']; ?>?');
}
</script>
 <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
   
  <body>
  <?php include ("header.php"); ?>
   
 <div class="col-sm-2"> </div>


     <div class="col-sm-8 body-content">  

<h1>Contact details for Smartex designers</h1><div class="rangi"></div>
<div class="row text-center">Fill the forms below to send a message to Smartex</div>
<div class="row">
<?php if(isset($smsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div>
<?php } ?>  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
 <div class="col-sm-2"> </div>
  <div class="col-sm-7"> 
<form method="post" action="contacts.php">
<input type="text" name="name" class="form-control2" placeholder="Enter your full name here"><br><br>
<input type="email" name="email" class="form-control2" placeholder="Enter your email address"><br><br>
<input type="number" name="phone" class="form-control2" placeholder="Enter your phone number"><br><br>
<textarea name="message" class="form-control1" placeholder="Write your message/text content"></textarea><br><br>
<input type="submit" class="btn btn-danger" value="Send message">
</form>
<div class="rangi"></div>
<br>
<br>

Phone number:  +254710166805<br><br>
Email address1: info@peteraminga.com<br><br>
Email address2: peteraminga3@gmail.com<br><br>






  </div>
   <div class="col-sm-3"> </div>

        </div>
<div class="col-sm-2"></div> 
   </div>
<?php include ("footer.php"); ?>
  
</body> </html>

