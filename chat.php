<?php
$conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', '');
$username = $_POST["username"];
$friend = $_POST["friend"];
$user_id = $_POST['user_id'];
include('top_button.php');
echo "Discussion avec ".$friend." :";
echo nl2br ("\n");
echo nl2br ("\n");
$conn = new PDO('mysql:host=localhost;dbname=messages_base', 'root', '');

if ($conn->query($sql1) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;}
$conn->query($sql2);
?>