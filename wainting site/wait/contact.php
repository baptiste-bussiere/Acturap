<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nous contacter</title>
</head>
<body>
    
</body>
</html>
<main>
    <div class="contact">
        <h1>Page de contact</h1>
        <form action="envoyer_mail.php" method="post">
            <label for="nom">Nom:</label>
            <input type="text" placeholder="Anderson" id="nom" name="nom">
            <label for="prenom">prénom:</label>
            <input type="text" placeholder="Neo" id="prenom" name="prenom">
            <label for="mail">Email:</label>
            <input type="mail" placeholder="mail@exemple.com" id="mail" name="mail">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Tapez votre message ici..."></textarea>
            <input type="submit" value="Envoyer">
        </form>
        </div>
    </main>