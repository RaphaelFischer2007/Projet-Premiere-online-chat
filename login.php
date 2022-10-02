<!DOCTYPE html>
<html>
  <head>
	<meta charset-"utf-8" />
	<title>Connexion</title>
	<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
	<script>
		function resetErr() {
			document.getElementById("errorMessage").textContent = "";
		}
	</script>
  </head>
<body>
  <form action="login_answer.php?admin=0" method="post">
	Nom d'utilisateur : <br/>
	<input type="text" name="entry_username" required title="Veuillez entrer un identifiant avec lettres et chiffres uniquement, de 7 à 12 caract&egrave;res" pattern=".{7,12}.[a-zA-Z0-9]*" onKeypress="resetErr()"> <br/>
	<br/>mot de passe : <br/>
	<input type="password" name="entry_password" required title="Veuillez entrer entre 7 et 12 caract&egrave;res" pattern=".{7,12}" onKeypress="resetErr()"> <br/>
	<input type="submit" value="Se connecter"/>
  </form>
  <br\>
  <span style='color:#F00;text-align:left;' id='errorMessage'>
	<?php if(isset($_GET['err'])) { echo "Votre identifiant ou votre mot de passe est incorrect"; } ?>
  </span>
  </form>

  <form action="create_account.php" method="post">
	<input type="submit" value="Cr&#233er un compte"/>
  </form>
</body>
</html>