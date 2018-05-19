<?php 
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";
	$obj= new Users();
	$pass=sha1($_POST['password']);
	$data=array(
		$_POST['name'],
		$_POST['lastName'],
		$_POST['email'],
		$pass
				);
	echo $obj->userRegister($data);
 ?>