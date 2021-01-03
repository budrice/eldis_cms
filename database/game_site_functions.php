<?php 
function getAllGames() {
   global $conn;
   $sql = "SELECT * FROM cms_games_titles;";
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