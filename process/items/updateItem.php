<?php 

	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";

	$obj= new items();

$arrayItem=array(
		$_POST['idArticulo'],
	    $_POST['categoriaSelectU'],
	    $_POST['nombreU'],
	    $_POST['descripcionU'],
	    $_POST['cantidadU'],
	    $_POST['precioU']
			);
    echo $obj->updateItem($arrayItem);
 ?>
