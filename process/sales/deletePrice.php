<?php 

	session_start();
	$index=$_POST['ind'];
	unset($_SESSION['buyTableTemp'][$index]);
	$data=array_values($_SESSION['buyTableTemp']);
	unset($_SESSION['buyTableTemp']);
	$_SESSION['buyTableTemp']=$data;

 ?>