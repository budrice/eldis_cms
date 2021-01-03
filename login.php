<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>

<?php 
$userIP = $_SERVER['REMOTE_ADDR'];
logVisitor($userIP, 'login.php');
$message = "";
if(isset($_POST['main_login_submit'])) {
   $username = $_POST['main_login_username'];
   $pass_to_check = $_POST['main_login_password'];
   $result = comparePassword($username, $pass_to_check);
   foreach($result as $row) {
      $_SESSION["site_id"] = $row['id'];
      $_SESSION["site_username"] = $row['username'];
      $_SESSION["site_role"] = $row['role'];
      $_SESSION["site_image"] = $row['image'];
   }
   header("Refresh:0; url=index.php");
}
if(isset($_GET['logout'])) {
   // remove all session variables
   session_unset();
   // destroy the session
   session_destroy();
   header("Refresh:0; url=index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'Bad Nerve - Login';
   include "includes/head.php";
?>
</head>
<body>
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>

   <div class="container wrapper-search">
      <?php include "includes/title.php"; ?>

         <div class="login well black-well">
            <form action="login.php" method="post">
               
               <div class="row">
                  <div class="col-xs-12" style="padding: 3px 15px;">
                     <input type="username" class="form-control" id="main_login_username" name="main_login_username" placeholder="enter username">
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-12" style="padding: 3px 15px;">
                     <input type="password" class="form-control" id="main_login_password" name="main_login_password" placeholder="enter password">
                  </div>
               </div>
               <div class="row">
                  <div class="col-xs-6" style="padding: 3px 3px 3px 15px;">
                     <input type="submit" class="form-control btn btn-primary" id="main_login_submit" name="main_login_submit" value="Login">
                  </div>
                  <div class="col-xs-6" style="padding: 3px 15px 3px 3px;">
                     <a href="register.php" class="form-control btn btn-info" id="main_login_register" name="main_login_register">Register</a>
                  </div>
               </div>
            </form>
            <h4 style="text-align: center; color: #fff;"><?php echo $message; ?></h4>
         </div>


   </div>
   <?php include "includes/footer.php"; ?>
</body>
</html>