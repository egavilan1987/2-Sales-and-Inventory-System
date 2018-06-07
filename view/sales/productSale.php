<?php 
	require_once "../../classes/connection.php";
			$c=new Connect();
			$connection=$c->connection();
?>


<h4>Sale a product</h4>
<div class="row">
	<div class="col-sm-4">
		<form id="frmProductSale">
			<label>Select Customer</label>
			<select class="form-control input-sm" id="saleClient" name="saleClient">
				<option value="A">Select</option>
				<option value="0">Without client</option>
				<?php
				$sql="SELECT id_client, name_client,last_client 
				FROM sl_clients";
				$result=mysqli_query($connection, $sql);
				while ($client=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $client[0] ?>"><?php echo $client[2]." ".$client[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Product</label>
			<select class="form-control input-sm" id="saleProduct" name="saleProduct">
				<option value="A">Select</option>
				<?php
				$sql="SELECT id_product,
				name_product
				FROM sl_items";
				$result=mysqli_query($connection,$sql);
				while ($product=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $product[0] ?>"><?php echo $product[1] ?></option>
				<?php endwhile; ?>
			</select>
			<label>Description</label>
			<textarea readonly="" id="descriptionSale" name="descriptionSale" class="form-control input-sm"></textarea>
			<label>Quantity</label>
			<input readonly="" type="text" class="form-control input-sm" id="quantitySale" name="quantitySale">
			<label>Price</label>
			<input readonly="" type="text" class="form-control input-sm" id="priceSale" name="priceSale">
			<p></p>
			<span class="btn btn-primary" id="addSaleBtn">Save</span>
			<span class="btn btn-danger" id="clearSaleTableBtn">Clear Sale Table</span>
		</form>
	</div>
	<div class="col-sm-3">
		<div id="imgProduct"></div>
	</div>
	<div class="col-sm-4">
		<div id="SalesTableTempLoad"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#SalesTableTempLoad').load("sales/salesTableTemp.php");
		$('#saleProduct').change(function(){
			$.ajax({
				type:"POST",
				data:"idProduct=" + $('#saleProduct').val(),
				url:"../process/sales/fillProductForm.php",
				success:function(r){
					data=jQuery.parseJSON(r);
					$('#descriptionSale').val(data['description_product']);
					$('#quantitySale').val(data['stock_product']);
					$('#priceSale').val(data['price_product']);
					$('#imgProduct').prepend('<img class="img-thumbnail" id="imgp" src="' + data['pathStorage'] + '" />');
				}
			});
		});
		$('#addSaleBtn').click(function(){

			Empties=validateEmptyForm('frmProductSale');
		
			if(Empties > 0){
				alertify.alert("You must fill all of the fields!");
				return false;
			}

			data=$('#frmProductSale').serialize();
			$.ajax({
				type:"POST",
				data:data,
				url:"../process/sales/addProductTemp.php",
				success:function(r){
				$('#SalesTableTempLoad').load("sales/salesTableTemp.php");
				}
			});
		});
		$('#clearSaleTableBtn').click(function(){
		$.ajax({
			url:"../process/sales/clearTemp.php",
			success:function(r){
				$('#SalesTableTempLoad').load("sales/salesTableTemp.php");
			}
		});
	});
	});
</script>

<script type="text/javascript">
	function deletePrice(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../process/sales/deletePrice.php",
			success:function(r){
				$('#SalesTableTempLoad').load("sales/salesTableTemp.php");
				alertify.success("Product deleted.");
			}
		});
	}
	function crearVenta(){
		$.ajax({
			url:"../procesos/ventas/crearVenta.php",
			success:function(r){
				if(r > 0){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
					$('#frmVentasProductos')[0].reset();
					alertify.alert("Venta creada con exito, consulte la informacion de esta en ventas hechas :D");
				}else if(r==0){
					alertify.alert("No hay lista de venta!!");
				}else{
					alertify.error("No se pudo crear la venta");
				}
			}
		});
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#saleClient').select2();
		$('#saleProduct').select2();
	});
</script>
