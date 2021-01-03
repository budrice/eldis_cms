<?php
$username = null;
$role = null;
if(isset($_SESSION['site_username'])) {
    $username = $_SESSION['site_username'];
}
if(isset($_SESSION['site_role'])) {
    $role = $_SESSION['site_role'];
}
$show_user_links = $username ? "show" : "hidden";
$logbtn = $username ? "Log Out" : "Log In";
$forum_class = $username ? "Log Out" : "Log In";
?>
        <nav class="sticky navbar navbar-inverse" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex0-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">eldisrice.com</a>
                </div>
                <ul class="nav navbar-nav top-nav collapse navbar-collapse navbar-ex0-collapse">
                    <li><a href="blogs.php">Blog</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
<?php 
if($role >= 3) {
?>
                    <li><a href="admin.php">Admin</a></li>
<?php 
}
?>
                          
                </ul>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                        <ul class="dropdown-menu message-dropdown">
                           <li class="message-preview">
                               <a href="#">
                                   <div class="media">
                                       <span class="pull-left">
                                           <img class="media-object" src="http://placehold.it/50x50" alt="">
                                       </span>
                                       <div class="media-body">
                                           <h5 class="media-heading">
                                               <strong>John Smith</strong>
                                           </h5>
                                           <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                           <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                       </div>
                                   </div>
                               </a>
                           </li>
                           <li class="message-preview">
                               <a href="#">
                                   <div class="media">
                                       <span class="pull-left">
                                           <img class="media-object" src="http://placehold.it/50x50" alt="">
                                       </span>
                                       <div class="media-body">
                                           <h5 class="media-heading">
                                               <strong>John Smith</strong>
                                           </h5>
                                           <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                           <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                       </div>
                                   </div>
                               </a>
                           </li>
                           <li class="message-preview">
                               <a href="#">
                                   <div class="media">
                                       <span class="pull-left">
                                           <img class="media-object" src="http://placehold.it/50x50" alt="">
                                       </span>
                                       <div class="media-body">
                                           <h5 class="media-heading">
                                               <strong>John Smith</strong>
                                           </h5>
                                           <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                           <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                       </div>
                                   </div>
                               </a>
                           </li>
                           <li class="message-footer">
                               <a href="#">Read All New Messages</a>
                           </li>
                       </ul>
                   </li> -->

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-user"></i> <?php echo $username ? $username : "Log In"; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- <li class="<?php // echo $show_user_links; ?>">
                                <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li class="divider <?php // echo $show_user_links; ?>"></li> -->
                            <li>
<?php 
if($username) {
?>
                                <a href="login.php?logout=<?php echo $_SESSION['site_role']; ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
<?php 
} else {
?>
                                <a href="login.php"><i class="fa fa-fw fa-power-off"></i> Log In</a>
<?php
}
?>                          
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
<?php 
if(strpos($_SERVER['REQUEST_URI'], "/admin.php") !== false && $role >= 3) { // <- FOR SERVER
// if(strpos($_SERVER['REQUEST_URI'], "/eldis_cms/admin.php") !== false && $role >= 3) { // <- FOR DEV
   include "admin_links.php";
}
?>
            <!-- /.navbar-collapse -->
        </nav>