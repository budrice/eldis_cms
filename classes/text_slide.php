<?php
namespace Site;
class TextSlide {
   public $id;
   public $header;
   public $subheader;
   public $slideshow;
   
   public function __construct(
      $id			= null,
      $header		= null,
      $subheader	= null,
      $slideshow	= null
   ) {
      $this->id			= $id;
      $this->header		= $header;
      $this->subheader	= $subheader;
      $this->slideshow	= $slideshow;
   }
   
   public function escape() {
      global $conn;
		$this->header		= mysqli_real_escape_string($conn, $this->header);
      $this->subheader	= mysqli_real_escape_string($conn, $this->subheader);
   }
}
?>