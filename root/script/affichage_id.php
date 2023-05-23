<?php require_once '../layouts/header.php' ?>

<a href="../accueil.php" class="lien">retour à l'accueil</a>


<br><br>

<?php
	
	$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

	$result = mysqli_query($databaseConnection, "SELECT id_time, urgence FROM time_needed ");

	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    
    $result = mysqli_query(
        $databaseConnection, 
        "SELECT 
            title, 
            description, 
            id_time,
			published_at
        FROM elements
        WHERE id_elements = '{$_GET['id']}'"
    );

    $elements = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>


<section style="margin-top: 26px; background-color: white;">
	
			<article style= "padding: 8px; border: 2px solid #ddd; border-radius: 4px; ">

				<h2> <?= $elements['title'] ?> </h2>
					            
					<p><?= $elements['description']?></p>
					            
					<p>temps : <?= $elements['id_time']?></p>
					            
					<time datetime="<?= $elements['published_at']?>">
					            	
					    <?=date('jS \of F Y \a\t g:i a',strtotime($element['published_at']))?>
					           
					</time>
							
			</a>

</section>

<?php require_once '../layouts/footer.php' ?>