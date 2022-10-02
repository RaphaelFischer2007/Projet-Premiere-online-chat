<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css" media="screen" type="text/css" />
		<title>Cr&eacute;er un compte</title>
		<script>
			function resetErr() {
				document.getElementById("errorMessage").textContent = "";
			}
		</script>
	</head>

	<body>
		<form action="create_account_answer.php" method="post">
			Nom d'utilisateur : <br>
			<input type="text" name="entry_username" required title="Veuillez entrer un identifiant avec lettres et chiffres uniquement, 7 à 12 caract&egrave;res" pattern="[a-zA-Z0-9]*.{7,12}" onKeypress="resetErr()"> <br\>
			<span style='color:#F00;text-align:left;' id='errorMessage'>
			<?php if(isset($_POST['err'])) { echo $_POST['err']; } ?>
			</span>
			<br>mot de passe : <br>
			<input type="password" name="entry_password" required title="Veuillez entrer 7 à 12 caract&egrave;res" pattern=".{7,12}"> <br>
			<input type="submit" value="Cr&#233er mon compte">
		</form>

		<form action="login.php" method="post">
			<input type="submit" value="Se connecter">
		</form>
	</body>

</html>