<?php include ("header.php"); ?>
 <?php include ("database/db3.php");?>
<?php
$query = "UPDATE page_visits SET completed=completed + 1 WHERE id='1'";
$result = mysqli_query($con,$query);
?>
 <body>

	   <div class="row">
	 <div class="col-sm-2"> 

	 </div>
	 <div class="col-sm-8 body-content">  

		<div class="row">
			<div class="col-md-12 animate-box">
				<h2>Congratulations</h2>
				<div class="row contact-info-wrap">
					<p>Your order request has been received. Our writers have been alerted and they will bid your work, then you will be notified in your account. Stay connected and logged in to receive latest updates of your work.<br>
					We look forward for the best business encounter with you.</p>
					<p>
					Meanwhile you can check your account to keep in touch with your order.<br>
					<a href="account.php"><i class="icon-user"></i> Account</a>
					</p>
				</div>
			</div>
		</div>
		<?php include ("footer.php"); ?>
	 </div>

</div>
<div class="col-sm-2"></div> 
</body> 
</html>