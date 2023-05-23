
<?php require_once '../layouts/header.php' ?>


<?php
	
	$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

	$result = mysqli_query($databaseConnection, "SELECT id_time, urgence FROM time_needed");

	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $result = mysqli_query(
        $databaseConnection, 
        "SELECT 
            title, 
            description, 
            id_time
        FROM ecole
        WHERE id_ecole = '{$_GET['id']}'"
    );

    $ecole = mysqli_fetch_array($result, MYSQLI_ASSOC);

    
    $insertedSucessfully = false;

	if (!empty($_POST)) {

		$insertedSucessfully = mysqli_query(
			$databaseConnection,
			"UPDATE ecole
            SET
                title = '{$_POST['title']}',
                description = '{$_POST['description']}',
                id_time = '{$_POST['id_time']}'                
            WHERE id_ecole = '{$_GET['id']}'"
		);
	}


?>

<h1>Modifier élément</h1>

<a href="../affichage_ecole.php" class="lien">retour à la liste</a>

<?php if ($insertedSucessfully): ?>
    
    <h1 style="text-decoration: underline;">élément bien modifié</h1>



<?php endif; ?>



<form method="POST"> 
    
    <div>
     <label>
         <p>Title</p>
        <input type="text" name="title" value="<?= $ecole['title'] ?>">
     </label>
    </div>
   
    <div>
     <label>
         <p>Description</p>
         <textarea name="description" rows="10" cols="80"><?= $ecole['description'] ?></textarea>
      </label>
    </div>
    
    <div>
        <select name="id_time">
            <?php foreach ($users as $author): ?>
                <option <?= $ecole['id_time'] === $author['id_time'] ?  'selected' : '' ?>
                
                value="<?= $author['id_time'] ?>">

                <?= $author['urgence']?>              	
                
                </option>
            <?php endforeach; ?>
        </select>    
    </div>

    <button style="margin-top: 20px">
        Save element
    </button>

<form>


<?php require_once '../layouts/footer.php' ?>