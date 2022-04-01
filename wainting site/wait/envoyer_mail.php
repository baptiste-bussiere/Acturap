<?php 


    if (count($_POST)==0){
        header('Location: contact.php');
    }

    if (!empty($_POST['nom'])){
        $nom=mb_strtolower(ucfirst($_POST['nom']));
        echo 'Le nom est : '.$nom.'<br />'."\n";
    } else {
        echo 'Erreur : le nom est vide'."\n";
        exit(0);
    }

    if (!empty($_POST['prenom'])){
        $prenom=mb_strtolower(ucfirst($_POST['prenom']));
        echo 'Le prénom est : '.$prenom.'<br />'."\n";
    } else {
        echo 'Erreur : le prénom est vide'."\n";
        exit(0);
    }


    if (!empty($_POST['message'])){
        $message=mb_strtolower(ucfirst($_POST['message']));
        echo 'Le message est : '.$message.'<br />'."\n";
    } else {
        echo 'Erreur : le message est vide'."\n";
        exit(0);
    }

    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
            $mail=$_POST['mail'];
            echo 'L\'email est : '.$mail.'<br />'."\n";
        } else {
            echo 'Erreur : l\'email n\'est pas valide'."\n";
            exit(0);
        }
    } else {
        echo 'Erreur : l\'email est vide'."\n";
        exit(0);
    }





    $destinataire = 'contact@baptiste-bussiere.fr';
    $sujet = 'Demande de renseignement'.date('d/m/Y');
    $headers = 'From : mmi21d03@mmi-troyes.fr'."\r\n".
        'Reply-To : mmi21d03@mmi-troyes.fr'."\r\n".
        'X-Mailer : PHP/'.phpversion();

    if (mail($destinataire, $sujet, $message, $headers)) {
        header('Location: valid_mail.php');
    } else {
        echo 'Erreur : message non envoyé'."\n";
    }




    $headers = 'mail.html';
    
        if (mail($_POST['mail'], 'state : ok;', $headers)){
            echo 'OK'."\n";
            header('Location: valid_mail.php?id='.$prenom.'');
        } else {
            echo 'Erreur : message not send'."\n";
        }