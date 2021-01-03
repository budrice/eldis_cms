<?php 
namespace Site;
class Landing {
   public $id;
	public $text_slideshow;
	public $header;
	public $row1_img;
	public $row1_header;
	public $row1_content;
	public $row1_button;
	public $row1_button_href;
	public $row2_img;
	public $row2_header;
	public $row2_content;
	public $row2_button;
	public $row2_button_href;
	public $row3_img;
	public $row3_header;
	public $row3_content;
	public $row3_button;
	public $row3_button_href;

   public function __construct(
      $id            	= null,
		$text_slideshow 	= null,
		$header         	= null,
		$row1_img			= null,
		$row1_header		= null,
		$row1_content		= null,
		$row1_button		= null,
		$row1_button_href = null,
		$row2_img			= null,
		$row2_header		= null,
		$row2_content		= null,
		$row2_button		= null,
		$row2_button_href = null,
		$row3_img			= null,
		$row3_header		= null,
		$row3_content		= null,
		$row3_button		= null,
		$row3_button_href = null
   ) {
		$this->id 					= $id;
		$this->text_slideshow 	= $text_slideshow;
		$this->header 				= $header;
		$this->row1_img 			= $row1_img;
		$this->row1_header 		= $row1_header;
		$this->row1_content 		= $row1_content;
		$this->row1_button  		= $row1_button;
		$this->row1_button_href = $row1_button_href;
		$this->row2_img 			= $row2_img;
		$this->row2_header 		= $row2_header;
		$this->row2_content 		= $row2_content;
		$this->row2_button  		= $row2_button;
		$this->row2_button_href = $row2_button_href;
		$this->row3_img 			= $row3_img;
		$this->row3_header 		= $row3_header;
		$this->row3_content 		= $row3_content;
		$this->row3_button  		= $row3_button;
		$this->row3_button_href = $row3_button_href;
      
   }
   
   public function escape() {
      global $conn;
		$this->header = mysqli_real_escape_string($conn, $this->header);
		$this->row1_img = mysqli_real_escape_string($conn, $this->row1_img);
		$this->row1_header = mysqli_real_escape_string($conn, $this->row1_header);
		$this->row1_content = mysqli_real_escape_string($conn, $this->row1_content);
		$this->row1_button = mysqli_real_escape_string($conn, $this->row1_button);
		$this->row1_button_href = mysqli_real_escape_string($conn, $this->row1_button_href);
		$this->row2_img = mysqli_real_escape_string($conn, $this->row2_img);
		$this->row2_header = mysqli_real_escape_string($conn, $this->row2_header);
		$this->row2_content = mysqli_real_escape_string($conn, $this->row2_content);
		$this->row2_button = mysqli_real_escape_string($conn, $this->row2_button);
		$this->row2_button_href = mysqli_real_escape_string($conn, $this->row2_button_href);
		$this->row3_img = mysqli_real_escape_string($conn, $this->row3_img);
		$this->row3_header = mysqli_real_escape_string($conn, $this->row3_header);
		$this->row3_content = mysqli_real_escape_string($conn, $this->row3_content);
		$this->row3_button = mysqli_real_escape_string($conn, $this->row3_button);
		$this->row3_button_href = mysqli_real_escape_string($conn, $this->row3_button_href);
   }
   
}
?>