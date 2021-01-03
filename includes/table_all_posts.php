<?php

if(isset($_GET['post_delete'])) {
   $id = $_GET['post_delete'];
   deletePost($id);
   header("Refresh:0; url=admin.php?source=post_all");
}
if(isset($_GET['post_publish'])) {
   $id = $_GET['post_publish'];
   updatePostStatus($id, 2);
   header("Refresh:0; url=admin.php?source=post_all");
}
if(isset($_GET['post_remove'])) {
   $id = $_GET['post_remove'];
   updatePostStatus($id, 3);
   header("Refresh:0; url=admin.php?source=post_all");
}
?>
   <div class="container-fluid admin-wrapper">
      <div class="well black-well">
         <div class="row">
            <div class="col-xs-12">
               <h4 class="left-title"><i class="fas fa-comment-dots fa-3x"></i>&nbsp;&nbsp;<small>ALL POSTS</small>&nbsp;eldisrice.com</h4>
            </div>
         </div>
         <hr>
         <table class="panel table table-hover table-condensed table-bordered">
            <thead>
               <tr>
                  <th class="cell thead" title="Author">Author</th>
                  <th class="cell thead" title="Title">Title</th>
                  <th class="cell thead" title="Date">Date</th>
                  <th class="cell thead" title="Status">Status</th>
                  <th class="cell thead" title="Image">Image</th>
                  <th class="cell thead" title="Comment Count">Comment Count</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
               </tr>
            </thead>
            <tbody>
<?php 
$result = getAllPosts();
foreach($result as $row) {
?>
               <tr>
               <td class="cell" title="<?php echo $row['post_author']; ?>"><?php echo $row['post_author']; ?></td>
               <td class="cell" title="<?php echo $row['post_title']; ?>">
                  <a href="post.php?id=<?php echo $row['id']; ?>"><?php echo $row['post_title']; ?></a>
               </td>
               <td class="cell" title="<?php echo $row['post_date']; ?>"><?php echo $row['post_date']; ?></td>
               <td class="cell" title="<?php echo $row['status_name']; ?>"><?php echo $row['status_name']; ?></td>
               <td class="cell" title="<?php echo $row['post_image']; ?>">
                  <img src="images/<?php echo $row['post_image']; ?>" alt="<?php echo $row['post_image_alt']; ?>" width="100">
               </td>
               <td class="cell" title="<?php echo $row['post_comment_count']; ?>"><?php echo $row['post_comment_count']; ?></td>


               <td>
                  <a href="admin.php?source=post_all&post_publish=<?php echo $row['id']; ?>" 
                     class="btn btn-success" 
                     title="publish post">publish</a>
               </td>
               <td>
                  <a href="admin.php?source=post_update&post_id=<?php echo $row['id']; ?>" 
                     class="btn btn-primary" 
                     title="edit post">edit</a>
               </td>
               <td>
                  <a href="admin.php?source=post_all&post_remove=<?php echo $row['id']; ?>" 
                     class="btn btn-warning" 
                     title="remove post">remove</a>
               </td>
               <td>
                  <a href="admin.php?source=post_all&post_delete=<?php echo $row['id']; ?>" 
                     class="btn btn-danger" 
                     title="delete post">delete</a>
               </td>

               </tr>
<?php
}
?>
            </tbody>
         </table>
      </div>
   </div>