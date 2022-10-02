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
    $conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', ''); 
    include('top_button.php');
    ?>
    Nom de l'ami à ajouter :<br/><br/>
    <form action = "send_friend_request_answer.php?admin=0" method = "post">
        <input type = "text" name = "friend_name" value = <?php echo $_POST['friend_name']; ?>></input>
        <p style='color:#F00;text-align:left;'> <?php echo $_POST['error'] ?> <br/>
        <input type = "submit" value = "Ajouter un ami"/>
        <input type = "hidden" name = "user_id" value = <?php echo $user_id ?>></input>
    </form>
</body>
</html>