<?php

session_start(); 
	require_once "../../classes/connection.php";
	require_once "../../classes/Clients.php";
  
	$obj= new Clients();
  
	$clientArray=array(
			$_POST['name'],
			$_POST['lastName'],
			$_POST['address'],
			$_POST['email'],
			$_POST['telephone'],
			$_POST['rfc']
				);
	echo $obj->insertClient($clientArray);
	
 ?>
