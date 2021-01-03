<?php 
$user = new Site\User();
$message;
if(isset($_POST['create_user_submit'])) {
   
   $user->username   = $_POST['user_create_user_username'];
   $user->password   = $_POST['user_create_user_password'];
   $user->firstname  = $_POST['user_create_user_firstname'];
   $user->lastname   = $_POST['user_create_user_lastname'];
   $user->title      = $_POST['user_create_user_title'];
   $user->email      = $_POST['user_create_user_email'];
   $user->role       = $_POST['user_create_user_role'];
   $user->image      = $_FILES['user_create_user_image']['name'];
   $user_image_temp  = $_FILES['user_create_user_image']['tmp_name'];
   
   $message = validateUserForm($user);
   	
   if(strlen($message) === 0) {
      echo $user->username;
      move_uploaded_file($user_image_temp, "images/{$user->image}");
      insertUser($user);
      header("Refresh:0; url=admin.php?source=users_all");
   } else {
      $message = "The " . $message . " are required.";
   }
}
?>
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><i class="fa fa-users fa-3x"></i>&nbsp;&nbsp;<small>CREATE MEMBER</small>&nbsp;eldisrice.com</h4>
            </div>
         </div>
      </div>
      <div class="no-pad col-xs-12">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-xs-6 col-md-3">
                  <div class="form-group">
                     <label for="Title">Username</label>
                     <input type="text" class="form-control" id="user_create_user_username" name="user_create_user_username" placeholder="enter username">
                  </div>
                  <div class="form-group">
                     <label for="user_create_user_password">Password</label>
                     <!-- didn't use password type as the only person who should see this form is an admin -->
                     <input type="text" class="form-control" id="user_create_user_password" name="user_create_user_password" placeholder="enter password">   
                  </div>
                  <div class="form-group">
                     <label for="Title">Firstname</label>
                     <input type="text" class="form-control" id="user_create_user_firstname" name="user_create_user_firstname" placeholder="enter firstname">
                  </div>
                  <div class="form-group">
                     <label for="Title">Lastname</label>
                     <input type="text" class="form-control" id="user_create_user_lastname" name="user_create_user_lastname" placeholder="enter lastname">
                  </div>
               </div>
               <div class="col-xs-6 col-md-3">
                  <div class="form-group">
                     <label for="Title">Title</label>
                     <input type="text" class="form-control" id="user_create_user_title" name="user_create_user_title" placeholder="enter title">
                  </div>
                  <div class="form-group">
                     <label for="Title">Email</label>
                     <input type="email" class="form-control" id="user_create_user_email" name="user_create_user_email" placeholder="enter email">
                  </div>
                  <div class="form-group">
                     <label for="Title">Role</label>
                     <input type="number" class="form-control" id="user_create_user_role" name="user_create_user_role" placeholder="enter role">
                  </div>
                  <div class="form-group">
                     <label for="Title">Image</label>
                     <input type="file" class="form-control" id="user_create_user_image" name="user_create_user_image">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12">
                  <input type="submit" class="btn btn-info" id="user_create_create_user_btn" name="create_user_submit">
               </div>
            </div>
         </form>
      </div>
   </div>