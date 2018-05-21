<?php

	$imageName=$_FILES['image']['name'];

	$data=array(
		$_POST['selectCategory'],
		$_POST['name'],
		$_POST['description'],
		$_POST['quantity'],
		$_POST['price'],
		$imageName

	);
	print_r($data);

?>