<?php 
namespace Site;
class User {
   public $id;
   public $ip;
   public $username;
   public $password;
   public $title;
   public $firstname;
   public $lastname;
   public $email;
   public $role;
   public $image;

   private $hash_format;
   private $rand_salt;
   
   public function __construct(
      $id            = null,
      $ip            = null,
      $username      = null, 
      $password      = null,
      $title         = null,
      $firstname     = null,
      $lastname      = null,
      $email         = null,
      $role          = null,
      $image         = null
   ) {
      $this->id            = $id;
      $this->ip            = $ip;
      $this->username      = $username;
      $this->password      = $password;
      $this->title         = $title;
      $this->firstname     = $firstname;
      $this->lastname      = $lastname;
      $this->email         = $email;
      $this->role          = $role;
      $this->image         = $image;

      $this->hash_format   = "$2y$07$";
      $this->rand_salt     = "zhxd5jS6PfdsghrY1I5dhg";
   }
   
   public function password_encrypt() {
      $hashFormatSalt      = $this->hash_format . $this->rand_salt;
      $this->password      = crypt($this->password, $hashFormatSalt);
   }
   
   public function escape() {
      global $conn;
      $this->username      = mysqli_real_escape_string($conn, $this->username);
      $this->password      = mysqli_real_escape_string($conn, $this->password);
      $this->title         = mysqli_real_escape_string($conn, $this->title);
      $this->firstname     = mysqli_real_escape_string($conn, $this->firstname);
      $this->lastname      = mysqli_real_escape_string($conn, $this->lastname);
      $this->email         = mysqli_real_escape_string($conn, $this->email);
      $this->image         = mysqli_real_escape_string($conn, $this->image);
   }
   
}
?>