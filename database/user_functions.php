<?php
$logbtn = "Log In";

function getUsers() {
   global $conn;
   if($q = $conn->prepare("SELECT * FROM cms_users;")) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get users failed: " . htmlspecialchars($conn->error));
   }
}

function deleteUser($id) {
   global $conn; 
   if($q = $conn->prepare("DELETE FROM cms_users WHERE id = ?;")) {
      $q->bind_param('i', $id);
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("delete user failed: " . htmlspecialchars($conn->error));
   }
}

function updateUserRole($id, $role) {
   global $conn;
   $sql  = "UPDATE cms_users SET ";
   $sql .= "role = ? ";
   $sql .= "WHERE id = ?;";
   if($q = $conn->prepare($sql)) {
      $q->bind_param('ii', $role, $id);
      $q->execute();
      $q->close();
      return $q->info;
   } else {
      die("update user role failed." . htmlspecialchars($conn->error));
   }
}

function getAllUserCategoriesById($user_id) {
   global $conn;
   $sql  = "SELECT * FROM cms_users_categories AS a ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT * ";
   $sql .= "FROM cms_categories";
   $sql .= ") AS b ";
   $sql .= "ON a.cat_id = b.id ";
   $sql .= "WHERE a.user_id = {$user_id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get all user categories by id failed: " . htmlspecialchars($conn->error));
   }
}
function getAllUserGamesById($user_id) {
   global $conn;
   $sql  = "SELECT * FROM cms_users_games AS a ";
   $sql .= "LEFT JOIN (";
   $sql .= "SELECT id AS g_id, ";
   $sql .= "game_name, ";
   $sql .= "rating ";
   $sql .= "FROM cms_games_titles";
   $sql .= ") AS b ";
   $sql .= "ON a.game_id = b.g_id ";
   $sql .= "WHERE a.user_id = {$user_id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get all user games by id failed: " . htmlspecialchars($conn->error));
   }
}

function getUserById($id) {
   global $conn;
   $sql = "SELECT * FROM cms_users WHERE id = ?;";
   if($q = $conn->prepare($sql)) {
      $q->bind_param('i', $id);
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get user by id failed. " . htmlspecialchars($conn->error));
   }
}

function comparePassword($username, $pass_to_check) {
   global $conn;
   $sql  = "SELECT * FROM cms_users ";
   $sql .= "WHERE username = ?;";
   if($q = $conn->prepare($sql)) {
      $q->bind_param('s', $username);
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      $pass;
      foreach($data as $row) {
         $pass = $row['password'];
      }
      if (crypt($pass_to_check, $pass) == $pass) {
         return $data;
      } else {
         header("Location: login.php");
      }
   } else {
      die("compare password failed. " . htmlspecialchars($conn->error));
   }
}

function insertUserPassword($user) {
   global $conn;
   $user->role = empty($user->role) ? 1 : $user->role;
   $user->password_encrypt();
   $user->escape();
   $sql  = "INSERT INTO cms_users ";
   $sql .= "(";
   $sql .= "username, ";
   $sql .= "password, ";
   $sql .= "role";
   $sql .= ") ";
   $sql .= "VALUES ";
   $sql .= "(?, ?, ?);";
   if($q = $conn->prepare($sql)) {
      $q->bind_param('ssi', $user->username, $user->password, $user->role);
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("insert user password failed. " . htmlspecialchars($conn->error));
   }
}

function insertUser($user) {
   global $conn;
   $user->role = empty($user->role) ? 1 : $user->role; // defaults to one
   $user->password_encrypt();
   $user->escape();
   $sql  = "INSERT INTO cms_users ";
   $sql .= "(";
   $sql .= "username, ";
   $sql .= "email, ";
   $sql .= "password, ";
   $sql .= "role, ";
   if($user->image) {
      $sql .= "image, ";
   }
   $sql .= "title, ";
   $sql .= "firstname, ";
   $sql .= "lastname";
   $sql .= ") ";
   $sql .= "VALUES ";
   $sql .= "('{$user->username}', ";
   $sql .= "'{$user->email}', ";
   $sql .= "'{$user->password}', ";
   $sql .= "{$user->role}, ";
   if($user->image) {
      $sql .= "'{$user->image}', ";
   }
   $sql .= "'{$user->title}', ";
   $sql .= "'{$user->firstname}', ";
   $sql .= "'{$user->lastname}');";
   $q = $conn->prepare($sql) 
      or die("insert user failed. " . htmlspecialchars($conn->error));
   $q->execute();
   $q->close();
   return $conn->info;
}

function updateUserPassword($user) {
   global $conn;   
   $user->password_encrypt();
   $user->escape();
   $sql  = "UPDATE cms_users SET ";
   $sql .= "username = ?, ";
   $sql .= "password = ? ";
   $sql .= "WHERE id = ?;";
   $q = $conn->prepare($sql) 
      or die("update user password failed: " . htmlspecialchars($conn->error));
      $q->bind_param(
         'ssi',
         $user->username,
         $user->password,
         $user->id
      );
      $q->execute();
      $q->close();
      return $conn->info;
}

function updateUser($user) {
   global $conn;
   $user->escape();
   $sql  = "UPDATE cms_users SET ";
   $sql .= "username = '{$user->username}', ";
   if(!empty($user->image)) {
      $sql .= "image = '{$user->image}', ";
   }
   $sql .= "title = '{$user->title}', ";
   $sql .= "firstname = '{$user->firstname}', ";
   $sql .= "lastname = '{$user->lastname}', ";
   $sql .= "email = '{$user->email}', ";
   $sql .= "role = {$user->role} ";
   $sql .= "WHERE id = {$user->id};";
   if($q = $conn->prepare($sql)) {
      $q->execute();
      $q->close();
      return $conn->info;
   } else {
      die("update user failed: " . htmlspecialchars($conn->error));
   }
}

function getUserGames($id) {
   echo $id;
   global $conn;
   $sql = "SELECT * FROM ";
   $sql .= "cms_users_games AS a ";
   $sql .= "LEFT JOIN ";
   $sql .= "(";
   $sql .= "SELECT ";
   $sql .= "id AS gid, ";
   $sql .= "game_name, ";
   $sql .= "rating ";
   $sql .= "FROM cms_games_titles";
   $sql .= ") AS b ";
   $sql .= "ON a.game_id = b.gid ";
   $sql .= "WHERE user_id = ?;";
   if($q = $conn->prepare($sql)) {
      $q->bind_param('i', $id);
      $q->execute();
      $result = $q->get_result();
      $data = $result->fetch_all(MYSQLI_ASSOC);
      $q->close();
      return $data;
   } else {
      die("get user by id failed. " . htmlspecialchars($conn->error));
   }
}
?>