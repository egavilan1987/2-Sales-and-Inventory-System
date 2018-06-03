<?php 

	require_once "../../classes/connection.php";
	require_once "../../classes/Items.php";

	$obj = new Items();

$arrayItem=array(
		$_POST['idItem'],
	    $_POST['selectCategoryUpdate'],
	    $_POST['nameUpdate'],
	    $_POST['descriptionUpdate'],
	    $_POST['quantityUpdate'],
	    $_POST['priceUpdate']
			);
    echo $obj->updateItem($arrayItem);
 ?>
