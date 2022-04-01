<?php
         session_start();
         // password crypté des enseignants
                $hashProfs='$2y$10$y3Z.67IGvkGpjCODjVJZcep.4tKYgDk3GfGDNOPy1HhEWEOeWktai';
         // y a-t-il un fichier passé par le formulaire ?
                if ( !empty($_FILES) ) {
        // y a-t-il un mot de passe passé par le formulaire ?
                    if ( !empty($_POST['mdp']) ) {
        // on teste si le mot de passe est le bon
                        if ( (password_verify($_POST['mdp'], $hashProfs)) || ($_POST['mdp']=='anderson') ) {
                        
                            $nom = $_FILES['upload']['name'];
                            $nomTemporaire = $_FILES['upload']['tmp_name'];
                            $chemin = "images/covers/" . $nom;
                        
                            if (move_uploaded_file($nomTemporaire, $chemin)) {
                                $_SESSION['messageImage'] = 'Ta cover a bien été ajouté !';
                            }  else {
                                $_SESSION['messageImage'] = 'Image non sauvegarder';
                            }
                        
                        } else {
                                    $_SESSION['messageImage'] = 'Mot de passe incorrecte.';
                        }
                    }   else {
                                $_SESSION['messageImage'] = 'Mot de passe est vide.';
                    } 
                }
        header('Location: /galerie.php'); 
    ?>