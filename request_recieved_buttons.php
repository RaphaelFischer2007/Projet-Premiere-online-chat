<table>
    <tr>
        <td>
            <form action = "friends_request_recieved.php?admin=0" method = "post">
                <input type = "hidden" name = "user_id" value = "<?php echo $user_id?>">
                <input type = "hidden" name = "friend_id" value = "<?php echo $friend_id?>">
                <input type = "hidden" name = "decision" value = "accepted">
                <input style='color:#070;text-align:left;' type = submit value = "accepter">
            </form>
        </td>
        <td>
            <form action = "friends_request_recieved.php?admin=0" method = "post">
                <input type = "hidden" name = "user_id" value = "<?php echo $user_id?>">
                <input type = "hidden" name = "friend_id" value = "<?php echo $friend_id?>">
                <input type = "hidden" name = "decision" value = "refused">
                <input style='color:#F00;text-align:left;' type = submit value = "refuser">
            </form>
        </td>
    </tr>
</table>