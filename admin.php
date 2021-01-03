<?php include "database/db.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "functions/global_functions.php"; ?>
<?php include "classes/user.php"; ?>
<?php include "classes/landing.php"; ?>
<?php include "classes/text_slide.php"; ?>
<?php include "classes/games/post.php"; ?>
<?php include "classes/games/comment.php"; ?>
<?php session_start(); ?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$title = 'eldisrice.com';
include "includes/head.php";
?>
</head>
<body>
<?php include "includes/page_header.php"; ?>
<!-- Navigation -->
<?php include "includes/nav.php"; ?>
<!-- Content -->
<?php 

if(isset($_SESSION['site_role'])) {
	if($_SESSION['site_role'] < 3) {
      header("Location: index.php");
   }
} else {
   header("Location: index.php");
}

$source = '';
if(isset($_GET['source'])) {
   $source = $_GET['source'];
   if(isset($_GET['post_id'])) {
      $post_id = $_GET['post_id'];
   }
}
switch($source) {
   case 'edit_landing':
      include 'includes/edit_landing.php';
      break;
   case 'post_all':
      include "includes/table_all_posts.php";
      break;
   case 'post_create':
      include "includes/post_create.php";
      break;
   case 'post_update':
      include "includes/post_update.php";
      break;
   case 'post_categories':
      include "includes/categories.php";
      break;
   case 'post_comments':
      include "includes/post_comments.php";
      break;
   case 'users_all':
      include "includes/table_all_users.php";
      break;
   case 'user_create':
      include "includes/user_create.php";
      break;
   case 'user_update':
      include "includes/user_update.php";
      break;
   case 'contact_messages':
      include "includes/message_list.php";
      break;
   case 'visitor_statistics':
      include "includes/visits.php";
      break;
   case 'playground':
      include "includes/playground.php";
      break;
   default:
      include "includes/dashboard.php";
      break;
}
?>
<?php include "includes/footer.php"; ?>
</body>
</html>