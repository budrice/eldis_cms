<?php
namespace Games;
class Post {
   public $id;
   public $category;
   public $title;
   public $author;
   public $author_image;
   public $author_image_alt;
   public $post_date;
   public $image;
   public $image_alt;
   public $content;
   public $tags;
   public $comment_count;
   public $status;
   public $posted_by;

   public function __construct(
            $id               = null,
            $category         = null,
            $title            = null,
            $author           = null,
            $author_image     = 'default_user.jpg',
            $author_image_alt = 'default user image',
            $post_date        = null,
            $image            = 'default_blog.jpg',
            $image_alt        = 'default blog image',
            $content          = null,
            $tags             = null,
            $comment_count    = null,
            $status           = null,
            $posted_by        = null
   ) {
      $this->id               = $id;
      $this->category         = $category;
      $this->title            = $title;
      $this->author           = $author;
      $this->author_image     = $author_image;
      $this->author_image_alt = $author_image_alt;
      $this->post_date        = $post_date;
      $this->image            = $image;
      $this->image_alt        = $image_alt;
      $this->content          = $content;
      $this->tags             = $tags;
      $this->comment_count    = $comment_count;
      $this->status           = $status;
      $this->posted_by        = $posted_by;
   }
   
   public function escape() {
      global $conn;
      $this->title            = mysqli_real_escape_string($conn, $this->title);
      $this->author           = mysqli_real_escape_string($conn, $this->author);
      $this->author_image     = mysqli_real_escape_string($conn, $this->author_image);
      $this->author_image_alt = mysqli_real_escape_string($conn, $this->author_image_alt);
      $this->image            = mysqli_real_escape_string($conn, $this->image);
      $this->image_alt        = mysqli_real_escape_string($conn, $this->image_alt);
      $this->content          = mysqli_real_escape_string($conn, $this->content);
      $this->tags             = mysqli_real_escape_string($conn, $this->tags);
      $this->status           = mysqli_real_escape_string($conn, $this->status);
      $this->posted_by        = mysqli_real_escape_string($conn, $this->posted_by);
      $this->category         = mysqli_real_escape_string($conn, $this->category);
   }
}
?>