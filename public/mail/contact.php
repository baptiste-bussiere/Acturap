<?php require('../php/head.php');?>
<?php require('../php/header.php');?>
<link rel="stylesheet" href="style.css">
<main>
    <div class="contact">
        <h1>Contactez-nous !</h1>
        <form action="envoyer_mail.php" method="post">
            <label for="prenom">prénom:</label>
            <input type="text" placeholder="Neo" id="prenom" name="prenom">
            <label for="nom">nom:</label>
            <input type="text" placeholder="Anderson" id="nom" name="nom">
            <label for="mail">Email:</label>
            <input type="mail" placeholder="mail@exemple.com" id="mail" name="mail">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Tapez votre message ici..."></textarea>
            <input type="submit" value="Envoyer">
        </form>
        </div>
    </main>
    <?php require('../php/footer.php');?>
