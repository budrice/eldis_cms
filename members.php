<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'Bad Nerve - Members';
   include "includes/head.php";
?>
</head>
<body>
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>

   <div class="container wrapper-search">
      <div class="row">
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_top"><?php include "includes/sidebar.php"; ?></div>
         <div class="col-md-9" style="padding: 0 3px;">
            <div class="well black-well">
               <div class="row">
                  <div class="col-md-offset-3 col-md-9">
                     <h4 style="color: rgba(10 155 180 / 85%);"><small>Members with the </small>&nbsp;Bad Nerve</h4>
                  </div>
               </div>
            </div>
<?php 
$user_image = "default_user.jpg";
$user_image_alt = "no user image";
$result = getUsers();
foreach($result as $row) {
?>
            <div class="well black-well">
               <div class="row">
                  <div class="col-md-3 no-pad">
                     <div class="row">
                        <div class="user-circle-image" style="background-image: url(images/<?php echo $row['image']; ?>)"></div>
                     </div>
                     <div class="row" style="text-align: center;">
                        <span class="user-title"><strong><?php echo $row['username'] ?></strong></span>
                     </div>
                  </div>
                  <div class="well col-md-9" style="min-height: 155px; margin-bottom: 0 !important; padding: 3px 10px !important;">
                     <div class="row">
                        <div class="col-xs-12 no-pad">
                           <h3 class="member_user_name"><strong><?php echo $row['username'] ?></strong> <small><?php echo $row['title']; ?></small></h3>
                           <p><?php echo $row['about']; ?></p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-xs-5 no-pad">
                           <h6 style="color: rgba(10 155 180 / 85%); margin: 0 0 3px;">GAMES <small>TYPES</small></h6>
                              <ul class="list-unstyled">
<?php 
   $res = getAllUserCategoriesById($row['id']);
   $len = count($res);
   $len = $len > 4 ? 4 : $len;
   for($i = 0; $i < $len; $i++) {
?>
                                 <li><?php echo $res[$i]['cat_title']; ?></li>
<?php
   }
?>
                              </ul>
                        </div>
                        <div class="col-xs-7">
                           <h6 style="color: rgba(10 155 180 / 85%); margin: 0 0 3px;">GAMES <small>PLAYING</small></h6>
                           <div class="row">
                              <ul class="list-unstyled">
<?php 
   $res = getAllUserGamesById($row['id']);
   $len = count($res);
   $len = $len > 4 ? 4 : $len;
   for($i = 0; $i < $len; $i++) {
?>
                                 <li><?php echo $res[$i]['game_name']; ?></li>
<?php
   }
?>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
<?php 
}
?>
         </div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_bottom"><?php include "includes/sidebar.php"; ?></div>
      </div>
   </div>
   <?php include "includes/footer.php"; ?>
</body>
</html>