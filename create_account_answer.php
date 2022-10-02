<html>
  <head>
    <meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
		<title>Cr&eacute;er un compte</title>
  </head>
  <body>
    <?php
    $conn = new PDO('mysql:host=localhost;dbname=chat_base', 'root', '');
    $entry_username = $_POST['entry_username'];
    $entry_password = $_POST['entry_password'];
    // contrôle des caractères autorisés : seulement alphanum et -_.!
    $sql = " INSERT INTO users (name, password) VALUES ('$entry_username', '$entry_password')";
    $sql_check_name_doesnt_exist = " SELECT count(*) as nb FROM users WHERE name = '$entry_username'";

    try {
      $nb = $conn->query($sql_check_name_doesnt_exist)->fetch()['nb'];
      if ($nb == 0) {
        $conn->query($sql);
        echo "Votre compte a bien été créé !";
      } else {?>
        <form action="create_account.php" method="post" id="create_account_id">
          <input type="text" name="err" value = "Ce nom d'utilisateur existe déjà">
        </form>
        <script>
          document.getElementById('create_account_id').submit();
        </script>
    <?php 
      }

    } catch(PDOException $e) {
      echo "error : ".$e->getMessage();
    }  
    ?>
  </body>
</html>