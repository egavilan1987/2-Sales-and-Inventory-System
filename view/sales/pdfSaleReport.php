<?php 
	require_once "../../classes/connection.php";
	require_once "../../classes/Sales.php";

	$objs= new Sales();


	$c=new Connect();
	$connection= $c->connection();	
	$idSale=$_GET['idSale'];

 $sql="SELECT sl.id_sale,
		sl.purchase_date,
		sl.id_client,
		itm.name_product,
        itm.price_product,
        itm.description_product
	from sl_sales  as sl 
	inner join sl_items as itm
	on sl.id_product=itm.id_product
	and sl.id_sale='$idSale'";

$result=mysqli_query($connection,$sql);

	$row=mysqli_fetch_row($result);

	$folio=$row[0];
	$date=$row[1];
	$idClient=$row[2];

 ?>	

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sales Report</title>
 	<link rel="stylesheet" type="text/css" href="../../libraries/bootstrap/css/bootstrap.css">
 </head>
 <body>
 		<img src="../../images/ventas.jpg" width="200" height="200">
 		<br>
 		<table class="table">
 			<tr>
 				<td>date: <?php echo $date; ?></td>
 			</tr>
 			<tr>
 				<td>Folio: <?php echo $folio ?></td>
 			</tr>
 			<tr>
 				<td>client: <?php echo $objs->clientName($idClient); ?></td>
 			</tr>
 		</table>


 		<table class="table">
 			<tr>
 				<td>Product Name</td>
 				<td>Price</td>
 				<td>Quantity</td>
 				<td>Description</td>
 			</tr>

 			<?php 
 			$sql="SELECT sl.id_sale,
						sl.purchase_date,
						sl.id_client,
						itm.name_product,
				        itm.price_product,
				        itm.description_product
					from sl_sales  as sl 
					inner join sl_items as itm
					on sl.id_product=itm.id_product
					and sl.id_sale='$idSale'";

			$result=mysqli_query($connection,$sql);
			$total=0;
			while($row=mysqli_fetch_row($result)):
 			 ?>

 			<tr>
 				<td><?php echo $row[3]; ?></td>
 				<td><?php echo $row[4]; ?></td>
 				<td>1</td>
 				<td><?php echo $row[5]; ?></td>
 			</tr>
 			<?php 
 				$total=$total + $row[4];
 			endwhile;
 			 ?>
 			 <tr>
 			 	<td>Total=  <?php echo "$".$total; ?></td>
 			 </tr>
 		</table>
 </body>
 </html>