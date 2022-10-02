<!DOCTYPE html>
<html>
<head>
    <meta charset-"utf-8" />
    <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<title>Vos demandes en attente</title>
</head>
<body>
    <?php
    $conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', '');
    $user_id = $_POST['user_id'];
    include('top_button.php');
    ?>
    Vos demandes en attente :<br/><br/>
    <form action="send_friend_request.php?admin=0" method="post">
        <input type = "hidden" name = "user_id" value = <?php echo $_POST['user_id'] ?>></input>
        <input type = "hidden" name = "friend_name" value = ""></input>
        <input type = "hidden" name = "error" value = ""></input>
        <input type = "submit" value = "Envoyer une nouvelle demande"/>
    </form>
<?php
$sql_friends = "SELECT U.* FROM users U WHERE U.user_id IN 
    (SELECT user1_id from friends where user2_id = $user_id AND user_didnt_accepted_id != 0 AND user_didnt_accepted_id != $user_id UNION
     SELECT user2_id from friends where user1_id = $user_id AND user_didnt_accepted_id != 0 AND user_didnt_accepted_id != $user_id)";
$friends = $conn->query($sql_friends);
while ($friend_array = $friends->fetch()) {
    echo $friend_array['name'];
    echo nl2br ("\n");
}
?>
</body>
</html>