

      
      
    

<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="../../css/result.css">
   <link rel="stylesheet" href="../../css/style.css">

   <script src="https://kit.fontawesome.com/b28bfc0ccb.js" crossorigin="anonymous"></script>
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <title>Reultat de la recherche pour <?php $pseudo?> </title>
</head>
<body>
  <?php
      $incr = 1;
        $replace = "";
$load = "1";
        if(isset($_POST['send'])){
            $pseudo=$_POST['search'];
            $result="https://api.genius.com/search?per_page=12&page=$load&q=$pseudo";
       $replace = str_replace(' ', '', $result);
        
        
}

?>
<?php include('../../php/header.php');?>
 <?php  
 
 $err ="";
 $curl = curl_init($result);
 curl_setopt($curl, CURLOPT_URL, $replace);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 
 $headers = array(
    "Accept: application/json",
    "Authorization: Bearer EE1hiWNFqNd6urHxolbilpVCzu-nvmYNPSwJgFZLvaAu15PYjie6msZLYx5kqfoa",
 
 
 );
 curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 
 $resp = curl_exec($curl);
 curl_close($curl);
 
 
 if ($err) {
        echo "cURL Error #:" . $err;
 } else {
 
 file_put_contents('song.json', $resp, );
 }
 
 
 $fichier='song.json';
 $tabAlbumJSON=file_get_contents($fichier);
 $obj=json_decode($tabAlbumJSON);
 
 if(!empty($tabAlbumJSON)){
   echo "
   <div id='search' class='header_search'><h1> Resultat pour : '$pseudo'</br><p>Si vous ne tombez pas sur ce que vous rechercher, </br> n'hesitez pas à chercher le nom de l'artiste, un de ses albums ou encore une de ses chansons connues.</p></h1><div id='small' class='search'>
  <form class='search' method='post' action='resultat.php'>   
         <input type'text' name='search' class='searchTerm' placeholder='Rechercher un artiste un album ou un son ...'/> <br/>
       <button type='submit' name='send' value='OK' class='searchButton'>
         <i class='fa fa-search'></i>
   </form>
   </div></div>";
}
   else{
      
      echo "<div id='search' class='header_search'><h1>Desolé, mais nous n'avons rien trouvé</br><p>Si vous ne tombez pas sur ce que vous rechercher, </br> n'hesitez pas à chercher le nom de l'artiste, un de ses albums ou encore une de ses chansons connues.</p></h1>
      <div id='small' class='search'>
     <form class='search' method='post' action='resultat.php'>   
            <input type'text' name='search' class='searchTerm' placeholder='Rechercher un artiste un album ou un son ...'/> <br/>
          <button type='submit' name='send' value='OK' class='searchButton'>
            <i class='fa fa-search'></i>
      </form>
      </div></div>";
   }
   ?>
   
<div class="resultat">
   <div class="resultat_left"><p class="def">Musique</p>


<?php 


for ($i=0; $i<count($obj->response->hits); $i++){
   


$name = $obj->response->hits[$i]->result->artist_names;
$title = $obj->response->hits[$i]->result->title;
$api_path = $obj->response->hits[$i]->result->api_path;
$img = $obj->response->hits[$i]->result->song_art_image_url;
$views = $obj->response->hits[$i]->result->stats->pageviews;
$url = $obj->response->hits[$i]->result->url;




echo '<a href="../result-song/result.php?id_song='.$api_path.'"><div class="result_card"><img src=" '.$img.'" alt="">'; 
echo '<div class="text_card"><h2>'.$title.'</br>';
echo '<span>'.$name.'</span></h2>'; 
echo '<span class="views">'.$views.' <i class="far fa-eye"></i></span></div></div></a>';
   
}

?>
   </div>
   <div class="resultat_right">
<?php 
 if(isset($_POST['send'])){
   $pseudo=$_POST['search'];
   $result_a="https://genius.com/api/search/artists?per_page=12&page=$load&q=$pseudo";
$replace_a = str_replace(' ', '', $result_a);


}


$curl_a = curl_init($result_a);
curl_setopt($curl_a, CURLOPT_URL, $replace_a);
curl_setopt($curl_a, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"Accept: application/json",


);
curl_setopt($curl_a, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_a, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl_a, CURLOPT_SSL_VERIFYPEER, false);

$resp_a = curl_exec($curl_a);
curl_close($curl_a);


if ($err) {
echo "cURL Error #:" . $err;
} else {

file_put_contents('artist.json', $resp_a, );
}


$fichier_a='artist.json';
$tabAlbumJSON_a=file_get_contents($fichier_a);
$obj_a =json_decode($tabAlbumJSON_a);

  
   for ($i=0; $i<count($obj_a->response->sections[$i]->hits[$i]); $i++){
   


   $name_a = $obj_a->response->sections[$i]->hits[$i]->result->name;
   $api_path_a = $obj_a->response->sections[$i]->hits[$i]->result->api_path;
   $img_a = $obj_a->response->sections[$i]->hits[$i]->result->image_url;
   echo '<a href="../result-artist/result.php?id_artist='.$api_path_a.'"><p class="def">Artiste</p><div class="card artist"><img src="'.$img_a.'" alt="">'; 
   echo '<div class="text_card"><h2>'.$name_a.'';
   echo '</h2>'; 
   echo '</div></div></a>';
   
   
   
  
      
   
}

   ?>
<p>Album</p>
<?php 
if(isset($_POST['send'])){
   $pseudo=$_POST['search'];
   $result_b="https://genius.com/api/search/album?sort=popularityper_page=12&q=$pseudo";
$replace_b = str_replace(' ', '', $result_b);


}


$curl_b = curl_init($result_b);
curl_setopt($curl_b, CURLOPT_URL, $replace_b);
curl_setopt($curl_b, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"Accept: application/json",


);
curl_setopt($curl_b, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_b, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl_b, CURLOPT_SSL_VERIFYPEER, false);

$resp_b = curl_exec($curl_b);
curl_close($curl_b);


if ($err) {
echo "cURL Error #:" . $err;
} else {

file_put_contents('album.json', $resp_b, );
}


$fichier_b='album.json';
$tabAlbumJSON_b=file_get_contents($fichier_b);
$obj_b =json_decode($tabAlbumJSON_b);



for ($a=0; $a<4; $a++){
   


   $name_b = $obj_b->response->sections[0]->hits[$a]->result->name;
   $api_path_b = $obj_b->response->sections[0]->hits[$a]->result->api_path;
   $img_b = $obj_b->response->sections[0]->hits[$a]->result->cover_art_thumbnail_url;

   echo '<a href="../result-album/result.php?id_album='.$api_path_b.'"><div class="card artist"><img src="'.$img_b.'" alt="">'; 
   echo '<div class="text_card"><h2>'.$name_b.'';
   echo '</h2>'; 
   echo '</div></div></a>';
      
   }
   ?>
   <?php 
 
   ?>
      </div>
      <div class="more_page">
         <a href="resultat.php?load=<?php       $incr = "";
echo $incr = $incr + $incr++ ?>">test</a>
      </div>
</div>
<?php include('../../php/footer.php');?>
<?php 
if(empty($api_path_b and $api_path_a)){
   echo "<style>.resultat .resultat_right {display:none;}</style>";

}
if(empty($api_path)){
   echo "<style>.resultat .resultat_left{display:none;}</style>";

}
?>

<script>




</script>
</body>
</html>
