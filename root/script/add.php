<?php require_once '../layouts/header.php' ?>


<?php
	
	$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

  	$result = mysqli_query($databaseConnection, "SELECT id_time, urgence FROM time_needed");

  	$time_needed = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$insertedSucessfully = false;

	if (!empty($_POST["form_1"])) {

		$insertedSucessfully = mysqli_query(
			$databaseConnection,
			"INSERT INTO elements (title, description, id_time)
			VALUES ('{$_POST['title']}', '{$_POST['description']}', '{$_POST['id_time']}')
		");
	}
?>

<a href="../script/accueil.php" class="lien">retour à l'accueil</a>

<h1>Main todolist</h1>

<?php if ($insertedSucessfully): ?>
    
    <h1 style="text-decoration: underline;">élément bien enregistré</h1>


<?php endif; ?>


<form name="form_1" method="POST"> 
    
    <div>
     <label>
         <p>Title</p>
        <input type="text" name="title" >
     </label>
    </div>
    
    <div>
     <label>
         <p>Description</p>
         <textarea name="description" rows="10" cols="80"></textarea>
      </label>
    </div>
    
    <div>
        <select name="id_time">
            <?php foreach ($time_needed as $time): ?>
                <option value="<?= $time['id_time'] ?>"><?= $time['urgence']?>              	
                </option>
            <?php endforeach; ?>
        </select>    
    </div>

    <input type="submit" style="margin-top: 20px" name="form_1" value="Save element" />
    
<form>

<br><br><br>



<?php

	$insertedSucessfully_ecole = false;

	if (!empty($_POST["form_2"])) {

		$insertedSucessfully_ecole = mysqli_query(
			$databaseConnection,
			"INSERT INTO ecole (title, description, id_time)
			VALUES ('{$_POST['title_ecole']}', '{$_POST['description_ecole']}', '{$_POST['id_time_ecole']}')
		");
	}
?>


<h1>Ecole Todolist</h1>

<?php if ($insertedSucessfully_ecole): ?>
    
    <h1 style="text-decoration: underline;">élément bien enregistré</h1>


<?php endif; ?>


<form name="form_2" method="POST"> 
    
    <div>
     <label>
         <p>Title</p>
        <input type="text" name="title_ecole" >
     </label>
    </div>
    
    <div>
     <label>
         <p>Description</p>
         <textarea name="description_ecole" rows="10" cols="80"></textarea>
      </label>
    </div>
    
    <div>
        <select name="id_time_ecole">
            <?php foreach ($time_needed as $time): ?>
                <option value="<?= $time['id_time'] ?>"><?= $time['urgence']?>              	
                </option>
            <?php endforeach; ?>
        </select>    
    </div>

    <input type="submit" style="margin-top: 20px" name="form_2" value="Save element" />
    
<form>


<?php require_once '../layouts/footer.php' ?>