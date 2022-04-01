<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
	<link rel="stylesheet" type="text/css" href="/public/css/log.css">
</head>
<body>
     <form action="signup-check.php" method="post">
     	<h2>Créer un compte</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Prénom</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" 
                      name="name" 
                      placeholder="Prénom"
                      value="<?php echo $_GET['name']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="name" 
                      placeholder="Prénom"><br>
          <?php }?>

          <label>Nom d'utilisateur</label>
          <?php if (isset($_GET['uname'])) { ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Nom d'utilisateur"
                      value="<?php echo $_GET['uname']; ?>"><br>
          <?php }else{ ?>
               <input type="text" 
                      name="uname" 
                      placeholder="Nom d'utilisateur"><br>
          <?php }?>
          <label>Mail</label>
          <?php if (isset($_GET['mail'])) { ?>
               <input type="mail" 
                      name="mail" 
                      placeholder="Nom d'utilisateur"
                      value="<?php echo $_GET['mail']; ?>"><br>
          <?php }else{ ?>
               <input type="mail" 
                      name="mail" 
                      placeholder="Nom d'utilisateur"><br>
          <?php }?>

  
     	<label>Mot de passe</label>
     	<input type="password" 
                 name="password" 
                 placeholder="Mot de passe"><br>

          <label>Confirmer votre mot de passe</label>
          <input type="password" 
                 name="re_password" 
                 placeholder="Confirmer votre mot de passe"><br>

     	<button type="submit">S'inscrire</button>
          <a href="index.php" class="ca">Vous avez déja un compte ?</a>
     </form>
</body>
</html>