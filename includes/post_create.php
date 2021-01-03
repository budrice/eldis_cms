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

   <div class="container admin-wrapper">

      <div class="well black-well">
         <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
               <div class="col-xs-12">
                  <h4 class="left-title"><i class="fas fa-comment-dots fa-3x"></i>&nbsp;&nbsp;<small>CREATE POST</small>&nbsp;eldisrice.com</h4>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="col-xs-12 col-md-3">
                  <div class="form-group">
                     <label for="post_author_image">Author Image (200 x 200)</label>
                     <input type="file" class="form-control" id="post_author_image" name="post_author_image" value="<?php echo $post->author_image; ?>" onchange="readImgSrc(this, 'post_update_author_image');">
                  </div>
                  <div class="form-group">
                     <img src="<?php echo "images/" . $post->author_image; ?>" alt="<?php echo $post->author_image_alt; ?>" class="img-responsive" id="post_update_author_image">
                  </div>
                  <div class="form-group">
                     <label for="post_author_image_alt">Author Image Alt</label>
                     <input type="text" class="form-control" id="post_author_image_alt" name="post_author_image_alt" value="<?php echo $post->author_image_alt; ?>" placeholder="enter image alt">
                  </div>
                  <div class="form-group">
                     <label for="post_author">Author</label>
                     <input type="text" class="form-control" id="post_author" name="post_author" value="<?php echo $post->author; ?>" placeholder="enter author">
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
               </div>
               <div class="col-xs-12 col-md-9">
                  <div class="row">
                     <div class="no-pad col-xs-12 col-md-6">
                        <div class="form-group">
                           <input type="hidden" name="post_id" value="<?php echo $post->id; ?>">
                           <label for="post_image">Post Image (900 x 300)</label>
                           <input type="file" class="form-control" id="post_image" name="post_image" value="<?php echo $post->image; ?>" onchange="readImgSrc(this, 'post_update_image');">
                        </div>
                     </div>
                     <div class="no-pad col-xs-12 col-md-6">
                        <div class="form-group">
                           <label for="post_image_alt">Post Image Alt</label>
                           <input type="text" class="form-control" id="post_image_alt" name="post_image_alt" value="<?php echo $post->image_alt; ?>" placeholder="enter image alt">
                        </div>
                     </div>

                  </div>
                  <div class="row">
                     <div class="form-group">
                        <img src="<?php echo "images/" . $post->image; ?>" alt="<?php echo $post->image_alt; ?>" height="200" class="img-responsive" id="post_update_image">
                     </div>
                     <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" class="form-control" id="post_title" name="post_title" value="<?php echo $post->title; ?>" placeholder="enter title">
                     </div>
                     <div class="form-group">
                        <label for="post_tags">Tags</label>
                        <textarea class="form-control" id="post_tags" name="post_tags" rows="4" placeholder="enter tags"><?php echo $post->tags; ?></textarea>
                     </div>
                  </div>

               </div>
            </div>
            <div class="row">
               <div class="col-xs-12">
<style>
.ck-editor__editable {
   min-height: 300px;
}
</style>
                  <label for="post_title">Content</label>
                  <div name="post_content" id="post_content"><p><?php echo $post->content; ?></p></div>
<script src="ckeditor5/ckeditor.js"></script>
<script src="classes/upload-adapter.js"></script><script>
   ClassicEditor
      .create( document.querySelector( '#post_content' ), { extraPlugins: [ CustomUploadAdapterPlugin ]} )
      .then( editor => {
         window.editor = editor;
      } )
      .catch( error => {
         console.error( 'There was a problem initializing the editor.', error );
      } );
</script>
               </div>
            </div>
            <div class="row form-group" style="padding: 1em 0;">
                  <div class="col-xs-12 col-md-2">
                     <input type="submit" class="btn btn-primary form-control" id="post_create" name="post_create" value="create">
                  </div>
                  <div class="col-xs-12 col-md-10">
                     <?php echo $message; ?>
                  </div>
            </div>
         </form>
      </div>
   </div>
<script>
   function readImgSrc(input, id) {
      id = '#' + id
      if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (ele) {
            alert(id);
            $(id).attr('src', ele.target.result);
         };
         reader.readAsDataURL(input.files[0]);
      }
   }
</script>
