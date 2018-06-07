<?php 
	session_start();
	require_once "../../classes/connection.php";

			$c=new Connect();
			$connection=$c->connection();

	$idClient=$_POST['saleClient'];
	$idProduct=$_POST['saleProduct'];
	$description=$_POST['descriptionSale'];
	$quantity=$_POST['quantitySale'];
	$price=$_POST['priceSale'];

	$sql="SELECT name_client, last_client 
			from sl_clients 
			where id_client='$idClient'";
	$result=mysqli_query($connection,$sql);

	$c=mysqli_fetch_row($result);

	$nClient=$c[1]." ".$c[0];

	$sql="SELECT name_product 
			from sl_items 
			where id_product='$idProduct'";
	$result=mysqli_query($connection,$sql);

	$productName=mysqli_fetch_row($result)[0];

	$item=$idProduct."||".
				$productName."||".
				$description."||".
				$price."||".
				$nClient."||".
				$idClient;

	$_SESSION['buyTableTemp'][]=$item;

	print_r($_SESSION['buyTableTemp']);

 ?>