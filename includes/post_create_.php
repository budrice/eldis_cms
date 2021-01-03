<?php 
$message = '';
$post = new Games\Post();
if(isset($_POST['post_create'])) {
   $post->title             = $_POST['post_title'];
   $post->author            = $_POST['post_author'];
   $post->author_image_alt  = $_POST['post_author_image_alt'];
   $post->image_alt         = $_POST['post_image_alt'];
   $post->content           = $_POST['post_content'];
   $post->category          = $_POST['post_category'];
   $post->tags              = $_POST['post_tags'];
   $post->status            = (int)$_POST['post_status'];
   $post->author_image      = $_FILES['post_author_image']['name'];
   $post_author_image_temp  = $_FILES['post_author_image']['tmp_name'];
   $post->image             = $_FILES['post_image']['name'];
   $post_image_temp         = $_FILES['post_image']['tmp_name'];

   $message = validatePostForm($post);
	
   if(strlen($message) === 0) {
      move_uploaded_file($post_author_image_temp, "images/{$post->author_image}");
      move_uploaded_file($post_image_temp, "images/{$post->image}");
      insertPost($post);
      header("Refresh:0; url=admin.php?source=post_all");
   } else {
      $message = "The " . $message . " are required.";
   }
}
?>

   <div class="container-fluid admin-wrapper">
   <div class="well black-well">
      <div class="row">
         <div class="col-xs-12">
            <h4 class="left-title"><i class="fas fa-comment-dots fa-3x"></i>&nbsp;&nbsp;<small>CREATE POST</small>&nbsp;eldisrice.com</h4>
         </div>
      </div>
      <hr>
      <div class="col-xs-12 col-lg-6 col-lg-offset-3">
         <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
            <div class="form-group">
               <label for="post_title">Title</label>
               <input type="text" class="form-control" id="post_title" name="post_title" value="<?php echo $post->title; ?>" placeholder="enter title">
            </div>
            <div class="form-group">
               <label for="post_author">Author</label>
               <input type="text" class="form-control" id="post_author" name="post_author" value="<?php echo $post->author; ?>" placeholder="enter author">
            </div>
            <div class="col-xs-6">
               <div class="form-group">
                  <label for="post_author_image">Author Image</label>
                  <input type="file" class="form-control" id="post_author_image" name="post_author_image" value="<?php echo $post->author_image; ?>">
                  <label for="post_author_image_alt">Author Image Alt</label>
                  <input type="text" class="form-control" id="post_author_image_alt" name="post_author_image_alt" value="<?php echo $post->author_image_alt; ?>" placeholder="enter image alt">
               </div>
               <div class="form-group">
                     <img src="<?php echo "images/" . $post->author_image ?>" alt="<?php echo $post->author_image_alt ?>" class="img-responsive" id="post_update_author_image">
               </div>
            </div>
            <div class="form-group">
               <div class="col-xs-6">
                     <label for="post_image">Post Image (size: 900x300)</label>
                     <input type="file" class="form-control" id="post_image" name="post_image" value="<?php echo $post->image; ?>">
                     <label for="post_image_alt">Post Image Alt</label>
                     <input type="text" class="form-control" id="post_image_alt" name="post_image_alt" value="<?php echo $post->image_alt; ?>" placeholder="enter image alt">
               </div>
               <div class="col-xs-6">
                     <img src="<?php echo "images/" . $post->image ?>" alt="<?php echo $post->image_alt ?>" class="img-responsive" id="post_update_image">
               </div>
            </div>
            <div class="form-group">
               <label for="post_content">Content</label>
               <textarea class="form-control" id="post_content" name="post_content" cols="30" rows="10"><?php echo $post->content; ?></textarea>
               <!-- <script src="node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> -->
               <script src="ckeditor5/ckeditor.js"></script>
               <script>
                  ClassicEditor
                     .create( document.querySelector( '#post_content' ) )
                     .then( editor => {
                        window.editor = editor;
                     } )
                     .catch( error => {
                        console.error( 'There was a problem initializing the editor.', error );
                     } );
               </script>
            </div>
            <div class="form-group">
               <label for="post_status">Category</label>
               <select class="form-control" id="post_category" name="post_category">
                  <option value="0">choose one</option>
<?php
$categories = getCategories();
foreach($categories as $row) {
   if($post->category == $row['id']) {
?>
                  <option value="<?php echo $row['id']; ?>" selected><?php echo $row['cat_title']; ?></option>
<?php
   } else {
?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['cat_title']; ?></option>
<?php
   }
}
?>
               </select>
            </div>
            <div class="form-group">
               <label for="post_tags">Tags</label>
               <input type="text" class="form-control" id="post_tags" name="post_tags" value="<?php echo $post->tags; ?>" placeholder="enter tags">
            </div>
            <div class="form-group">
               <label for="post_status">Status</label>
               <select class="form-control" id="post_status" name="post_status">
                  <option value="0">choose one</option>
<?php
$status_types = getStatusTypes();
foreach($status_types as $row) {
   if($post->status == $row['id']) {
?>
                  <option value="<?php echo $row['id']; ?>" selected><?php echo $row['status_name']; ?></option>
<?php
   } else {
?>
                  <option value="<?php echo $row['id']; ?>"><?php echo $row['status_name']; ?></option>
<?php
   }
}
?>
               </select>
            </div>
            <div class="form-group">
               <div class="col-xs-2">
                  <input type="submit" class="btn btn-primary" id="post_create" name="post_create" value="create">
               </div>
               <div class="col-xs-10">
                  <?php echo $message; ?>
               </div>
            </div>
         </form>
      </div>
   </div>

