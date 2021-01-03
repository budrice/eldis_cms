<?php include "database/db.php"; ?>
<?php include "database/db_functions.php"; ?>
<?php include "database/user_functions.php"; ?>
<?php include "classes/user.php"; ?>
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
   <!-- Navigation -->
   <?php include "includes/page_header.php"; ?>
   <?php include "includes/nav.php"; ?>

   <!-- Page Content -->
   <div class="container wrapper-search">


      <div class="row">
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_top"><?php include "includes/sidebar.php"; ?></div>
         <!-- Blog Entries Column -->
         <div class="col-md-9" style="padding: 0 3px;">
				<div class="row">
					<?php include "includes/title.php"; ?>
				</div>
<?php
$user = new Site\User();
if(isset($_GET['id'])) {
	$user->id = $_GET['id'];
}
if($user->id) {
	$result = getUserById($user->id);
	foreach ($result as $row) {
		$user->image = $row['image'];
		$user->username = $row['username'];
		$user->title = $row['title'];
		$user->firstname = $row['firstname'];
		$user->email = $row['email'];
		$user->lastname = $row['lastname'];
	}
}
?>
				<!-- Playground Content start -->
				<form action="" method="post">
					<div class="well black-well">
						<div class="row">
							<div class="col-xs-3 no-pad" style="background-color: rgba(0, 255, 0, 0.85);">
								<div class="row">
									<img src="images/<?php echo $user->image; ?>" alt="<?php echo $user->username; ?>" class="img-responsive">
								</div>
								<div class="row">
									<input type="file" name="user_profile_image" id="user_profile_image" class="form-control">
								</div>
							</div>
							<div class="col-xs-9">
								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label for="user_profile_username">Username</label>
											<input
												type="text" 
												id="user_profile_username" 
												name="user_profile_username" 
												class="form-control" 
												value="<?php echo $user->username; ?>"
											>
										</div>
										<div class="form-group">
											<label for="user_profile_title">Title</label>
											<input
												type="text" 
												id="user_profile_title" 
												name="user_profile_title" 
												class="form-control" 
												value="<?php echo $user->title; ?>"
											>
										</div>
										<div class="form-group">
											<label for="user_profile_firstname">First Name</label>
											<input
												type="text" 
												id="user_profile_firstname" 
												name="user_profile_firstname" 
												class="form-control" 
												value="<?php echo $user->firstname; ?>"
											>
										</div>
										<div class="form-group">
											<div class="row no-pad">
												<div class="col-xs-9 no-pad">
													<label for="">Games Playing</label>
													<select name="" id="" size="10" class="form-control">
<?php 
$res = getUserGames($_SESSION['badnerve_id']);
foreach($res as $game) {
?>
														<option value="<?php echo $game['id']; ?>"><?php echo $game['game_name']; ?></option>
<?php 
}
?>
													</select>
												</div>
												<div class="col-xs-3" style="padding: 20px 0 0 20px;">
													<div class="input-group">
														<button type="submit" class="form-control btn btn-success" name="user_profile_add_game">
															<span class="glyphicon glyphicon-chevron-left"></span>
														</button>
													</div>
													<div class="input-group">
														<button type="submit" class="form-control btn btn-danger" name="user_profile_remove_game">
															<span class="glyphicon glyphicon-chevron-right"></span>
														</button>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="user_profile_password">Password</label>
											<input
												type="text" 
												id="user_profile_password" 
												name="user_profile_password" 
												class="form-control"
											>
										</div>
										<div class="form-group">
											<label for="user_profile_email">Email</label>
											<input
												type="text" 
												id="user_profile_email" 
												name="user_profile_email" 
												class="form-control" 
												value="<?php echo $user->email; ?>"
											>
										</div>
										<div class="form-group">
											<label for="user_profile_lastname">Last Name</label>
											<input
												type="text" 
												id="user_profile_lastname" 
												name="user_profile_lastname" 
												class="form-control" 
												value="<?php echo $user->lastname; ?>"
											>
										</div>
										<div class="form-group">
											<label for="">Choose Games</label>
											<select name="" id="" size="5" class="form-control">
<?php 
$res = getAllGames();
foreach($res as $game) {
?>
												<option value="<?php echo $game['id']; ?>"><?php echo $game['game_name']; ?></option>
<?php 
}
?>
											</select>
										</div>
										<div class="form-group">
											<label for="user_profile_firstname">Add Game</label>
											<div class="input-group">
												<input type="text" class="form-control" name="user_profile_">
												<span class="input-group-btn">
													<button class="btn btn-success" type="submit" name="search_submit">
														<span class="glyphicon glyphicon-plus"></span>
													</button>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<div class="form-group">
											<label for="user_about">Tell everyone about yourself</label>
											<textarea class="form-control" name="user_about" id="user_about" cols="90" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
         </div>
         <!-- Blog Sidebar Widgets Column -->
         <div class="sticky-sidebar no-pad col-md-3" id="sidebar_wrapper_bottom"><?php include "includes/sidebar.php"; ?></div>
      </div>
      <!-- /.row -->
   </div>
   <!-- /.container -->
   <!-- Footer -->
   <?php include "includes/footer.php"; ?>
</body>
</html>