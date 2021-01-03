<?php 
$cid = 0;
$cat_title = null;
$message = "";
$danger = "";
$input_type = "hidden";
$refresh = 2;
if(isset($_GET['action'])) {
   if ($_GET['action'] == 'delete') {
      deleteCategory($_GET['cat_id']);
   } else {
      $input_type = "submit";
      $cid = $_GET['cat_id'];
      $cat_title = $_GET['cat_title'];
   }
}
if(isset($_POST['insert_cat'])) {
   if($_POST['cat_title'] == "" || empty($_POST['cat_title'])) {
      $message = "This field should not be empty";
   } else {
      insertCategory($_POST['cat_title']);
      $message = "insert was successful";
      $input_type = "hidden";
      header("Refresh:2; url=admin.php?source=post_categories");
   }
} else if(isset($_POST['update_cat'])) {
   if($_POST['cat_id'] == "" || empty($_POST['cat_id'])) {
      $message = "No category was chosen";
   } else {
      if($_POST['cat_title'] == "" || empty($_POST['cat_title'])) {
         $message = "This field should not be empty";
      } else {
         updateCategory($_POST['cat_id'], $_POST['cat_title']);
         $message = "update was successful";
         $input_type = "hidden";
         header("Refresh:2; url=admin.php?source=post_categories");
      }
   }
} else if(isset($_POST['clear_cat'])) {
   $message = "";
   $cid = 0;
   $cat_title = null;
   $input_type = "hidden";
   header("Refresh:0; url=admin.php?source=post_categories");
}
?>
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><i class="fa fa-list fa-3x"></i>&nbsp;&nbsp;<small>CATEGORIES</small>&nbsp;eldisrice.com</h4>
            </div>
         </div>
      </div>
      <div class="no-pad col-xs-12" style="max-width: 1000px;">
         <div class="col-xs-12 col-md-4">
            <form action="" method="post">
               <div class="form-group">
                  <label for="cat_title">Category Name</label>
                  <input type="text" class="form-control" id="cat_title" name="cat_title" value="<?php echo $cat_title; ?>">
                  <input type="hidden" class="form-control" id="cat_id" name="cat_id" value="<?php echo $cid; ?>">
               </div>
               <div class="row">
                  <div class="form-group">
                     <div class="col-xs-4">
                        <input type="submit" class="btn btn-primary form-control" name="insert_cat" value="Add">
                     </div>
                     <div class="col-xs-4">
                        <input type="<?php echo $input_type; ?>" class="btn btn-primary form-control" name="update_cat" value="Update">
                     </div>
                     <div class="col-xs-4">
                        <input type="<?php echo $input_type; ?>" class="btn btn-primary form-control" name="clear_cat" value="Clear">
                     </div>
                  </div>
               </div>
               <div class="row" style="height: 35px;">
                  <div class="col-xs-12"><?php echo $message; ?></div>
               </div>
            </form>
         </div>
         <div class="col-xs-12 col-md-8">
            <table class="table table-hover table-condensed table-bordered">
            <thead>
               <tr>
                  <th class="col-xs-1">ID</th>
                  <th class="col-xs-9">Category Title</th>
                  <th class="col-xs-1"></th>
                  <th class="col-xs-1"></th>
               </tr>
            </thead>
            <tbody>
<?php 
$result = getCategories();
foreach($result as $row) {
?>
               <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['cat_title']; ?></td>
                  <td>
                     <a href="admin.php?source=post_categories&cat_id=<?php echo $row['id']; ?>&cat_title=<?php echo urlencode($row['cat_title']); ?>&action=update" class="btn btn-info">edit</a>
                  </td>
                  <td>
                     <a href="admin.php?source=post_categories&cat_id=<?php echo $row['id']; ?>&cat_title=<?php echo urlencode($row['cat_title']); ?>&action=delete" class="btn btn-danger">delete</a>
                  </td>
               </tr>
<?php
}
?>
            </tbody>
            </table>
         </div>
      </div>
   </div>