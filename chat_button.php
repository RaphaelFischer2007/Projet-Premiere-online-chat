<form action = "chat.php?admin=0" method = "post">
    <input type = "hidden" name = "username" value = "<?php echo $entry_username?>">
    <input type = "hidden" name = "friend" value = "<?php echo $fetched_friend['name']?>">
    <input type = submit value = "<?php echo $fetched_friend['name']?>">
</form>