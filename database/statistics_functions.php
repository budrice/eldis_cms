<?php 

function logVisitor($ip, $page = 'index.php', $view = 0, $search = null) {
   global $conn;
   $ip = mysqli_real_escape_string($conn, $ip);
   $sql = "INSERT INTO ";
   $sql .= "cms_visitor ";
   $sql .= "(";
   $sql .= "ip, ";
   $sql .= "view_id, ";
   $sql .= "view_page";
   if ($search) {
      $sql .= ", search";
   }
   $sql .= ") ";
   $sql .= "VALUES ";
   $sql .= "(";
   $sql .= "'{$ip}', ";
   $sql .= "{$view}, ";
   $sql .= "'{$page}'";
   if ($search) {
      $sql .= ", '{$search}'";
   }
   $sql .= ");";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("log user failed: " . htmlspecialchars($conn->error));
   }
}

function uniqueVisitorCount($page = null) {
	global $conn;
   $sql  = "SELECT ";
   $sql .= "COUNT(DISTINCT ip) AS unique_visitor_count ";
   $sql .= "FROM cms_visitor";
   if ($page) {
      $sql .= " WHERE view_page = '{$page}';";
   } else {
      ";";
   }
	if($q = $conn->prepare($sql)) {
		$q->execute();
		$result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
	} else {
      die("unique visitor count failed: " . htmlspecialchars($conn->error));
   }
}

function visitsPast($duration) {
   global $conn;
   $sql  = "SELECT ";
   $sql .= "COUNT(DISTINCT ip) AS unique_visitor_duration_count ";
   $sql .= "FROM cms_visitor ";
   $sql .= "WHERE visited > DATE_SUB(now(), INTERVAL {$duration} DAY);";
   if($q = $conn->prepare($sql)) {
		$q->execute();
		$result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
	} else {
      die("visits past failed: " . htmlspecialchars($conn->error));
   }
}

function visitArray($duration) {
   global $conn;
   $sql  = "SELECT ";
   $sql .= "DATE_FORMAT(visited, '%Y-%m-%d') AS day_visited, ";
   $sql .= "COUNT(DISTINCT ip) AS 'unique_visitor_duration_count' ";
   $sql .= "FROM cms_visitor ";
   $sql .= "WHERE visited BETWEEN NOW() - INTERVAL {$duration} DAY AND NOW() ";
   $sql .= "Group by day_visited ";
   $sql .= "ORDER BY day_visited ASC;";
   if($q = $conn->prepare($sql)) {
		$q->execute();
		$result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
	} else {
      die("visit array failed: " . htmlspecialchars($conn->error));
   }
}

function distinctIpList($duration) {
   global $conn;
   $sql  = "SELECT ";
   $sql .= "DISTINCT ip AS unique_visitor ";
   $sql .= "FROM cms_visitor ";
   $sql .= "WHERE visited BETWEEN NOW() - INTERVAL {$duration} DAY AND NOW() ";
   $sql .= "ORDER BY unique_visitor  ASC;";
   if($q = $conn->prepare($sql)) {
		$q->execute();
		$result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
	} else {
      die("visit array failed: " . htmlspecialchars($conn->error));
   }
}

function distinctPageList() {
   global $conn;
   $sql  = "SELECT ";
   $sql .= "DISTINCT view_page AS page_viewed ";
   $sql .= "FROM cms_visitor;";
   if($q = $conn->prepare($sql)) {
		$q->execute();
		$result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
	} else {
      die("distinct page list failed: " . htmlspecialchars($conn->error));
   }
}

function distinctPostViewedList() {
   global $conn;
   $sql  = "SELECT DISTINCT a.view_id , COUNT(DISTINCT a.ip) AS visitor_vcnt, b.`id` AS pid, b.post_title FROM cms_visitor a, cms_posts b WHERE a.view_id = b.`id` GROUP BY pid;";
   if($q = $conn->prepare($sql)) {
		$q->execute();
		$result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
	} else {
      die("distinct post viewed list failed: " . htmlspecialchars($conn->error));
   }
}

function getContactMessages() {
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