<?php 
	session_start();
	require_once "../../classes/connection.php";
	$c=new Connect();
	$connection=$c->connection();
	$sql="SELECT id_user,
				 name_user,
				 last_user
			FROM sl_users";
	$result=mysqli_query($connection,$sql);
 ?>
<table class="table table-hover table-condensed table-bordered" style="text-align: center;">
	<caption><label>Users</label></caption>
	<tr>
		<td>Name</td>
		<td>Last Name</td>
		<td>User</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>

		<td>
			<span class="btn btn-warning btn-xs">
				<span class="glyphicon glyphicon-pencil"></span>
			</span>
		</td>
		<td>
			<span class="btn btn-danger btn-xs">
				<span class="glyphicon glyphicon-remove"></span>
			</span>
		</td>
	</tr>
	</tr>
</table>
