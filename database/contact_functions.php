<?php
function insertMessage($message) {
	global $conn;
	$sql = "INSERT INTO cms_messages (subject, content, contact, ip) VALUES ('{$message->subject}', '{$message->content}', '{$message->contact}', '{$message->ip}');";
	if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("insert message failed: " . htmlspecialchars($conn->error));
   }
}
function getMessages() {
   global $conn;
   $sql = "SELECT * FROM cms_messages;";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get messages failed: " . htmlspecialchars($conn->error));
   }
}
?>