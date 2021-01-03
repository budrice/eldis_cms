<?php 
$uid;
$message = "";
$user = new Site\User();
if(isset($_GET['edit_user'])) {
   $user->id = $_GET['edit_user'];
   $result = getUserById($user->id);
   foreach($result as $row) {
      $user->title = $row['title'];
      $user->username = $row['username'];
      $user->firstname = $row['firstname'];
      $user->lastname = $row['lastname'];
      $user->image = $row['image'];
      $user->email = $row['email'];
      $user->role = $row['role'];
   }
}
if(isset($_POST['user_update_submit'])) {
   
   $user->title = $_POST['user_update_user_title'];
   $user->username = $_POST['user_update_user_username'];
   $user->firstname = $_POST['user_update_user_firstname'];
   $user->lastname = $_POST['user_update_user_lastname'];
   $user->email = $_POST['user_update_user_email'];
   $user->role = $_POST['user_update_user_role'];
   
   $message = "FIRSTNAME: " . $user->firstname;
   $message = validateUserForm($user);
   if(strlen($message) === 0) {
      updateUser($user);
//      header("Refresh:0; url=admin.php?source=users_all");
   }
}
?>
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><i class="fa fa-users fa-3x"></i>&nbsp;&nbsp;<small>UPDATE MEMBER</small>&nbsp;eldisrice.com</h4>
            </div>
         </div>
      </div>
      <div class="no-pad col-xs-12">
        <h5><?php echo $message; ?></h5>
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-md-offset-1 col-lg-offset-3 col-xs-5 col-md-3 col-lg-2">
                  <img src="images/<?php echo $user->image; ?>" class="img-responsive" alt="<?php echo $user->username; ?>">
                  <div class="row">
                     <div class="col-xs-6">
                        <a href="" class="form-control btn btn-success">Approve</a>
                     </div>
                     <div class="col-xs-6">
                        <a href="" class="form-control btn btn-danger">Unapprove</a>
                     </div>
                  </div>
               </div>
               <div class="col-xs-7 col-md-7 col-lg-4">
                  <div class="form-group">
                     <label for="Title">Title</label>
                     <input type="text" class="form-control" id="user_update_user_title" name="user_update_user_title" value="<?php echo $user->title; ?>" placeholder="enter title">
                  </div>
                  <div class="form-group">
                     <label for="Title">Username</label>
                     <input type="text" class="form-control" id="user_update_user_title" name="user_update_user_username" value="<?php echo $user->username; ?>" placeholder="enter username">
                  </div>
                  <div class="form-group">
                     <label for="Title">Firstname</label>
                     <input type="text" class="form-control" id="user_update_user_title" name="user_update_user_firstname" value="<?php echo $user->firstname; ?>" placeholder="enter firstname">
                  </div>
                  <div class="form-group">
                     <label for="Title">Lastname</label>
                     <input type="text" class="form-control" id="user_update_user_title" name="user_update_user_lastname" value="<?php echo $user->lastname; ?>" placeholder="enter lastname">
                  </div>
                  <div class="form-group">
                     <label for="Title">Email</label>
                     <input type="email" class="form-control" id="user_update_user_title" name="user_update_user_email" value="<?php echo $user->email; ?>" placeholder="enter email">
                  </div>
                  <div class="form-group">
                     <label for="Title">Role</label>
                     <input type="number" class="form-control" id="user_update_user_title" name="user_update_user_role" value="<?php echo $user->role; ?>" placeholder="enter role">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-xs-12">
                  <input type="submit" class="btn btn-info" name="user_update_submit">
               </div>
            </div>
         </form>
      </div>
   </div>