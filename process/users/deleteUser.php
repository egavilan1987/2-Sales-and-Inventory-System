<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj= new users;

	echo $obj->deleteUser($_POST['idUser']);
 ?>
