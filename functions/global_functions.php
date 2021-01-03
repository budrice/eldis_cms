<?php 
function validatePostForm($post) {
   $mess = "";
   if(empty($post->title)) {
      $mess = "title";
   }
   if(empty($post->author)) {
      $mess = $mess ? $mess . ", author" : "author";
   }
   if(empty($post->author_image)) {
      $mess = $mess ? $mess . ", author image" : "author image";
   }
   if(empty($post->author_image_alt)) {
      $mess = $mess ? $mess . ", author image alt" : "author image alt";
   }
   if(empty($post->image)) {
      $mess = $mess ? $mess . ", image" : "image";
   }
   if(empty($post->image_alt)) {
      $mess = $mess ? $mess . ", image alt" : "image alt";
   }
   if(empty($post->content)) {
      $mess = $mess ? $mess . ", content" : "content";
   }
   if(empty($post->category)) {
      $mess = $mess ? $mess . ", category" : "category";
   }
   if(empty($post->tags)) {
      $mess = $mess ? $mess . ", tags" : "tags";
   }
   if($post->status === 0) {
      $mess = $mess ? $mess . ", status" : "status";
   }
   return $mess;
}
function validateUserForm($user) {
   $mess = "";
   if(empty($user->username)) {
      $mess = "username";
   }
   if(empty($user->title)) {
      $mess = $mess ? $mess . ", password" : "password";
   }
   if(empty($user->firstname)) {
      $mess = $mess ? $mess . ", firstname" : "firstname";
   }
   if(empty($user->lastname)) {
      $mess = $mess ? $mess . ", lastname" : "lastname";
   }
   if(empty($user->title)) {
      $mess = $mess ? $mess . ", title" : "title";
   }
   if(empty($user->email)) {
      $mess = $mess ? $mess . ", email" : "email";
   }
   if(empty($user->role)) {
      $mess = $mess ? $mess . ", role" : "role";
   }
   return $mess;
}
?>