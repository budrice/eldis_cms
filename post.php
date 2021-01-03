<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "classes/games/post.php"; ?>
<?php include "classes/games/comment.php"; ?>
<?php session_start(); ?>

<?php
$pid = $_GET['id'];
$userIP = $_SERVER['REMOTE_ADDR'];
logVisitor($userIP, 'post.php', $pid);

$post_result = getPostById($pid);
$post = new Games\Post();
$comments = getAllComments($pid, 2);
$show_response_button = "show";
$show_response_form = "hidden";
if(isset($_GET['response_form'])) {
   if($_GET['response_form'] == "show") {
      $show_response_button = "hidden";
      $show_response_form = "show";
   } else {
      $show_response_button = "show";
      $show_response_form = "hidden";
   }
}
if(isset($_POST['comment_submit'])) {
   $comment = new Games\Comment();
   $comment->post_id       = $pid;
   $comment->author_id     = $_SESSION['site_id'];
   $comment->content       = $_POST['comment_content'];
   $comment->status_id     = 1;
   $comment->parent_id     = 0;
   $comment->count_number  = 0;
   insertComment($comment);
   updatePostCommentCount($pid);
} else {

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
<?php include "includes/page_header.php"; ?>
<?php include "includes/nav.php"; ?>
   <!-- Page Content -->
   <div class="container wrapper-search">
      <div class="row">
         <div class="col-lg-9" style="padding: 0 3px;">
            <div class="well black-well">
               <div class="row">
                  <div class="col-xs-12">
                     <h4 class="left-title"><small><i class="glyphicon glyphicon-pencil fa-3x"></i></small>&nbsp;eldisrice.com&nbsp;<small>BLOG</small></h4>
                  </div>
               </div>
            </div>

            <!-- Blog Post -->
<?php
if(count($post_result) === 0) {
   echo "<h1>No result found.<br><small>Time to write us one!</small></h1>";
}
foreach($post_result as $row) {
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
                  <p><?php echo $post->content; ?></p>
               </div>
            </div>
<?php 
}
?>
            <!-- Blog Comments -->
            <!-- Comments Form -->
            <div class="well" style="padding: 16px !important;">
               <h4>Leave a Comment:</h4>
               <form action="" method="post">
<!--
                  <div class="form-group">
                     <label for="comment_author">Comment Author</label>
                     <input type="text" class="form-control" id="comment_author" name="comment_author">
                  </div>
-->
                  <div class="form-group">
                     <label for="comment_content">Comment</label>
                     <textarea class="form-control" rows="3" id="comment_content" name="comment_content"></textarea>
                  </div>
<?php 
if(isset($_SESSION['site_id'])) {
   echo '<input type="submit" class="btn btn-primary" name="comment_submit" value="submit">';
} else {
   echo '<a href="login.php">You must be logged in to comment.</a>';
}
?>

               </form>
            </div>
            <div class="well black-well" style="padding: 16px !important;">
<?php
foreach($comments as $row) {
?>
               <div class="row">
                  <div class="col-xs-2">
                     <div class="row">
                        <div class="user-circle-image-comment" style="background-image: url(images/<?php echo $row['image']; ?>)"></div>
                     </div>
                      <div class="row" style="text-align: center;">
                        <h6 class="user-title"><strong><?php echo $row['username'] ?></strong><br><small><?php echo $row['title'] ?></small></h6>
                     </div>
                  </div>
                  <div class="col-xs-10">
                     <h4 class="media-heading"><?php echo $row['post_title']; ?>
                        <br>
                        <small><?php echo date_format(date_create($row['comment_date']),"F d Y g:i a"); ?></small>
                     </h4>
                     <div class="well"><p><?php echo $row['comment_content']; ?></p></div>
                  </div>
               </div>
               <hr>
<?php 
}
?>

            </div>
         </div> 
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_bottom"><?php include "includes/sidebar.php"; ?></div>
      </div>
    </div>
    <?php include "includes/footer.php"; ?>
</body>
</html>