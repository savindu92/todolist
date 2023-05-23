<?php require_once '../layouts/header.php' ?>

<h1>Ma Todo list</h1>

<a href="../script/add.php" class="lien">ajouter un élément à ma Todo list</a>
	
<br><br>

<a href="../script/affichage.php" class="lien">Afficher ma Todo list</a>

<?php
	
	$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

	$result = mysqli_query(
	    $databaseConnection, 
	    'SELECT 
	      elements.id_elements, 
	      title	       
	    FROM elements'
    );

  $elements = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<br><br>

<h2 style="color: honeydew;">Afficher un élément en particulier:</h2>

<?php foreach ($elements as $element): ?>		
	<a href="../script/affichage_id.php/?id=<?= $element['id_elements'] ?>" class="lien" style="">	        				     			
		
		<h2>-<?= $element['title'] ?> </h2>
			
	</a>
<?php endforeach ?>


<?php require_once '../layouts/footer.php' ?>