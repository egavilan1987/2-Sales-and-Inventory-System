<?php 
	session_start();
	//print_r($_SESSION['buyTableTemp']);

 ?>
 <h4>Complete sale</h4>
 <h4><strong><div id="nameClientSale"></div></strong></h4>
 <table class="table table-bordered table-hover table-condensed" style="text-align: center;">
 	<caption>
 		<span class="btn btn-success" onclick="createSale()"> Add sale
 			<span class="glyphicon glyphicon-usd"></span>
 		</span>
 	</caption>
 	<tr>
 		<td>Name</td>
 		<td>Description</td>
 		<td>Price</td>
 		<td>Quantity</td>
 		<td>Delete</td>
 	</tr>
 	 	<?php 
 	$total=0;//esta variable tendra el total de la compra en dinero
 	$client=""; //en esta se guarda el nombre del cliente
 		if(isset($_SESSION['buyTableTemp'])):
 			$i=0;
 			foreach (@$_SESSION['buyTableTemp'] as $key) {

 				$d=explode("||", @$key);
 	 ?>

 	<tr>
 		<td><?php echo $d[1] ?></td>
 		<td><?php echo $d[2] ?></td>
 		<td><?php echo $d[3] ?></td>
 		<td><?php echo 1; ?></td>
 		<td>
 			<span class="btn btn-danger btn-xs" onclick="deletePrice('<?php echo $i; ?>')">
 				<span class="glyphicon glyphicon-remove"></span>
 			</span>
 		</td>
 	</tr>

 <?php 
 		$total=$total + $d[3];
 		$i++;
 		$client=$d[4];
 	}
 	endif; 
 ?>

 	<tr>
 		<td>Sale total: <?php echo "$".$total; ?></td>
 	</tr>

 </table>


 <script type="text/javascript">
 	$(document).ready(function(){
 		client="<?php echo @$client ?>";
 		$('#nameClientSale').text("Client's name: " + client);
 	});
 </script>