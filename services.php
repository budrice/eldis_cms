<?php include "database/db.php"; ?>
<?php include "database/statistics_functions.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php 
session_start(); 
$userIP = $_SERVER['REMOTE_ADDR'];
logVisitor($userIP, 'services.php');
$icons = getIcons();



?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php
   $title = 'eldisrice.com';
   include "includes/head.php";
?>
<style>
.icon-flipped {
    transform: scaleX(-1);
    -moz-transform: scaleX(-1);
    -webkit-transform: scaleX(-1);
    -ms-transform: scaleX(-1);
}
</style>
</head>
<body>
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>

   <div class="container wrapper-search">
      <div class="row">
         <div class="col-md-9" style="padding: 0 3px;">
            <?php include "includes/title.php"; ?>
            <div class="well black-well">
					<div class="row">
						<div class="col-xs-12">
							<h4 class="left-title"><small><i class="fa fa-truck fa-3x icon-flipped"></i></small>&nbsp;eldisrice.com&nbsp;<small>SERVICES</small></h4>
						</div>
					</div>
					<hr>
               <div class="row" style="padding: 20px 0;">
                  <div class="col-md-6">
                     <div class="panel panel-green">
								<div class="panel-heading">
									<h3 class="panel-title">CMS Blog Site</h3>
								</div>
								<div class="panel-body" style="min-height: 247px;">
									
									<ul>
										<li>HTML, CSS&nbsp;template</li>
										<li>PHP and JavaScript&nbsp;scripting</li>
										<li>MySQL database w/ prepared queries</li>
										<li>password encrypted</li>
										<li>5 default user levels</li>
										<li>searchable content</li>
										<li>editable landing page</li>
										<li>visitor statistics</li>
										<li>admin dashboard</li>
									</ul>
									<p>This website is an example of the CMS System for sale.</p>
								</div>
								<div class="row panel-heading">
									<div class="col-xs-12 col-md-6"><h3>$199.00</h3></div>
									<div class="col-xs-12 col-md-6"><a href="contact.php?request=blog" class="btn btn-default form-control" style="color: #000;">Purchase Blog</a></div>
									<div class="col-xs-12">
										<h6>$20.00 per hour for additional customization/pages</h6>
									</div>
								</div>
							</div>
                  </div>
						<div class="col-md-6">
                     <div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Web Development</h3>
								</div>
								<div class="panel-body" style="min-height: 247px;">
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<ul>
												<li>PHP</li>
												<li>AngularJS</li>
												<li>VueJS</li>
												<li>NodeJS</li>
												<li>ExpressJS</li>
												<li>MySQL</li>
											</ul>
										</div>
										<div class="col-xs-12 col-md-6">
											<ul>
												<li>CMS</li>
												<li>Forms</li>
												<li>Web Scrapers</li>
												<li>API</li>
												<li>File Server</li>
												<li>Dashboard</li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p>I can help you with your web project. Lets discuss what you need and implement an affordable solution.</p>
											<p>A project plan will be written up with a projected time table of milestone completion dates. Use the contact form to request a meeting to lay out a plan.</p>
										</div>
									</div>
								</div>
								<div class="row panel-heading">
									<div class="col-xs-12 col-md-6"><h3>$24.00&nbsp;<span style="font-size: 0.65em;">per&nbsp;hour</span></h3></div>
									<div class="col-xs-12 col-md-6"><a href="contact.php?request=webdev" class="btn btn-default form-control">Request Services</a></div>
									<div class="col-xs-12">
										<h6>All projects will be written out with timelines and agreements.</h6>
									</div>
								</div>
							</div>
                  </div>
						<!-- <div class="col-md-4">
                     <div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">NodeJS Web Scraper</h3>
								</div>
								<div class="panel-body">
									$40.00 per hour
								</div>
							</div>
                  </div> -->
					</div>
				</div>

			</div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_bottom"><?php include "includes/sidebar.php"; ?></div>
      </div>
   </div>
   <?php include "includes/footer.php"; ?>
</body>
</html>