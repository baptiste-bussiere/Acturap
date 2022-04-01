

<body>
<?php 

    require 'public/php/head.php';
	require 'public/php/header.php';

   
?>
        <main>

			<div id="tiitre">
				<h1>TOP 100 ALBUMS FR<br>sorties en 2020 et 2021</h1>
			</div>

			<table id="maTable">
				<thead>
					<tr>
						<td>PUNCHLINE</td>
						<td>ARTISTE</td>
						<td>ALBUM</td>
						<td>TITRES</td>
					</tr>
				</thead>
				<tbody>
					<?php 
								$fichier='tableau.json';
								$tabAlbumJSON=file_get_contents($fichier);
								$tabAlbum=json_decode($tabAlbumJSON);
								
								for ($i=0; $i<count($tabAlbum); $i++){
									echo '<tr>'."\n";
									echo '<td>'.$tabAlbum[$i]->content.'</td>'."\n";
									echo '<td>'.$tabAlbum[$i]->author.'</td>'."\n";
									echo '<td>'.$tabAlbum[$i]->album.'</td>'."\n";
									echo '<td>'.$tabAlbum[$i]->title.'</td>'."\n";
									echo '</tr>'."\n";
								}?>
				</tbody>
			</table>

			
			
		</main>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('#maTable').DataTable( {
                    "language": {
                        "url": 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/fr_fr.json'
                    }
                });
            });
        </script>

    


<?php 
    $lienCpt = '../comptage/mon_compteur.txt';

    require 'public/php/footer.php';
   
?>