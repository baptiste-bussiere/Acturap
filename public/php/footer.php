
<footer>
        <div class="footer_newsletters">
            <div class="newsletters_text">
                <h1>Ne manquez rien !</h1>
                <span>Inscrivez vous a la newsletter pour ne rien manquer.</span>
            </div>
            <form>
                <input type="email" placeholder="Votre email ici ...">
                <button type="submit" class="button_1">Envoyer</button>
            </form>

        </div>
        <div class="footer_menu"> 
       
            <div class="menu_col">
                <h1>Acces Rapide</h1>
                <ul>
                    <li>
                        <a href="../../../index.php#search">Rechercher</a>
                        <a href="../../../index.php#news">Top musique</a>
                        <a href="../../../index.php#artiste">Top Artiste</a>
                        <a href="../../../index.php#no_album">Top Album</a>
                    </li>
                </ul>
            </div>
          
            <div class="menu_col">
                <h1>Plus d'info </h1>
                <ul>
                    <li>
                        <a href="https://baptiste-bussiere.fr">Derriere le site</a>
                        <a href="/public/php/views/remerciement.php">Remerciement</a>
                        <a href="/public/mail/reco.php">Proposer des ameliorations</a>
                    </li>
                </ul>
            </div>
            <div class="menu_col">
                <h1>Contact </h1>
                <ul>
                    <li>
                        <a href="/public/mail/contact.php">Mail</a>
                        <a href="https://www.instagram.com/baptiste_buss/">Instagram</a>
                        <a href="https://www.linkedin.com/in/baptiste-bussiere-6a246997/">Linkedin</a>

                    </li>
                </ul>
            </div>
        </div>
        <div class="footer_app">
            <div class="app_text">
                <h1>
                    L'application mobile Acturap
                </h1>
            </div>
            <div class="app_image">
                <img src="/public/img/ico/play_store.svg" alt="Disponible sur le play store">
                <img src="/public/img/ico/app_store.svg" alt="Disponible sur l'app store">

            </div>
        </div>
        <div class="footer_band">
            <span><?php
                        $nb = trim(file_get_contents($lienCpt));
                        $nb += 1;
                        echo $nb . "\n";
                        file_put_contents($lienCpt, $nb, LOCK_EX);
                    ?> ème visiteur</span>
        </div>

    </footer>

<script src="../js/script.js"></script>

    </body>
    </html>