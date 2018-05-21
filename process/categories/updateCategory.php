<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Categories.php";

	$data=array(
		$_POST['idCategory'],
		$_POST['categoryUpdate']
			);

	$obj= new categories();

	echo $obj->updateCategory($data);


 ?>