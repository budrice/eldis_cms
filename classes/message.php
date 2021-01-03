<?php
namespace Site;
class Message {
	public $id;
	public $contact;
   public $subject;
	public $content;
	public $content_placeholder;
	public $ip;
	public $message_datetime;
   
   public function __construct(
      $id 						= null,
		$contact 				= null,
		$subject 				= null,
		$content 				= null,
		$content_placeholder = null,
		$ip 						= null,
		$message_datetime 	= null
   ) {
      $this->id 						= $id;
		$this->contact 				= $contact;
		$this->subject 				= $subject;
		$this->content 				= $content;
		$this->content_placeholder = $content_placeholder;
		$this->ip 						= $ip;
		$this->message_datetime 	= $message_datetime;
   }
   
   public function escape() {
      global $conn;
		$this->contact 			= mysqli_real_escape_string($conn, $this->contact);
		$this->subject 			= mysqli_real_escape_string($conn, $this->subject);
		$this->content 			= mysqli_real_escape_string($conn, $this->content);
		$this->message_datetime = mysqli_real_escape_string($conn, $this->message_datetime);
   }
}
?>