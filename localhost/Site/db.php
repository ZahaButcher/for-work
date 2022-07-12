<?php


$db = mysqli_connect("localhost", "root", "", "zakhar") ;
if (!$db){ echo "error!";}

function get_inf(){
	global $db;
	$singles = $db->query("SELECT * FROM product");
	return $singles;
}

function get_users(){
	global $db;
	$singles = $db->query("SELECT * FROM users");
	return $singles;
}