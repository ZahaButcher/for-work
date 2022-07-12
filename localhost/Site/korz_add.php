<?php
	
	include "db.php";
	$id = $_POST['basket']; //получаем id товара
	$login = $_COOKIE["Login"];
	$login = strtolower($login);
	echo $id; echo $login;
	
	if(!empty($login)){
		
	
		$sql = "INSERT INTO {$login} (id,Name, Img, Price) SELECT id, Name, Img, Price FROM product WHERE id='$id'";
		
		$result = mysqli_query($db, $sql);
		if(!$result == true){
			echo "Not work db!";
		}
	}else{
		header("Location: reg.php");
	exit();
	}
	
	
	header("Location: index.php");
	exit();
?>
	