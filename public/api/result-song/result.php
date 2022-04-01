<?php 
$id = $_GET['id_song'];
$curl = curl_init();

curl_setopt_array($curl, [
       CURLOPT_URL => "https://genius.p.rapidapi.com$id",
       CURLOPT_RETURNTRANSFER => true,
       CURLOPT_FOLLOWLOCATION => true,
       CURLOPT_ENCODING => "",
       CURLOPT_MAXREDIRS => 1,
       CURLOPT_TIMEOUT => 30,
       CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
       CURLOPT_CUSTOMREQUEST => "GET",
       CURLOPT_HTTPHEADER => [
              "x-rapidapi-host: genius.p.rapidapi.com",
              "x-rapidapi-key: 0b13d45409msh709f4a4746726dcp1da85djsna842b7213223"
       ],
]);
 
$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


if ($err) {
       echo "cURL Error #:" . $err;
} else {

file_put_contents('result.json', $response, );
}


$fichier='result.json';
$tabAlbumJSON=file_get_contents($fichier);
$obj=json_decode($tabAlbumJSON);



for ($i=0; $i<count($obj->response->song); $i++){

       $name = $obj->response->song->artist_names;
       $title = $obj->response->song->title;
       $provider = $obj->response->song->media[$i]->provider;
       $yt_url = $obj->response->song->media[$i]->url;
       $embed = $obj->response->song->embed_content;
       $image_cover= $obj->response->song->album->cover_art_url;
       $name_album = $obj->response->song->album->name;
       $header_image = $obj->response->song->header_image_url;
       $id_album = $obj->response->song->album->api_path;
       $date = $obj->response->song->release_date;
       $name_artist = $obj->response->song->album->artist->name;
       $id_artist = $obj->response->song->album->artist->api_path;
       $views = $obj->response->song->stats->pageviews;
       $img_artist = $obj->response->song->album->artist->image_url;

       
     
}  for ($y=0; $y<count($obj->response->song->media); $y++){
  
       if($obj->response->song->media[$y]->provider == "youtube"){
       $youtube_verified = $obj->response->song->media[$y]->url;
      
} 
}

       if(empty($image_cover)){
           $image_cover = $header_image;
       }
?>




<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <script src="https://kit.fontawesome.com/b28bfc0ccb.js" crossorigin="anonymous"></script>
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       <title></title>
       <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
       
<?php include('../../php/header.php');?>



<main>
              
                        
   <div class="main_intro"> 
       <div class="info_title">  <img class="cover" src="<?php echo $image_cover?>" alt="">
          <h1><?php echo $title?> <br> <span> <?php echo $name?></span></h1>
         </div>   
        
    </div>
<div class="main_content">


               <div class='main_left'>
        <?php echo $embed?>
     

        </div>
        <div class='main_right'>
            <div class='player'><iframe width='560' height='315' src='<?php       
       $rep = str_replace('http://www.youtube.com/watch?v=', 'https://www.youtube.com/embed/', $youtube_verified);
echo $rep;?>' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
            <div class='main_tracklist'><img src="<?php echo $image_cover?>" alt=""> </div>
              
                <div class='main_streaming'>
            
                <div class='stream'>
                <?php  echo '<a href="../result-artist/result.php?id_artist='.$id_artist.'">' ?>
                  <img src="<?php echo $img_artist?>" alt=""><?php echo $name_artist?></a>

                </div> 
                <div class='stream'>
                <?php  echo '<a href="../result-album/result.php?id_album='.$id_album.'">' ?>
                  <img src="<?php echo $image_cover?>" alt=""><?php echo $name_album?></a>

                </div>
     <div class="info">
            <h1>Informations</h1>
            <span>Sortie le : <?php echo $date?></span>
            <span>Par : <?php echo $name_artist?></span>
            <span>Titre : <?php echo $title?></span>
            <span>Vue : <?php echo $views?></span>
            <span>Album : <?php echo $name_album?></span>





     </div>
            </div>
            </div> 
        
       
</main>    


     
    <?php include('../../php/footer.php');?>





<style>
    .main_intro{
        background-image: url('<?php echo $header_image ?>');   
        background-size: cover;
        background-repeat: no-repeat; 
        background-position: center;}
        <?php     ?>   
</style>
    </body>
</html>