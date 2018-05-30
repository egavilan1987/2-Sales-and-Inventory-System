<?php

	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";
  
  $idItem=$_POST['idItem'];
  
	$obj=new items();
  
	echo $obj->insertItem($idItem);
  
 ?>
