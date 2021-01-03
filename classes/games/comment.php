<?php
namespace Games;
class Comment {
   public $id;
   public $post_id;
   public $author_id;
   public $content;
   public $status_id;
   public $date_created;
   public $parent_id;
   public $count_number;
   
   public function __construct(
      $id            = null,
      $post_id       = null,
      $author_id     = null,
      $content       = null,
      $status_id     = null,
      $date_created  = null,
      $parent_id     = null,
      $count_number  = null
   ) {
      $this->id            = $id;
      $this->post_id       = $post_id;
      $this->author_id     = $author_id;
      $this->content       = $content;
      $this->status_id     = $status_id;
      $this->date_created  = $date_created;
      $this->parent_id     = $parent_id;
      $this->count_number  = $count_number;
   }
   
   public function escape() {
      global $conn;
      $this->content = mysqli_real_escape_string($conn, $this->content);
   }
}
?>