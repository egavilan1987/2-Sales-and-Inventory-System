<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj= new Users;
	
	echo json_encode($obj->getUserData($_POST['idUser']));
 ?>
