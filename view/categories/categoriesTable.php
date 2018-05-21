<?php 
	session_start();
	require_once "../../classes/connection.php";
	$c=new Connect();
	$connection=$c->connection();

	$sql="SELECT id_category,
				 name_category 
			FROM sl_categories";
	$result=mysqli_query($connection,$sql);

 ?>

<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Categories</label></caption>
	<tr>
		<td>Categories</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php
	while ($show=mysqli_fetch_row($result)):
	?>
	<tr>
		<td><?php echo $show[1] ?></td>
		<td> 
			<span class="btn btn-warning btn-xs" data-toggle="modal" data-target="#updateCategory" onclick="addData('<?php echo $show[0] ?>','<?php echo $show[1] ?>')">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs" onclick="deleteCategory('<?php echo $show[0] ?>')">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
<?php endwhile; ?>
</table>