
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../layouts/index.css"/>
    <title>Todo_list</title>
  </head>

<body>




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
        FROM elements
        WHERE id_elements = '{$_GET['id']}'"
    );

    $elements = mysqli_fetch_array($result, MYSQLI_ASSOC);

    
    $insertedSucessfully = false;

	if (!empty($_POST)) {

		$insertedSucessfully = mysqli_query(
			$databaseConnection,
			"UPDATE elements
            SET
                title = '{$_POST['title']}',
                description = '{$_POST['description']}',
                id_time = '{$_POST['id_time']}'                
            WHERE id_elements = '{$_GET['id']}'"
		);
	}


?>

<h1>Modifier élément</h1>

<a href="../affichage.php" class="lien">retour à la liste</a>

<?php if ($insertedSucessfully): ?>
    
    <h1 style="text-decoration: underline;">élément bien modifié</h1>



<?php endif; ?>



<form method="POST"> 
    
    <div>
     <label>
         <p>Title</p>
        <input type="text" name="title" value="<?= $elements['title'] ?>">
     </label>
    </div>
   
    <div>
     <label>
         <p>Description</p>
         <textarea name="description" rows="10" cols="80"><?= $elements['description'] ?></textarea>
      </label>
    </div>
    
    <div>
        <select name="id_time">
            <?php foreach ($users as $author): ?>
                <option <?= $elements['id_time'] === $author['id_time'] ?  'selected' : '' ?>
                
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

</body>

</html>
