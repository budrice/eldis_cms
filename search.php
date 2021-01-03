<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "classes/games/post.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'Bad Nerve - Blogs';
   include "includes/head.php";
?>
</head>
<body>
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>
   <!-- Page Content -->
   <div class="container wrapper-search">
      <div class="row">
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_top"><?php include "includes/sidebar.php"; ?></div>
         <!-- Blog Entries Column -->
         <div class="col-md-9" style="padding: 0 3px;">
               <div class="well black-well">
						<div class="row">
							<div class="col-xs-12">
								<h4 class="left-title"><small><i class="glyphicon glyphicon-pencil fa-3x"></i></small>&nbsp;eldisrice.com&nbsp;<small>BLOG</small></h4>
							</div>
						</div>
               </div>
<?php
$post = new Games\Post();
$post_result = array();
$cnt = 0;
if(isset($_POST['search_blogs_submit'])) {
   $userIP = $_SERVER['REMOTE_ADDR'];
   logVisitor($userIP, 'search.php', 0, $_POST['search']);
   $post_result = getSearch($_POST['search']);
}
if(count($post_result) === 0) {
   echo "<h1>No result found.<br><small>Time to write us one!</small></h1>";
} else {
   foreach ($post_result as $row) {
      $post->id               = $row['id'];
      $post->title            = $row['post_title'];
      $post->author           = $row['post_author'];
      $post->author_image     = $row['post_author_image'];
      $post->author_image_alt = $row['post_author_image_alt'];
      $post->post_date        = date_create($row['post_date']);
      $post->image            = $row['post_image'];
      $post->image_alt        = $row['post_image_alt'];
      $post->content          = $row['post_content'];
?>
               <!-- Blog Post start -->
               <div class="well black-well">
                  <div class="row">
                     <div class="col-xs-6">
                        <h6 class="post-title"><small><span class="glyphicon glyphicon-time"></span> Posted on </small><?php echo date_format($post->post_date,"F d Y g:i a"); ?></h6>
                     </div>
                     <div class="col-xs-6">
                        <h6 class="post-title"><small><span class="glyphicon glyphicon-time"></span> Posted by </small><?php echo $post->author; ?></h6>
                     </div>
                  </div>
                  <div class="well white-well" style="padding: 12px !important;">
                     <div class="row">
                        <div class="col-xs-12">
                           <h4 class="centered-title"><?php echo $post->title; ?><br><small>by <?php echo $post->author; ?> </small></h4>
                        </div>
                     </div>
                     <hr>
                     <img class="img-responsive" src="images/<?php echo $post->image; ?>" alt="<?php echo $post->image_alt; ?>">
                     <hr>
                     <div class="trunicated"><?php echo $post->content; ?></div>
                  </div>
                  <!-- Blog Post end -->
                  <a class="btn btn-primary" href="post.php?id=<?php echo $post->id; ?>">Read More</a>
               </div>

<?php
   }
}
?>
         </div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_bottom"><?php include "includes/sidebar.php"; ?></div>
      </div>
   </div>
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>
</body>
</html>