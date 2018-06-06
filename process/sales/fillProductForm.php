<?php 
	
	require_once "../../classes/connection.php";
	require_once "../../classes/Sales.php";

	$obj= new Sales();

	echo json_encode($obj->getProductData($_POST['idProduct']))

 ?>