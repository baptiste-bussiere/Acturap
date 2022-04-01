<?php require('public/php/head.php');?>
<?php require('/public/php/header.php');?>
   




                           
 
<main>
        <div class='main_left'>
            
        <div id='rg_embed_link_<?php echo $id_album?>' class='rg_embed_link' data-song-id='<?php echo $id_album?>'></div> <script crossorigin src='//genius.com/songs/<?php echo $id_album?>/embed.js'></script>
        </div>
        <div class='main_right'>
            <div class='player'><iframe width='560' height='315' src='<?php echo $yt_link?>' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
            <div class='main_tracklist trinity'>
                <div class='track'>
                    <ul>
                        <li>
                            
                        <?php echo $tracklist?>

                        </li>
                    </ul>
                </div>
                </div>
              
                <div class='main_streaming'>
                <div class='stream'>
                    <h1>Retrouver <?php echo $album_name ?> sur :</h1>
                </div>
                <div class='stream'>
                    <a href='{$spotify_link}'><i id='spotify' class='fab fa-spotify'></i></a>
                </div>
                <div class='stream'>
                    <a href='{$deezer_link}'>
                        <i id='deezer' class='fab fa-deezer'>
                            </i></a>
                </div>
                <div class='stream'><a href='<?php echo $apple_link?>'><i id='apple' class='fab fa-itunes-note'></i></a> </div>
                <div class='stream'><a href='<?php echo $yt_music_link?>'><i id='youtube' class='fas fa-play-circle'></i></a> </div>
            </div>
            </div> 
        
        </div>
       
</div>
    
    <div class='suggestion'>
        <div class='suggestion_title'>
            <h1>Vous aimerez aussi :</h1>
        </div>
        <div class='main_suggestion'>

        <a href='<?php echo $sug4?>.php'>
            <div class='suggestion_card trinity'>
                <h1>LAYLOW</h1>
                <span><?php echo $sug1?></span>
            </div>
            </a>
            <a href='<?php echo $sug4?>.php'>
            <div class='suggestion_card trinity'>

                <h1>LAYLOW</h1>
                <span><?php echo $sug2?></span>
            </div>
            </a>
            <a href='<?php echo $sug3?>.php'>
            <div class='suggestion_card trinity'>
                <h1>LAYLOW</h1>
                <span><?php echo $sug3?></span>
            </div>
            </a>
            <a href='<?php echo $sug4?>.php'>
            <div class='suggestion_card trinity'>
                <h1>LAYLOW</h1>
                <span><?php echo $sug4?></span>
            </div>
                </a>

            </div>
 </main>    ";

          <script>

        const swup = new Swup(); </script>
     
    <?php require('/public/php/footer.php');?>



