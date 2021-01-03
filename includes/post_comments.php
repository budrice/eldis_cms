<?php
if(isset($_GET['comment_delete'])) {
   $id = $_GET['comment_delete'];
   deleteComment($id);
   header("Refresh:0; url=admin.php?source=post_comments");
}
if(isset($_GET['comment_approve'])) {
   $id = $_GET['comment_approve'];
   updateCommentStatus($id, 2);
   header("Refresh:0; url=admin.php?source=post_comments");
}
if(isset($_GET['comment_unapprove'])) {
   $id = $_GET['comment_unapprove'];
   updateCommentStatus($id, 3);
   header("Refresh:0; url=admin.php?source=post_comments");
}
?>
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><i class="fa fa-comments fa-3x"></i>&nbsp;&nbsp;<small>COMMENTS</small>&nbsp;eldisrice.com</h4>
            </div>
         </div>
      </div>
      <div class="no-pad col-xs-12">
         <table class="table table-hover table-condensed table-bordered">
            <thead>
               <tr>
                  <th class="cell thead" title="Title">Post Title</th>
                  <th class="cell thead" title="Author">Commentor</th>
                  <th class="cell thead" title="Date">Date</th>
                  <th class="cell thead">Content</th>
                  <th class="cell thead" title="Status">Status</th>
                  <th></th>
                  <th></th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
<?php 
$result = getAllComments();
foreach($result as $row) {
?>
               <tr>
                  <td class="cell" title="<?php echo $row['post_title']; ?>">
                     <a href="post.php?id=<?php echo $row['comment_post_id']; ?>"><?php echo $row['post_title']; ?></a>
                  </td>
                  <td class="cell" title="<?php echo $row['username']; ?>"><?php echo $row['username']; ?></td>
                  <td class="cell" title="<?php echo $row['comment_date']; ?>"><?php echo $row['comment_date']; ?></td>
                  <td class="cell" title="<?php echo $row['comment_content']; ?>"><?php echo $row['comment_content']; ?></td>
                  <td class="cell" title="<?php echo $row['status_name']; ?>"><?php echo $row['status_name']; ?></td>

                  <td>
                     <a href="admin.php?source=post_comments&comment_approve=<?php echo $row['comment_id']; ?>" class="btn btn-success" title="approve comment">approve</a>
                  </td>
                  <td>
                     <a href="admin.php?source=post_comments&comment_unapprove=<?php echo $row['comment_id']; ?>" class="btn btn-warning" title="unapprove comment">unapprove</a>
                  </td>
                  <td>
                     <a href="admin.php?source=post_comments&comment_delete=<?php echo $row['comment_id']; ?>" class="btn btn-danger" title="delete comment">delete</a>
                  </td>
               </tr>
<?php
}
?>
            </tbody>
         </table>
      </div>
   </div>