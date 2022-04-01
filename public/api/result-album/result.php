
  <?php 
$id = $_GET['id_album'];

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

$resp = curl_exec($curl);
curl_close($curl);



file_put_contents('result.json', $resp, );

$fichier='result.json';
$tabAlbumJSON=file_get_contents($fichier);
$obj=json_decode($tabAlbumJSON);

for ($i=0; $i<count($obj->response->album); $i++){

       $title = $obj->response->album->name;
       $name = $obj->response->album->artist->name;
       $img = $obj->response->album->cover_art_url;
       $api_path_artist = $obj->response->album->artist->api_path;

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

       <title> <?php echo $title ?></title>
       <link rel="stylesheet" href="../../css/main.css">
       <link rel="stylesheet" href="../../css/album.css">
</head>
<body>
       
<?php include('../../php/header.php');?>







 
 
 <?php
  

$url = "https://api.genius.com$id/tracks";

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

$resp = curl_exec($curl);
curl_close($curl);



file_put_contents('track.json', $resp, );

$fichier='track.json';
$tabAlbumJSON=file_get_contents($fichier);
$track=json_decode($tabAlbumJSON);

  echo '<div class="main">
       <div class="left_album">
          <div class="album">
                   <img src="'.$img.'" alt="">
                   <div class="text"><h1>'.$title.'</h1></div>
                   <div class="text"><a href="../result-artist/result.php?id_artist='.$api_path_artist.'" ><h2>'.$name.'</h2></a></div>
           </div>
           </div>
           <div class="right_tracks">
           

       
       ';

for ($i=0; $i<count($track->response->tracks); $i++){
       $number = $track->response->tracks[$i]->number;
       $title = $track->response->tracks[$i]->song->title;
       $tracks = $track->response->tracks[$i];
       $api_path = $track->response->tracks[$i]->song->api_path;

     
       echo '<a href="../result-song/result.php?id_song='.$api_path.'"><div class="track">'; 
       echo '<div class="text">';
       echo '<h2><span>'.$number.'</span> '.$title.'</h2>'; 
       echo '</div></div></a>';


}
echo '</div></div>';
 include('../../php/footer.php');?>

    </body>
</html>