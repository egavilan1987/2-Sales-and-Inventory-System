<?php 
	require_once "../../classes/connection.php";
	require_once "../../classes/Users.php";
	$obj= new Users();
	$pass=sha1($_POST['password']);
	$datos=array(
		$_POST['name_user'],
		$_POST['last_user'],
		$_POST['email_user'],
		$pass
				);
	echo $obj->usersRegister($datos);
 ?>