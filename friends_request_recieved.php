<!DOCTYPE html>
<html>
<head>
    <meta charset-"utf-8" />
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<title>Vos demandes reçues</title>
</head>
<body>
    <?php
    $conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', '');
    $user_id = $_POST['user_id'];
    include('top_button.php');
    ?>
    Vos demandes reçues :<br/><br/>
<?php
$decision = $_POST['decision'];
$friend_id = $_POST['friend_id'];
if ($decision == "accepted") {
    $sql_accepted = "UPDATE friends
        SET user1_id = $user_id, user2_id = $friend_id,
        user_didnt_accepted_id = 0
        WHERE (user1_id = $user_id AND user2_id = $friend_id) OR 
        (user1_id = $friend_id AND user2_id = $user_id)";
    $conn->query($sql_accepted);
} elseif ($decision == "refused") {
    $sql_refused = "DELETE FROM friends
        WHERE (user1_id = $user_id AND user2_id = $friend_id) OR 
        (user1_id = $friend_id AND user2_id = $user_id)";
    $conn->query($sql_refused);
}
$sql_friends = "SELECT U.* FROM users U WHERE U.user_id IN 
    (SELECT user1_id from friends where user2_id = $user_id AND user_didnt_accepted_id = $user_id UNION
     SELECT user2_id from friends where user1_id = $user_id AND user_didnt_accepted_id = $user_id)";
$friends = $conn->query($sql_friends);
$request_found = FALSE;
while ($friend_array = $friends->fetch()) {
    $request_found = TRUE;
    echo $friend_array['name'];
    $friend_id = $friend_array['user_id'];
    include('request_recieved_buttons.php');
    echo nl2br ("\n");
}

if ($request_found == FALSE) {
    echo "Vous n'avez pas de demandes reçues";
}
?>
</body>
</html>