<?php require_once '../layouts/header.php' ?>

<br>

<a href="../script/accueil.php" class="lien">retour à l'accueil</a>

<h1>Liste des choses à faire:</h1>

<?php
	
	$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

	$result = mysqli_query(
	    $databaseConnection, 
	    'SELECT 
	      elements.id_elements, 
	      title, 
		  elements.id_time,
	      description, 
	      published_at, 
	      time_needed.urgence
	    FROM elements 
	    INNER JOIN time_needed 
	    ON elements.id_time = time_needed.id_time'
    );

  $elements = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<a href="../script/affichage_ecole.php" class="lien">Ecole</a>


<section style="margin-top: 26px; background-color: white;">

	<?php foreach ($elements as $element): ?>
		
		<a href="../script/?id=<?= $element['id_elements'] ?>" style="color:black; text-decoration: none;">	        				        
			
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
					    <a href="../script/update.php/?id=<?= $element['id_elements'] ?>" class="lien" style="margin-right: 20px;">Modifier l'élément</a>
					
					    <a href="../script/delete.php/?id=<?= $element['id_elements'] ?>" class="lien">supprimer l'élément</a>
					</div>

			</article>
		
		</a>

	<?php endforeach ?>

</section>


<?php require_once '../layouts/footer.php' ?>