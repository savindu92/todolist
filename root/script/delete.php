<?php require_once '../layouts/header.php' ?>

<?php

$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

$result = mysqli_query($databaseConnection, "SELECT id_time, urgence FROM time_needed");

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


$SucessfullyDelete = false;


$SucessfullyDelete = mysqli_query(
			
		$databaseConnection,
		"DELETE FROM elements 
		WHERE id_elements = '{$_GET['id']}'		
");


if ($SucessfullyDelete){
	header('Location: /project/todolist/script/affichage.php');
}

?>


<?php require_once '../layouts/footer.php' ?>