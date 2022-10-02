<!DOCTYPE html>
<html>
  <head>
	<meta charset-"utf-8" />
  <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	  <title>Connexion</title>
  </head>
<body>

<?php
$conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', '');
if (isset($_POST['user_id'])) {
  $user_id = $_POST['user_id'];

  include('top_button.php');

  $sql = "SELECT name FROM users where user_id = $user_id";
  $entry_username = $conn -> query($sql)->fetch()['name'];

  $sql_friends = "SELECT U.* FROM users U WHERE U.user_id IN 
    (SELECT user1_id from friends where user2_id = $user_id UNION
    SELECT user2_id from friends where user1_id = $user_id)";
  $friends_array = $conn->query($sql_friends);
  while ($fetched_friend = $friends_array->fetch()) 
  {
    include('chat_button.php');
  }
} else {
  $entry_username = $_POST['entry_username'];
  $entry_password = $_POST['entry_password'];
  $sql_user = "SELECT user_id FROM users WHERE name = '$entry_username' and password = '$entry_password' ";
  $user_array = $conn->query($sql_user);

  if ($user_array->rowCount() == 1) {
    $fetched_user = $user_array->fetch();
    $user_id=$fetched_user['user_id'];

    include('top_button.php');

    $sql_friends = "SELECT U.* FROM users U WHERE U.user_id IN 
      (SELECT user1_id from friends where user2_id = $user_id UNION
      SELECT user2_id from friends where user1_id = $user_id)";
    $friends_array = $conn->query($sql_friends);
    while ($fetched_friend = $friends_array->fetch()) 
    {
      include('chat_button.php');
    }
  } else {
    header('Location: login.php?err=error');
  }
}
?>
</body>
</html>