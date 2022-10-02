<!-- Une petite leçon aux petits malins (;
?php if (isset($_GET['admin']) and $_GET['admin'] == 1) {
    ?> 
  <iframe width="420" height="315"
    src="https://www.youtube.com/watch?v=dQw4w9WgXcQ">
  </iframe> 
  ?php ;
}?>--->
<header>
    <table>
        <tr>
            <td>
        <form action = "login.php" method = "post" class = "top_form">
            <input type = "hidden" name = "err" value = "">
            <input type = "submit" value = "Déconnexion" class = "top_button">
        </form>
            </td>
            <td>
    <form action = "login_answer.php?admin=0" method = "post" class = "top_form">
        <input type = "hidden" name = "user_id" value = "<?php echo $user_id?>">
        <input type = "submit" value = "Conversations" class = "top_button">
    </form>
            </td>
            <td>
    <form action = "friends.php?admin=0" method = "post" class = "top_form">
        <input type = "hidden" name = "user_id" value = "<?php echo $user_id?>">
        <input type = "submit" value = "Amis" class = "top_button">
    </form>
            </td>
            <td>
    <form action = "friends_request_sent.php?admin=0" method = "post" class = "top_form">
        <input type = "hidden" name = "user_id" value = "<?php echo $user_id?>">
        <input type = "hidden" name = "error" value = "">
        <input type = "submit" value = "Demandes d'ami en attente" class = "top_button">
    </form>
            </td>
            <td>
    <form action = "friends_request_recieved.php?admin=0" method = "post" class = "top_form">
        <input type = "hidden" name = "user_id" value = "<?php echo $user_id?>">
        <input type = "hidden" name = "decision" value = "">
        <input type = "hidden" name = "friend_id" value = "">
        <input type = "submit" value = "Demandes d'ami reçues" class = "top_button">
    </form>
            </td>
        </tr>
    </table>
</header>