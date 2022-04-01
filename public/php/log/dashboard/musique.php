<?php 

     




session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>

     



<!DOCTYPE html>
<html lang="en">

<head>    
    <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  

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
       

       <div class="no_content">
       <i class="far fa-heart"></i>
       <span>Vous n'avez liker aucune chanson !</span>
       </div>
                
    </main>      
    </div> 
    
    <script>const swup = new Swup(); // only this line when included with script tag
</script>
                     
             

                

             
  


</body>

</html>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

 