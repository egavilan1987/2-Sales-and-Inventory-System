<?php 

	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";


	$obj= new items();


	$idItm=$_POST['idItm'];
					
	echo json_encode($obj->getItemData($idItm));

 ?>
