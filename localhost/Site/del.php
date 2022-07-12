<?php
	
	include "db.php";
	$id = $_POST["delet"]; //получаем id товара
	$login = $_COOKIE["Login"];
	$login = strtolower($login);
	echo $ai;
	$sql = "DELETE FROM $login WHERE id=$id";
	$res=mysqli_query($db, $sql);
	if($res==true){
		header("Location:korz.php");
	exit();
	}
	else{
		echo "db error";
	}
	