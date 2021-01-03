<?php 
function getLanding($id = 1) {
   global $conn;
   $sql = "SELECT * FROM cms_landing WHERE id = {$id}";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get landing failed: " . htmlspecialchars($conn->error));
   }
}

function updateLanding($landing) {
   global $conn;
   $landing->escape();
   $sql  = "UPDATE cms_landing ";
   $sql .= "SET ";
   $sql .= "text_slideshow = {$landing->text_slideshow}, ";
   $sql .= "header = '{$landing->header}', ";
   $sql .= "row1_img = '{$landing->row1_img}', ";
   $sql .= "row1_header = '{$landing->row1_header}', ";
   $sql .= "row1_content = '{$landing->row1_content}', ";
   $sql .= "row1_button = '{$landing->row1_button}', ";
   $sql .= "row1_button_href = '{$landing->row1_button_href}', ";
   $sql .= "row2_img = '{$landing->row2_img}', ";
   $sql .= "row2_header = '{$landing->row2_header}', ";
   $sql .= "row2_content = '{$landing->row2_content}', ";
   $sql .= "row2_button = '{$landing->row2_button}', ";
   $sql .= "row2_button_href = '{$landing->row2_button_href}', ";
   $sql .= "row3_img = '{$landing->row3_img}', ";
   $sql .= "row3_header = '{$landing->row3_header}', ";
   $sql .= "row3_content = '{$landing->row3_content}', ";
   $sql .= "row3_button = '{$landing->row3_button}', ";
   $sql .= "row3_button_href = '{$landing->row3_button_href}' ";
   $sql .= "WHERE id = 1;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update landing failed: " . htmlspecialchars($conn->error));
   }
}

function getTextSlideshow($slideshow = 1) {
   global $conn;
   $sql = "SELECT * FROM cms_text_slides WHERE slideshow = {$slideshow}";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get landing failed: " . htmlspecialchars($conn->error));
   }
}

function getTextSlideshowTitles() {
   global $conn;
   $sql = "SELECT * FROM cms_text_slideshows;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get text slideshow titles failed: " . htmlspecialchars($conn->error));
   }
}

function getTextSlide($id) {
   global $conn;
   $sql = "SELECT * FROM cms_text_slides WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get text slide failed: " . htmlspecialchars($conn->error));
   }
}

function updateTextSlide($slide) {
   global $conn;
   $sql  = "UPDATE cms_text_slides ";
   $sql .= "SET ";
   $sql .= "header = '{$slide->header}', ";
   $sql .= "subheader = '{$slide->subheader}' ";
   $sql .= "WHERE id = {$slide->id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update text slide failed: " . htmlspecialchars($conn->error));
   }
}
function deleteTextSlide($id) {
   global $conn;
   $sql = "DELETE FROM cms_text_slides WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("delete text slide failed: " . htmlspecialchars($conn->error));
   }
}
function insertTextSlide($slide) {
   global $conn;
   $sql  = "INSERT INTO cms_text_slides ";
   $sql .= "(";
   $sql .= "subheader, ";
   $sql .= "header, ";
   $sql .= "slideshow ";
   $sql .= ")";
   $sql .= "VALUES ";
   $sql .= "(";
   $sql .= "'{$slide->subheader}', ";
   $sql .= "'{$slide->header}', ";
   $sql .= "{$slide->slideshow} ";
   $sql .= ");";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("insert text slide failed: " . htmlspecialchars($conn->error));
   }
}

function getSearch($search) {
   global $conn;
   $sql  = "SELECT * FROM cms_posts ";
   $sql .= "WHERE ";
   $sql .= "post_tags LIKE '%{$search}%' OR ";
   $sql .= "post_title LIKE '%{$search}%' OR ";
   $sql .= "post_content LIKE '%{$search}%' OR ";
   $sql .= "post_author LIKE '%{$search}%' ";
   $sql .= "AND post_status = 2 ";
   $sql .= "ORDER BY post_date DESC;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get search failed: " . htmlspecialchars($conn->error));
   }
}

function getAllPosts($status = null) {
   global $conn;
   $sql  = "SELECT * FROM ";
   $sql .= "cms_posts AS a ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT ";
   $sql .= "id AS cat_id, ";
   $sql .= "cat_title AS category ";
   $sql .= "FROM cms_categories";
   $sql .= ") AS b ";
   $sql .= "ON a.category_id = b.cat_id ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT id AS status_id, status_name FROM ";
   $sql .= "cms_status_types) AS c ";
   $sql .= "ON a.post_status = c.status_id ";
   if($status) {
      $sql .= "WHERE post_status = {$status} ";
   }
   $sql .= "ORDER BY id DESC;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get all posts failed: " . htmlspecialchars($conn->error));
   }
}

function getPostById($id) {
   global $conn;
   $sql = "SELECT * FROM cms_posts WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get post by id failed: " . htmlspecialchars($conn->error));
   }
}

function getPostsByCategory($id) {
   global $conn;
   $sql = "SELECT * FROM cms_posts WHERE category_id = {$id} AND post_status = 2 ORDER BY post_date DESC;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get posts by category failed: " . htmlspecialchars($conn->error));
   }
}

function getCount($table, $countby = 'id', $col = 'user_id', $val = null) {
   global $conn;
   
   $sql = "SELECT COUNT({$countby}) AS `count` FROM {$table}";
   if ($val || $val === 0) {
      $val = gettype($val) == 'string' ? "'" . $val . "'" : $val;
      $sql .= " WHERE {$col} = {$val}";
   }
   $sql .= ";";
   // echo $sql;
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get posts count failed: " . htmlspecialchars($conn->error));
   }
}

function insertPost($post) {
   global $conn;
   $post->escape();
   $sql  = "INSERT INTO ";
   $sql .= "cms_posts ";
   $sql .= "(";
   $sql .= "post_title, ";
   $sql .= "post_author, ";
   $sql .= "post_author_image, ";
   $sql .= "post_author_image_alt, ";
   $sql .= "post_image, ";
   $sql .= "post_image_alt, ";
   $sql .= "post_content, ";
   $sql .= "post_tags, ";
   $sql .= "post_status,";
   $sql .= "category_id";
   $sql .= ") ";
   $sql .= "VALUES ";
   $sql .= "(";
   $sql .= "'{$post->title}', ";
   $sql .= "'{$post->author}', ";
   $sql .= "'{$post->author_image}', ";
   $sql .= "'{$post->author_image_alt}', ";
   $sql .= "'{$post->image}', ";
   $sql .= "'{$post->image_alt}', ";
   $sql .= "'{$post->content}', ";
   $sql .= "'{$post->tags}', ";
   $sql .= "{$post->status}, ";
   $sql .= "{$post->category}";
   $sql .= ");";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("insert post failed: " . htmlspecialchars($conn->error));
   }
}

function updatePost($post) {
   global $conn;
   $post->escape();
   $id = $post->id;
   $sql =  "UPDATE cms_posts SET ";
   $sql .= "post_title = '{$post->title}', ";
   $sql .= "post_author = '{$post->author}', ";
   $sql .= "post_author_image = '{$post->author_image}', ";
   $sql .= "post_author_image_alt = '{$post->author_image_alt}', ";
   $sql .= "post_image = '{$post->image}', ";
   $sql .= "post_image_alt = '{$post->image_alt}', ";
   $sql .= "post_content = '{$post->content}', ";
   $sql .= "post_tags = '{$post->tags}', ";
   $sql .= "post_status = {$post->status}, ";
   $sql .= "category_id = {$post->category} ";
   $sql .= "WHERE id = {$post->id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update post failed: " . htmlspecialchars($conn->error));
   }
}

function updatePostStatus($id, $status) {
   global $conn;
   $sql = "UPDATE cms_posts SET post_status = {$status} WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update post status failed: " . htmlspecialchars($conn->error));
   }
}

function deletePost($id) {
   global $conn;
   $sql = "DELETE FROM cms_posts WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("delete post failed: " . htmlspecialchars($conn->error));
   }
}

function getStatusTypes($type = "post") {
   global $conn;
   $sql = "SELECT * FROM cms_status_types WHERE status_type = '{$type}' ORDER BY status_name;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get status types failed: " . htmlspecialchars($conn->error));
   }
}

function getCategories() {
   global $conn;
   $sql = "SELECT * FROM cms_categories ORDER BY cat_title;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get categories failed: " . htmlspecialchars($conn->error));
   }
}

function insertCategory($var) {
   global $conn;
   $title = mysqli_real_escape_string($conn, $var);
   $sql = "INSERT INTO cms_categories SET cat_title = '{$title}';";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("insert category failed: " . htmlspecialchars($conn->error));
   }
}

function updateCategory($id, $var) {
   global $conn;
   $title = mysqli_real_escape_string($conn, $var);
   $sql = "UPDATE cms_categories SET cat_title = '{$title}' WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update category failed: " . htmlspecialchars($conn->error));
   }
}

function deleteCategory($id) {
   global $conn;
   $sql = "DELETE FROM cms_categories WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("delete category failed: " . htmlspecialchars($conn->error));
   }
}

function getAllComments($post_id = null, $status = null, $user_id = null) {
   global $conn;
   $sql  = "SELECT * FROM cms_comments AS a ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT id AS post_id, ";
   $sql .= "post_title ";
   $sql .= "FROM cms_posts";
   $sql .= ") AS b ";
   $sql .= "ON a.comment_post_id = b.post_id ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT id AS user_id, ";
   $sql .= "username, image, title ";
   $sql .= "FROM cms_users";
   $sql .= ") AS c ";
   $sql .= "ON a.comment_author = c.user_id ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT id AS status_id, ";
   $sql .= "status_name ";
   $sql .= "FROM cms_status_types";
   $sql .= ") AS d ";
   $sql .= "ON a.comment_status = d.status_id ";
   if (!empty($post_id)) {
      $sql .= "WHERE comment_post_id = {$post_id} ";
   }
   if (!empty($post_id) && !empty($status)) {
      $sql .= "AND comment_status = {$status} ";
   }
   if (empty($post_id) && !empty($status)) {
      $sql .= "WHERE comment_status = {$status} ";
   }
   $sql .= "ORDER BY a.comment_id DESC;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get all comments failed: " . htmlspecialchars($conn->error));
   }
}

function insertComment($comment) {
   global $conn;
   $comment->escape();
   $sql = "INSERT INTO cms_comments ";
   $sql .= "SET ";
   $sql .= "comment_post_id = {$comment->post_id}, ";
   $sql .= "comment_author = {$comment->author_id}, ";
   $sql .= "comment_content = '{$comment->content}', ";
   $sql .= "comment_status = {$comment->status_id}, ";
   $sql .= "comment_parent_id = {$comment->parent_id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("insert comment failed: " . htmlspecialchars($conn->error));
   }
}

function deleteComment($id) {
   global $conn;
   $sql = "DELETE FROM cms_comments WHERE comment_id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("delete comment failed: " . htmlspecialchars($conn->error));
   }
}

function updateCommentStatus($id, $var) {
   global $conn;
   $sql = "UPDATE cms_comments SET comment_status = $var WHERE comment_id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update comment status failed: " . htmlspecialchars($conn->error));
   }
}

function updatePostCommentCount($id) {
   global $conn;
   $sql = "UPDATE cms_posts SET post_comment_count = post_comment_count + 1 WHERE id = {$id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update post comment count failed: " . htmlspecialchars($conn->error));
   }
}

function getIcons() {
   global $conn;
   $sql = "SELECT * FROM eldis_icons;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get all comments failed: " . htmlspecialchars($conn->error));
   }
}

?>