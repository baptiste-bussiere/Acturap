<?php 

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
 

<!DOCTYPE html>
<html lang="en">

<head>    <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/panel.css">
    <script src="https://kit.fontawesome.com/b28bfc0ccb.js" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body> 
    <div class="page">

    <nav>
    <ul>            

<li>
    <a href="/public/php/log/dashboard/home.php"><img src="../img/avatar.png" alt=""><?php echo $_SESSION['name']; ?></a>
 <a href="/public/php/log/dashboard/musique.php"><i class="fas fa-music"></i>Ma musique</a>        
<a href="/public/php/log/dashboard/news.php"><i class="far fa-newspaper"></i>Mes News</a>      
    <a href="/public/php/log/dashboard/friend.php"><i class="fas fa-user-friends"></i>Mes Amis</a>  
    <a href="../logout.php"><i class="fas fa-sign-out-alt"></i>Deconnexion</a>        

</li>
</ul>
        </nav>

    <main  id="swup" class="transition-fade">
       

        <div class="main_profil">
            <div class="profil_avatar"> 
                  <img src="../img/avatar.png" alt="avatar">
                 <span>Enfin de retour parmis nous, <?php echo $_SESSION['name']; ?></span> 
                <div class="profil_infos">            
                <h1>Mes Infos</h1>
                <hr>
                <span>Nom : <?php echo $_SESSION['name']; ?></span>
                <hr>
                <span>Nom d'utilisateur : <?php echo $_SESSION['user_name']; ?></span>
                <hr>
                <span>Adresse Mail : <?php echo $_SESSION['mail']; ?></span>
                <hr>
                <span>Mot de passe : ************</span>                     <h2>Mon abonnement</h2>
            </div><div class="sub">
           <a href="https://www.buymeacoffee.com/baptistebuss">
               <div id="free" class="sub_card">
                <h3>FREE 0.00€/mois</h3>
                    <ul>
                        <li>
                            <p>Acces limité aux paroles</p>
                            <p style="text-decoration:line-through;">Acces à plus d'un million de musique</p>
                            <p style="text-decoration:line-through;">Acces Sans Pub</p>
                            <p style="text-decoration:line-through;">Chatter et ecoute votre musique en temps réel avec vos amis (Beta)</p>
                        </li>
                    </ul>
                </div>
            </a>
            <a href="https://www.buymeacoffee.com/baptistebuss">
                <div id="prem" class="sub_card">
                    <h3>PREMIUM 9.99/€mois</h3>
                    <ul>
                        <li>
                            <p>Acces limité aux paroles</p>
                            <p>Acces à plus d'un million de musique</p>
                            <p>Acces sans pub</p>
                            <p>Chatter et ecoute votre musique en temps réel avec vos amis (Beta)</p>

                        </li>
                    </ul>
                    
                </div>
            </a>

            </div>
            </div>
        </div>
                
    </main>      
    </div>

    
    <script>
    
    const swup = new Swup();
</script>
                     
             

                

             
  


</body>

</html>


<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>