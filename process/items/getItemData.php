<?php 

	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";


	$obj= new items();


	$idItem=$_POST['idItem'];
					
	echo json_encode($obj->insertItem($idItem));

 ?>