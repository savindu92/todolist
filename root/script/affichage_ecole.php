<?php require_once '../layouts/header.php' ?>

<br>

<a href="../script/affichage.php" class="lien">retour</a>

<h1>Liste des choses à faire pour l'école:</h1>

<?php require_once '../layouts/header.php' ?>

<br>


<?php
	
	$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

	$result = mysqli_query(
	    $databaseConnection, 
	    'SELECT 
	      ecole.id_ecole, 
	      title, 
		  ecole.id_time,
	      description, 
	      published_at, 
	      time_needed.urgence
	    FROM ecole
	    INNER JOIN time_needed 
	    ON ecole.id_time = time_needed.id_time'
    );

  $elements = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<section style="margin-top: 26px; background-color: white;">

	<?php foreach ($elements as $element): ?>
		
		<a href="../script/?id=<?= $element['id_ecole'] ?>" style="color:black; text-decoration: none;">	        				        
			
			<article style= "padding: 8px; border: 2px solid #ddd; border-radius: 4px; ">

				<h2> <?= $element['title'] ?> </h2>
					            
					<p><?= $element['description']?></p>
					            
					<p>temps: <?= $element['urgence']?></p>
					
					<p>date de création:
						
						<time datetime="<?= $element['published_at']?>">
					            	
							<?=date('jS \of F Y \a\t g:i a',strtotime($element['published_at']))?>
										   
						</time>

				    </p>

					<p></p>
					<div>
					    <a href="../script/update_ecole.php/?id=<?= $element['id_ecole'] ?>" class="lien" style="margin-right: 20px;">Modifier l'élément</a>
					
					    <a href="../script/delete_ecole.php/?id=<?= $element['id_ecole'] ?>" class="lien">supprimer l'élément</a>
					</div>

			</article>
		
		</a>

	<?php endforeach ?>

</section>


<?php require_once '../layouts/footer.php' ?>