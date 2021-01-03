<?php include "database/db.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'Bad Nerve';
   include "includes/head.php";
?>
</head>
<body>
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>
   <!-- Page Content -->
   <div class="wrapper-search container">
	<?php include "phpBB3/index.php"; ?>
   </div>
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>
</body>
</html>