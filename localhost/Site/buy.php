<?php
	
	include "db.php";
	$id = $_POST['buy']; //получаем id товара
	$login = $_COOKIE["Login"];
	$login = strtolower($login);
	echo $id; echo $login;
	
	
	$vse = mysqli_query($db, "SELECT * FROM $login");
	foreach($vse as $s){
		$ID = $s['id'];		
		$sql = "UPDATE product SET Amount = Amount- 1 WHERE id=$ID";
		mysqli_query($db, $sql);
	}
	$sql = "TRUNCATE $login"; //очистил таблицу (корзину)
	$result = mysqli_query($db, $sql);
	if(!$result == true){
		echo "Not work db!";
	}
	
	
	header("Location: korz.php");
	exit();
?>
	