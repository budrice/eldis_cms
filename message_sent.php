<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>

<?php 
session_start();
ob_start();
// $userIP = $_SERVER['REMOTE_ADDR'];
// logVisitor($userIP, 'message_sent.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'eldisrice.com';
   include "includes/head.php";
?>
</head>
<body>
   <!-- Navigation -->
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>
   <!-- Page Content -->
   <div class="container wrapper-search">
      <div class="row">
         <div class="col-md-9" style="padding: 0 3px;">
            <?php include "includes/title.php"; ?>
				<div class="well black-well">
					<div class="row">
						<div class="col-xs-4">
							<h4 class="left-title"><small><i class="fa fa-envelope fa-3x"></i></small>&nbsp;contact&nbsp;<small>FORM</small></h4>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-xs-12">
							<h3>Your message was sent, I will read it shortly.</h3>
						</div>
					</div>
				</div>
         </div>
         <div class="sticky-sidebar no-pad col-md-3"><?php include "includes/sidebar.php"; ?></div>
      </div>
   </div>
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>
</body>
</html>