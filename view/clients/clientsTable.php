<?php 
	require_once "../../classes/connection.php";
			$c=new Connect();
			$conn=$c->connection();
	$sql="SELECT id_client, 
				name_client,
				last_client,
				address_client ,
				email_client,
				telephone_client,
				rfc 
		FROM sl_client";
	$result=mysqli_query($conn,$sql);
 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Clients</label></caption>
	<tr>
		<td>Name</td>
		<td>Last Name</td>
		<td>Address</td>
		<td>Email</td>
		<td>Telephone</td>
	 	<td>RFC</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>

	 	<?php while($row=mysqli_fetch_row($result)): ?>

	 	<tr>
	 		<td><?php echo $row[1]; ?></td>
	 		<td><?php echo $row[2]; ?></td>
	 		<td><?php echo $row[3]; ?></td>
	 		<td><?php echo $row[4]; ?></td>
	 		<td><?php echo $row[5]; ?></td>
	 		<td><?php echo $row[6]; ?></td>
	 		<td>
				<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#openUpdateClientModal" onclick="updateItemData('<?php echo $row[0]; ?>')">
					<span class="glyphicon glyphicon-pencil"></span>
				</span>
			</td>
			<td>
				<span class="btn btn-danger btn-xs" onclick="deleteClient('<?php echo $row[0]; ?>')">
					<span class="glyphicon glyphicon-remove"></span>
				</span>
			</td>
	 	</tr>
	 <?php endwhile; ?>
	 </table>
</div>