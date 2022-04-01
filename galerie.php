

        <?php
                    require 'public/php/head.php';

            require 'public/php/header.php';

            if (!empty($_SESSION['messageImage'])) {
                echo '<p>' .$_SESSION['messageImage'].'</p>'."\n";
                $_SESSION['messageImage']=null;
            }
        ?>
        <link rel="stylesheet" href="public/css/galerie.css">

        <div id="galerie">
            <?php
                //
                $contenu=dir("images/covers/");
                //
                while ( $nomElement=$contenu->read() ) {
                    if(!is_dir('images/covers/'.$nomElement)) { 
                        $extension=substr($nomElement, -4);
                        if ((strtolower($extension) == '.jpg') || (strtolower($extension) == '.png')) {
                         //echo $nomElement.'<br />'."\n";
                         echo '<img src="images/covers/'.$nomElement.'" alt="' .$nomElement. '" />'."\n";
                        }
                    }
                }
                //
                $contenu->close()
            ?>
        </div>

        <div id="formulaire">
            <h1 id="form_title">AJOUTER UNE IMAGE</h1>
            <form method="post" action="ajouter_img.php" enctype="multipart/form-data">
                <div class="upload">
                    <label for="upload" class="form_label">CHOISIR UNE IMAGE</label>
                    <div id="upload_all">
                        <div id="upload_button">
                            <label for="upload">UPLOAD</label>
                        </div>
                        <input type="file" id="upload" name="upload">
                    </div>
                    <div class="preview">
                    </div>
                </div>
                
                <div id="mdp">
                    <label for="mdp" class="form_label">MOT DE PASSE</label>
                    <input type="password" name="mdp" placeholder="...">
                </div>

                <input type="submit" name="ajouter" id="form_button" value="AJOUTER">
            </form>
        </div>
    </div>
    

</main>




<?php 
    $lienCpt = '../comptage/mon_compteur.txt';

    require 'public/php/footer.php';
?>