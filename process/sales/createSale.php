<?php 
	session_start();
	require_once "../../classes/connection.php";
	require_once "../../classes/Sales.php";
	
	$obj= new Sales();


	if(count($_SESSION['buyTableTemp'])==0){
		echo 0;
	}else{
		$result=$obj->createSale();
		unset($_SESSION['buyTableTemp']);
		echo 1;
	}
 ?>