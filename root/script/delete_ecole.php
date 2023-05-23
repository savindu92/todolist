<?php require_once '../layouts/header.php' ?>

<?php

$databaseConnection = mysqli_connect("localhost", "root", "", "todo_list");

$result = mysqli_query($databaseConnection, "SELECT id_time, urgence FROM time_needed");

$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


$SucessfullyDelete = false;


$SucessfullyDelete = mysqli_query(
			
		$databaseConnection,
		"DELETE FROM ecole 
		WHERE id_ecole = '{$_GET['id']}'		
");


if ($SucessfullyDelete){
	header('Location: /todolist/root/script/affichage_ecole.php');
}

?>


<?php require_once '../layouts/footer.php' ?>