
            <div class="panel panel-primary">
               <div class="panel-heading">
                  <div class="row">
<?php 
$result1 = getCount('cms_users');
$result2 = getCount('cms_users', 'id', 'role', 0);
$result3 = getCount('cms_users', 'id', 'role', 1);
$result4 = getCount('cms_users', 'id', 'role', 2);
$result5 = getCount('cms_users', 'id', 'role', 3);
$result6 = getCount('cms_users', 'id', 'role', 4);
$result7 = getCount('cms_users', 'id', 'role', 5);
$count_users = 0;
$count_user_reject = 0;
$count_user_recruit = 0;
$count_user_sergeant = 0;
$count_user_captain = 0;
$count_user_colonel = 0;
$count_user_general = 0;
foreach($result1 as $row) {
   $count_users = $row['count'];
}
foreach($result2 as $row) {
   $count_user_reject = $row['count'];
}
foreach($result3 as $row) {
   $count_user_recruit = $row['count'];
}
foreach($result4 as $row) {
   $count_user_sergeant = $row['count'];
}
foreach($result5 as $row) {
   $count_user_captain = $row['count'];
}
foreach($result6 as $row) {
   $count_user_colonel = $row['count'];
}
foreach($result7 as $row) {
   $count_user_general = $row['count'];
}
?>
                     <div class="col-xs-2 no-pad">
                        <i class="fa fa-users fa-3x"></i>
                     </div>
                     <div class="col-xs-9">
                        <div class="huge pull-right"><?php echo $count_users . " Members"; ?></div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-xs-4">
                        <div class="huge"><?php echo $count_user_captain; ?></div>
                        <div>Admins</div>
                     </div>
                     <div class="col-xs-4">
                        <div class="huge"><?php echo $count_user_colonel; ?></div>
                        <div>Publishers</div>
                     </div>
                     <div class="col-xs-4">
                        <div class="huge"><?php echo $count_user_general; ?></div>
                        <div>Managers</div>
                     </div>
                  </div>
               </div>
               <a href="admin.php?source=users_all">
                  <div class="panel-footer">
                     <span class="pull-left">View Details</span>
                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                     <div class="clearfix"></div>
                  </div>
               </a>
            </div>