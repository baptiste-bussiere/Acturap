<?php 
$id = $_GET['id_artist'];
$url = "https://api.genius.com$id";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Authorization: Bearer EE1hiWNFqNd6urHxolbilpVCzu-nvmYNPSwJgFZLvaAu15PYjie6msZLYx5kqfoa",

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$reponse_artists = curl_exec($curl);
curl_close($curl);


if ($err) {
       echo "cURL Error #:" . $err;
} else {

file_put_contents('artists.json', $reponse_artists, );
}



  $fichier='artists.json';
$tabAlbumJSON=file_get_contents($fichier);
$obj=json_decode($tabAlbumJSON);



for ($i=0; $i<count($obj->response->artist); $i++){

$header_image = $obj->response->artist->header_image_url;
$name = $obj->response->artist->name;
$date = $obj->response->albums[$i]->release_date_components->year;
$dom = $obj->response->artist->description->dom->tag;
$verified = $obj->response->artist->is_verified;


}

  
?>


<!DOCTYPE html>
<html lang="fr">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="https://kit.fontawesome.com/b28bfc0ccb.js" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       <title></title>
       <link rel="stylesheet" href="../../css/main.css">
       <link rel="stylesheet" href="../../css/artiste.css">
</head>
<body>
       
<?php include('../../php/header.php');?>



<main> 
    <?php if($verified == "1"){
       echo "<style>#check{display:inherit;}</style>";
   }?>
        <div class="header">
            <div class="blur">  </div>
            </h1><div class="text"><h1 ><?php echo $name ?>            <span><i id="check" class="fas fa-certificate"></i></span>
</h1></div>
        </div>
        <div class="information">
            <a href="">S'abonner</a>
        </div>
        <div class="main_album">
            <h1>Les Plus Populaire</h1>
         
           
           
           <?php 
$url = "https://genius.com/api$id/songs?per_page=8?page=1&sort=popularity";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$reponse_song = curl_exec($curl);
curl_close($curl);


if ($err) {
       echo "cURL Error #:" . $err;
} else {

file_put_contents('song.json', $reponse_song, );
}



  $fichier='song.json';
$tabAlbumJSON=file_get_contents($fichier, true);



$obj=json_decode($tabAlbumJSON);
for ($i=0; $i<count($obj->response->songs); $i++){

$name_song = $obj->response->songs[$i]->title;
$image_song = $obj->response->songs[$i]->song_art_image_url;
$time_song = $obj->response->songs[$i]->stats->pageviews;
$path_song = $obj->response->songs[$i]->api_path;


echo '<a href="../result-song/result.php?id_song='.$path_song.'"><div class="album_list"><span class="play"><i class="fas fa-play"></i></span><img src="'.$image_song.'" alt=""><h2>'.$name_song.'</h2><p>'.$time_song.'</p><i class="far fa-heart"></i></div></a>


';
}
   
?>
            <h1>Bibliotheque</h1>
            <div class="album_contain">

            <?php 
$url = "https://genius.com/api$id/albums?page=1";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);


if ($err) {
       echo "cURL Error #:" . $err;
} else {

file_put_contents('result.json', $resp, );
}



  $fichier='result.json';
$tabAlbumJSON=file_get_contents($fichier);
$obj=json_decode($tabAlbumJSON);
for ($i=0; $i<count($obj->response->albums); $i++){

$cover_image = $obj->response->albums[$i]->cover_art_thumbnail_url;
$name_album = $obj->response->albums[$i]->name;
$date = $obj->response->albums[$i]->release_date_components->year;
$path_album = $obj->response->albums[$i]->api_path;
 echo '<a href="../result-album/result.php?id_album='.$path_album.'"><div class="album"><img src="'.$cover_image.'" alt=""><h1>'.$name_album.'</h1><span>'.$date.'</spantest></div></a>';


}
   
?>


           
            </div>
            <h1>Similaire a <?php echo $name ?> </h1>
            <div class="artiste_contain">

                <a href="">
                    <div class="artiste">
                        <img src="/public/img/artiste/alpha-wann.jpg" alt="">
                        <h1>
                            Alpha Wann
                        </h1>
                        <span>2021</span>

                    </div>
                </a>


                <a href="">
                    <div class="artiste">
                        <img src="/public/img/artiste/nepal.jpg" alt="">
                        <h1>
                            Nepal
                        </h1>
                        <span>2021</span>

                    </div>
                </a>

                <a href="">
                    <div class="artiste">
                        <img src="/public/img/artiste/josman.jpg" alt="">
                        <h1>
                            Freeze Corleone
                        </h1>
                        <span>2021</span>

                    </div>
                </a>

                <a href="">
                    <div class="artiste">
                        <img src="/public/img/artiste/dinos.jpg" alt="">
                        <h1>
                            Freeze Corleone
                        </h1>
                        <span>2021</span>

                    </div>
                </a>

                <a href="">
                    <div class="artiste">
                        <img src="/public/img/artiste/nekfeu.jpeg" alt="">
                        <h1>
                            Nekfeu
                        </h1>
                        <span>2021</span>

                    </div>
                </a>
            </div>
            <h1>En savoir plus sur <?php  echo $name?></h1>
            <div class="main_info">

                <div class="info">
                    <div class="info_text">
                        <h1><?php  echo $name?></h1>
                        <p> <?php echo $dom?></p>

                    </div>
                </div>

            </div>
        </div>

    </main>


     
    <?php include('../../php/footer.php');?>





<style>
  main .header {
    
        background: url("<?php echo $header_image ?>") no-repeat;
        background-size: cover;
        background-position:center;
    }
 
</style>
    </body>
</html>