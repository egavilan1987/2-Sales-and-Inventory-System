<?php

session_start(); 
	require_once "../../classes/connection.php";
	require_once "../../classes/Clients.php";
  
	$obj= new Clients();

	$clientArray=array(
		$_POST['idClient'],
	    $_POST['nameUpdate'],
	    $_POST['lastNameUpdate'],
	    $_POST['addressUpdate'],
	    $_POST['emailUpdate'],
	    $_POST['telephoneUpdate'],
	    $_POST['rfcUpdate']
			);
    echo $obj->updateClient($clientArray);
 ?>
