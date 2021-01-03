
<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php include "classes/user.php"; ?>
<?php
session_start();

$user = new Site\User();
$user->ip = $_SERVER['REMOTE_ADDR'];
logVisitor($user->ip, 'register.php');
$message2 = "";

$missed_firstname = "";
$missed_email = "";
$missed_username = "";
$missed_password = "";
$label_email = "#777";
$label_firstname = "#777";
$label_password = "#777";
$label_username = "#777";
if(isset($_POST['register_submit'])) {
	$missing = 0;
	if (empty($_POST['register_firstname'])) {
		$missed_firstname = "missing firstname";
		$label_firstname = "orangered";
		$missing = $missing + 1;
	} else {
		$missed_firstname = "";
		$label_firstname = "#777";
		
	}
	if (empty($_POST['register_email'])) {
		$missed_email = "missing email";
		$label_email = "orangered";
		$missing = $missing + 1;
	} else {
		$missed_email = "";
		$label_email = "#777";
	}
	if (empty($_POST['register_username'])) {
		$missed_username = "missing username";
		$label_username = "orangered";
		$missing = $missing + 1;
	} else {
		$missed_username = "";
		$label_username = "#777";
	}
	if (empty($_POST['register_password'])) {
		$missed_password = "missing password";
		$label_password = "orangered";
		$missing = $missing + 1;

	} else {
		$missed_password = "";
		$label_password = "#777";
		if (strcmp($_POST['register_password'], $_POST['register_repassword']) <> 0) {
			$message2 .= "<h4>Password repeat does not match.</h4>";

		}
	}
	if(strlen($message2) === 0 && $missing === 0) {
		$user->firstname = $_POST['register_firstname'];
		$user->lastname = $_POST['register_lastname'];
		$user->email = $_POST['register_email'];
		$user->username = $_POST['register_username'];
		$user->password = $_POST['register_password'];
		insertUser($user);
		header("Refresh:0; url=index.php");
	}
}
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
         <!-- Blog Entries Column -->
         <div class="col-md-9" style="padding: 0 3px;">

            <?php include "includes/title.php"; ?>

            <div class="well black-well">
					<form action="register.php" method="post">
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="register_firstname" style="color: <?php echo $label_firstname; ?> !important">First Name</label>
									<input type="text" name="register_firstname" id="register_firstname" class="form-control" placeholder="<?php echo $missed_firstname; ?>" value="<?php echo $user->firstname; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="register_lastname">Last Name</label>
									<input type="text" name="register_lastname" id="register_lastname" class="form-control" placeholder="lastname is optional" value="<?php echo $user->lastname; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="register_email" style="color: <?php echo $label_email; ?> !important">Email</label>
									<input type="email" name="register_email" id="register_email" class="form-control" placeholder="<?php echo $missed_email; ?>" value="<?php echo $user->email; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="register_username" style="color: <?php echo $label_username; ?> !important">User Name</label>
									<input type="text" name="register_username" id="register_username" class="form-control" placeholder="<?php echo $missed_username; ?>" value="<?php echo $user->username; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="register_password" style="color: <?php echo $label_password; ?> !important">Password</label>
									<input type="password" name="register_password" id="register_password" class="form-control" placeholder="<?php echo $missed_password; ?>">
								</div>
							</div>
							<div class="col-xs-12 col-md-6">
								<div class="form-group">
									<label for="register_repassword" style="color: <?php echo $label_password; ?> !important">Repeat Password</label>
									<input type="password" name="register_repassword" id="register_repassword" class="form-control" placeholder="<?php echo $missed_password; ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<?php echo $message2; ?><input type="submit" class="btn btn-primary pull-right" name="register_submit" value="Submit">
							</div>
						</div>
					</form>
            </div>
				<div class="well black-well">
					<div class="row">
						<div class="col-xs-12">
							<h4 class="left-title"><small>Thank you for registering at</small><br>eldisrice.com<br><small>Your email will not be given to anyone.<br>It is used for verification purpose only.</small></h4>
						</div>
					</div>
				</div>
         </div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3"><?php include "includes/sidebar.php"; ?></div>
      </div>
   </div>
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>
</body>
</html>
