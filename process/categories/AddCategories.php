<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Categories.php";
	$currentDate=date("Y-m-d");
	$iduser=$_SESSION['iduser'];
	$category=$_POST['category'];

	$data=array(
		$iduser,
		$category,
		$currentDate
				);

	$obj= new categories();

	echo $obj->addCategory($data);


 ?>