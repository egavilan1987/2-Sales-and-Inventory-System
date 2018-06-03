<?php

session_start(); 
	require_once "../../classes/connection.php";
	require_once "../../classes/Clients.php";
  
	$obj= new Clients();

	echo $obj->deleteClient($_POST['idClient']);
 ?>
