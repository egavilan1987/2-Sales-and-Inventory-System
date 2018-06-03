<?php

	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";
  
  $idItem=$_POST['idItem'];
  
	$obj=new Items();
  
	echo $obj->deleteItem($idItem);
  
 ?>
