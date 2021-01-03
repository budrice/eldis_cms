<?php

$result = getUsers();
if(isset($_GET)) {
   if(isset($_GET['delete_user'])) {
      $uid = $_GET['delete_user'];
      deleteUser($uid);
      header('Refresh: 0; url=admin.php?source=users_all');
   }
   if(isset($_GET['unapprove_user'])) {
      $uid = $_GET['unapprove_user'];
      updateUserRole($uid, 0);
      header('Refresh: 0; url=admin.php?source=users_all');
   }
   if(isset($_GET['approve_user'])) {
      $uid = $_GET['approve_user'];
      updateUserRole($uid, 2);
      header('Refresh: 0; url=admin.php?source=users_all');
   }
   if(isset($_GET['admin_user'])) {
      $uid = $_GET['admin_user'];
      updateUserRole($uid, 3);
      header('Refresh: 0; url=admin.php?source=users_all');
   }
}

?>
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><i class="fa fa-users fa-3x"></i>&nbsp;&nbsp;<small>MEMBERS</small>&nbsp;eldisrice.com</h4>
            </div>
         </div>
      </div>
      <div class="well black-well">
         <table class="panel table table-hover table-condensed table-bordered">
            <thead>
               <tr>
                  <th>Title</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Image</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th style="width: 110px !important;"></th>
                  <th style="width: 110px !important;"></th>
                  <th style="width: 110px !important;"></th>
                  <th style="width: 110px !important;"></th> 
                  <th style="width: 110px !important;"></th> 
        
               </tr>
            </thead>
            <tbody>
<?php 
if ($result) {
    foreach ($result as $row) {
        ?>
               <tr>
                  <td><?php echo $row['title']; ?></td>
                  <td><?php echo $row['firstname']; ?></td>
                  <td><?php echo $row['lastname']; ?></td>
                  <td><img src="images/<?php echo $row['image']; ?>" alt="<?php echo $row['image_alt']; ?>" height="90"></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['role']; ?></td>
                  
                  <td><a href="admin.php?source=users_all&admin_user=<?php echo $row['id']; ?>" class="form-control btn btn-success">Admin</a></td>
                  
                  <td><a href="admin.php?source=users_all&approve_user=<?php echo $row['id']; ?>" class="form-control btn btn-success">Member</a></td>
                  
                  <td><a href="admin.php?source=users_all&unapprove_user=<?php echo $row['id']; ?>" class="form-control btn btn-warning">Suspend</a></td>
                  
                  <td><a href="admin.php?source=users_all&delete_user=<?php echo $row['id']; ?>" class="form-control btn btn-danger" name="users_all_delete_user">Delete</a></td>
                  
                  <td><a href="admin.php?source=user_update&edit_user=<?php echo $row['id']; ?>" class="form-control btn btn-info">Edit</a></td>
                  
               </tr>
<?php
   }
}
?>
            </tbody>
         </table>
      </div>
   </div>