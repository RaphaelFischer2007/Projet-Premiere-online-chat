<!DOCTYPE html>
<html>
<head>
    <meta charset-"utf-8" />
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<title>Demander en ami</title>
</head>
<body>
<?php
$user_id = $_POST['user_id'];
$friend_name = $_POST['friend_name'];
$conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', '');
$sql = "SELECT * FROM users WHERE name = '$friend_name'";
$friend_array = $conn->query($sql)->fetch();
if (is_bool($friend_array)) {

    $_POST['error'] = "Cet utilisateur n'existe pas";
            include('send_friend_request.php');

} elseif ($friend_array['user_id'] == $user_id) {

    $_POST['error'] = "Vous ne pouvez pas être ami avec vous même";
            include('send_friend_request.php');

} else {
    $friend_id = $friend_array['user_id'];

    $sql_already_friends = "SELECT U.* FROM users U WHERE U.user_id = $friend_id AND U.user_id IN 
    (SELECT user1_id from friends where user2_id = $user_id UNION
     SELECT user2_id from friends where user1_id = $user_id)";
    $result = $conn->query($sql_already_friends);
    if (is_bool ($result->fetch())) {

        $sql_send_request = "INSERT INTO friends (
            user1_id, user2_id, user_didnt_accepted_id
            ) VALUES (
            '$user_id', '$friend_id', '$friend_id'
            )";
        $conn->query($sql_send_request);
        include('top_button.php');
        ?>
        <head>
            <meta charset-"utf-8" />
	        <title>Votre demande a bien &#233t&#233 envoy&#233e</title>
        </head>
        <body>
        Votre demande a bien &#233t&#233 envoy&#233e<br/><br/>
        Nom de l'ami à ajouter :<br/><br/>
        <form action = "send_friend_request_answer.php?admin=0" method = "post">
            <input type = "text" name = "friend_name" /><br/>
            <input type = "submit" value = "Ajouter un ami"/>
            <input type = "hidden" name = "user_id" value = <?php echo $user_id ?>></input>
        </form>
        <?php

    } else {

        $_POST['error'] = "Vous êtes déja en relation avec cet utilisateur";
        include('send_friend_request.php');

    }

}
?>
</body>
</html>