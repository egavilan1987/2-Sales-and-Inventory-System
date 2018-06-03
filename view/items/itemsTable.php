<?php 
	require_once "../../classes/connection.php";
			$c=new Connect();
			$conn=$c->connection();

	$sql="SELECT itm.name_product,
					itm.description_product,
					itm.stock_product,
					itm.price_product,
					img.pathStorage,
					cat.name_category,
					itm.id_product
		  FROM sl_items AS itm 
		  INNER JOIN sl_images AS img
		  ON itm.id_image=img.id_image
		  INNER JOIN sl_categories AS cat
		  ON itm.id_category=cat.id_category";

	$result=mysqli_query($conn,$sql);
 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Items</label></caption>
	<tr>
		<td>Name</td>
		<td>Description</td>
		<td>Quantity</td>
		<td>Price</td>
		<td>Image</td>
		<td>Category</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>

	<?php while($row=mysqli_fetch_row($result)): ?>

	<tr>
		<td><?php echo $row[0]; ?></td>
		<td><?php echo $row[1]; ?></td>
		<td><?php echo $row[2]; ?></td>
		<td><?php echo $row[3]; ?></td>
		<td>
			<?php 
			$imgRow=explode("/", $row[4]) ; 
			$imgruta=$imgRow[1]."/".$imgRow[2]."/".$imgRow[3];
			?>
			<img width="80" height="80" src="<?php echo $imgruta ?>">
		</td>
		<td><?php echo $row[5]; ?></td>
		<td>
			<span  data-toggle="modal" data-target="#openUpdateItemModal" class="btn btn-warning btn-xs" onclick="addItemData('<?php echo $row[6] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="deleteItem('<?php echo $row[6] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>
