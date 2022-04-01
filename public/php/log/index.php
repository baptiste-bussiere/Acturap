<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="/public/css/log.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>S'identifier</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Nom d'utilisateur</label>
     	<input type="text" name="uname" placeholder="Nom d'utilisateur"><br>

     	<label>Mot de passe</label>
     	<input type="password" name="password" placeholder="Mot de passe"><br>

     	<button type="submit">Se connecter</button>
          <a href="signup.php" class="ca">Pas encore membre ? Inscrivez Vous c'est gratuit !</a>
     </form>

</body>
</html>