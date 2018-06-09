<?php 

	require_once "../../classes/connection.php";
	require_once "../../classes/Sales.php";

			$c=new Connect();
			$connection=$c->connection();

	$obj= new Sales();

	$sql="SELECT id_sale,
				purchase_date,
				id_client
			from sl_sales group by id_sale";
	$result=mysqli_query($connection,$sql); 
	?>

<h4>Sales and Reports</h4>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="table-responsive">
			<table class="table table-horow table-condensed table-bordered" style="text-align: center;">
				<caption><label>Sales :)</label></caption>
				<tr>
					<td>Folio</td>
					<td>Date</td>
					<td>Client</td>
					<td>Sale Total</td>
				</tr>
		<?php while($row=mysqli_fetch_row($result)): ?>
				<tr>
					<td><?php echo $row[0] ?></td>
					<td><?php echo $row[1] ?></td>
					<td>
						<?php
							if($obj->clientName($row[2])==" "){
								echo "S/C";
							}else{
								echo $obj->clientName($row[2]);
							}
						 ?>
					</td>
					<td>
						<?php 
							echo "$".$obj->getTotal($row[0]);
						 ?>
					</td>
				</tr>
		<?php endwhile; ?>
			</table>
		</div>
	</div>
	<div class="col-sm-1"></div>
</div>