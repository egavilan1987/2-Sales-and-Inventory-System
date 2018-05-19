<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";

	$obj= new Users();

	$data=array(
		$_POST['user'],
		$_POST['password']
	);

	

	echo $obj->loginUser($data);

 ?>
