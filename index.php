<?php include "database/db.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'eldisrice.com';
   include "includes/head.php";
?>
</head>
<body>
<?php 
$userIP = $_SERVER['REMOTE_ADDR'];
logVisitor($userIP, 'index.php');

$text_slideshow = 0;
$header = null;
$row1_img = null;
$row1_header = null;
$row1_content = null;
$row1_button = null;
$row1_button_href = null;
$row2_img = null;
$row2_header = null;
$row2_content = null;
$row2_button = null;
$row2_button_href = null;
$row3_img = null;
$row3_header = null;
$row3_content = null;
$row3_button = null;
$row3_button_href = null;
$result = getLanding(1);
foreach($result as $row) {
   $text_slideshow = $row['text_slideshow'];
   $header = $row['header'];
   $row1_img = $row['row1_img'];
   $row1_header = $row['row1_header'];
   $row1_content = $row['row1_content'];
   $row1_button = $row['row1_button'];
   $row1_button_href = $row['row1_button_href'];
   $row2_img = $row['row2_img'];
   $row2_header = $row['row2_header'];
   $row2_content = $row['row2_content'];
   $row2_button = $row['row2_button'];
   $row2_button_href = $row['row2_button_href'];
   $row3_img = $row['row3_img'];
   $row3_header = $row['row3_header'];
   $row3_content = $row['row3_content'];
   $row3_button = $row['row3_button'];
   $row3_button_href = $row['row3_button_href'];
}
$_SESSION['eldis_cms_text_slideshow'] = $text_slideshow;
?>
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>
   <!-- Page Content -->
   <div class="container wrapper-search">
      <div class="row">
         <div class="col-md-9" style="padding: 0 3px;">
            <?php include "includes/title.php"; ?>
            <?php include "includes/carousel.php"; ?>
         </div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-xs-12 col-md-3"><?php include "includes/sidebar.php"; ?></div>
      </div>
   </div>
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>

</body>
</html>