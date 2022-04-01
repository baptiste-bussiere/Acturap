




   



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/b28bfc0ccb.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swup@latest/dist/swup.min.js"></script>  
    <title>ActuRap - le site de musique numéro 1 en France</title>
</head>

<body>



<div class="popup-box" id="cache">
								<div class="transparent-layer"></div>
								<div class="popup-inner" >
				
									<div class="popup-msg">Bienvenue sur mon site de SAE. Près de 5 mois de travail aurront été neccesaire
                                pour abboutir à ce site. Tout le site est fonctionnel, vous pouvez rechercher n'importe quelle musique, album, artiste. 
                            Cependant quelques beug peuvent survenir, si vous en detecter un, vous pouvez me le dire en me contactant via le formulaire de contact en bas de page.
                       <br> Vous etes un prof ? <br> Vous trouverez tout les travaux demander dans la navbar !
                    Merci de votre visite, a bientot sur ActuRap !</div>
									
								<button class="next-step-btn" id="button" >J'ai compris</button></div>
							</div>

    <header>
        <div class="header_img">
            <img id="hero" src="public/img/bg/hero.jpg" alt="alpha wann">
            <div class="header_logo">
             <img src="public/img/ico/logo_white.svg" alt="">
            </div>
        </div>

        <?php require('public/php/header.php');?>
        <div id="search" class="header_search">
            <h1>Rechercher une musique, ses lyrics et plus encore.</h1>
            <div class="search">
           <form class="search" method="post" action="/public/api/resultat/resultat.php">   
                  <input type="text" name="search" class="searchTerm" placeholder="Que voulez vous recherchez ?" /> <br/>
                <button type="submit" name="send" value="OK" class="searchButton">
                  <i class="fa fa-search"></i>
            </form>
            </div>

            
        </div>
    </header>
    <main>
        <div id="news" class="main_news">
            <div class="news_title ">
                <h1>
LES MUSIQUES DU JOUR                </h1>
            </div>




            <div class="main_card">

               


                
            <?php 
            
   
   

     $url_a = "https://genius.com/api/songs/chart?time_period=day&chart_genre=rap&page=1&per_page=10&text_format=html";

     $curl_a = curl_init($url_a);
     curl_setopt($curl_a, CURLOPT_URL, $url_a);
     curl_setopt($curl_a, CURLOPT_RETURNTRANSFER, true);
     
     $headers = array(
        "Accept: application/json",
     );
    
     curl_setopt($curl_a, CURLOPT_SSL_VERIFYHOST, false);
     curl_setopt($curl_a, CURLOPT_SSL_VERIFYPEER, false);
     
     $resp_a = curl_exec($curl_a);
     curl_close($curl_a);
     
     
     
     file_put_contents('song.json', $resp_a, );
     
     $fichier_a='song.json';
     $tabAlbumJSON_a=file_get_contents($fichier_a);
     $obj_a=json_decode($tabAlbumJSON_a);
     
     
     
     
            
            for ($a=0; $a<5; $a++){
                 $song_api_path = $obj_a->response->chart_items[$a]->item->api_path;
  $name_artist = $obj_a->response->chart_items[$a]->item->name;
  $song_cover_image = $obj_a->response->chart_items[$a]->item->song_art_image_thumbnail_url;
  $name_song = $obj_a->response->chart_items[$a]->item->artist_names;
  $name_song_art = $obj_a->response->chart_items[$a]->item->title;
  $views = $obj_a->response->chart_items[$a]->item->stats->pageviews;



 echo ' <a href="public/api/result-song/result.php?id_song='.$song_api_path.'">

 <div id="card_1" class="card">

     <img src="'.$song_cover_image.'" alt="">
                          <div class="text_card"><h2>'.$name_song_art.'</br> <span>'.$name_song.'</span></h2><span class="views">'.$views.' <i class="far fa-eye"></i></span>
</div>


 </div>
</a>
';
}?>


<div id=second_news>  
    <?php 
            
            for ($a=5; $a<10; $a++){
  
              
                 $song_api_path = $obj_a->response->chart_items[$a]->item->api_path;
  $name_artist = $obj_a->response->chart_items[$a]->item->name;
  $song_cover_image = $obj_a->response->chart_items[$a]->item->song_art_image_thumbnail_url;
  $name_song = $obj_a->response->chart_items[$a]->item->artist_names;
  $name_song_art = $obj_a->response->chart_items[$a]->item->title;
  $views = $obj_a->response->chart_items[$a]->item->stats->pageviews;

 echo ' <a href="public/api/result-song/result.php?id_song='.$song_api_path.'">

 <div  class="card">

     <img src="'.$song_cover_image.'" alt="">
                          <div class="text_card"><h2>'.$name_song_art.'</br> <span>'.$name_song.'</span></h2><span class="views">'.$views.' <i class="far fa-eye"></i></span>
</div>


 </div>
</a>
';
}?>
            </div>
            <div class="main_band">
                <button id="show_news"><span>+</span> Plus de musiques</button>
            </div>


      

            <div id="artiste" class="news_title ">
                <h1>
                    TOP ARTISTE DE LA SEMAINE
                </h1>
            </div>     <div class="main_artiste">
           
           
           <?php 
             $url_b = "https://genius.com/api/artists/chart?time_period=week&page=1&per_page=14&text_format=html";

             $curl_b = curl_init($url_b);
             curl_setopt($curl_b, CURLOPT_URL, $url_b);
             curl_setopt($curl_b, CURLOPT_RETURNTRANSFER, true);
             
             $headers = array(
                "Accept: application/json",
             );
         
             curl_setopt($curl_b, CURLOPT_SSL_VERIFYHOST, false);
             curl_setopt($curl_b, CURLOPT_SSL_VERIFYPEER, false);
             
             $resp_b = curl_exec($curl_b);
             curl_close($curl_b);
             
             
             
             file_put_contents('artist.json', $resp_b, );
             
             $fichier_b='artist.json';
             $tabAlbumJSON_b=file_get_contents($fichier_b);
             $obj_b=json_decode($tabAlbumJSON_b);
             
            for ($y=0; $y<7; $y++){
  
              
                 $artist_api_path = $obj_b->response->chart_items[$y]->item->api_path;
  $name_artist = $obj_b->response->chart_items[$y]->item->name;
  $header_image = $obj_b->response->chart_items[$y]->item->image_url;

echo '<a href="public/api/result-artist/result.php?id_artist='.$artist_api_path.'">
                    <div class="artiste">
                        <div class="artiste_image">
                            <img src="'.$header_image.'" alt="laylow">

                        </div>
                        <div class="artiste_text">
                            <p>'.$name_artist.'</p>
                        </div>
                    </div>
                </a>';

}?>


               
               
            </div>
            <div id="second_artiste" class="main_artiste">
            <?php 
            for ($y=7; $y<count($obj_b->response->chart_items); $y++){
  
              
                 $artist_api_path = $obj_b->response->chart_items[$y]->item->api_path;
  $name_artist = $obj_b->response->chart_items[$y]->item->name;
  $header_image = $obj_b->response->chart_items[$y]->item->image_url;

echo '<a href="public/api/result-artist/result.php?id_artist='.$artist_api_path.'">
                    <div class="artiste">
                        <div class="artiste_image">
                            <img src="'.$header_image.'" alt="laylow">

                        </div>
                        <div class="artiste_text">
                            <p>'.$name_artist.'</p>
                        </div>
                    </div>
                </a>';

}?>


            </div>
            <div class="main_band">
                <button id="show_artiste"><span>+</span> Plus d'artiste</button>
            </div>
            <div id="no_album" class="news_title ">
                <h1>
                    TOP ALBUM DE LA SEMAINE
                </h1>
            </div>

<div class="main_top_album">                
    

            <?php 

$url = "https://genius.com/api/albums/chart?time_period=week&page=1&per_page=15&text_format=html";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);



file_put_contents('album.json', $resp, );

$fichier='album.json';
$tabAlbumJSON=file_get_contents($fichier);
$obj=json_decode($tabAlbumJSON);

            for ($i=0; $i<15; $i++){

$album_api_path = $obj->response->chart_items[$i]->item->api_path;
$name_album = $obj->response->chart_items[$i]->item->name;
$cover_image = $obj->response->chart_items[$i]->item->cover_art_thumbnail_url;
$date = $obj->response->chart_items[$i]->item->release_date_components->year;
$artist_api_path = $obj->response->chart_items[$i]->item->artist->api_path;
$name_artist = $obj->response->chart_items[$i]->item->artist->name;
$compteur = $i +1;

echo '<a href="public/api/result-album/result.php?id_album='.$album_api_path.'">

                        <div class="album album_1">
                            <div class="album_num">
                                <span>'.$compteur.'</span>
                                <img src="public/img/ico/arrow_up.svg" alt="">
                            </div>
                            
                                <img src="'.$cover_image.'" alt="">
                        
                            <div class="album_text">
                                <h1>'.$name_album.'<br><span>'.$name_artist.'</span></h1>

                            </div>
                        </div>
                    </a>';
                

}?>

           
                    
                    
                
               

         

            </div>

            <div>

            </div>

       
        </div>


    </main>
    <?php     $lienCpt = 'comptage/mon_compteur.txt';
require('public/php/footer.php');
    
?>
    </div>
<script src="/public/js/script.js"></script>


 
</body>

</html>



 