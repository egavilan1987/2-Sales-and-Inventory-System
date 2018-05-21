<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Categories.php";

	$data=$_POST['idcategory'];


	$obj= new categories();

	echo $obj->deleteCategory($data);


 ?>