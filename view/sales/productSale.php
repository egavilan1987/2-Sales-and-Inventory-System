<?php 
require_once "../../clases/connection.php";
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
			<textarea readonly="" id="descripcionV" name="descriptionSale" class="form-control input-sm"></textarea>
			<label>Quantity</label>
			<input readonly="" type="text" class="form-control input-sm" id="quantitySale" name="quantitySale">
			<label>Price</label>
			<input readonly="" type="text" class="form-control input-sm" id="priceSale" name="priceSale">
			<p></p>
			<span class="btn btn-primary" id="addSaleBtn">Save</span>
			<span class="btn btn-danger" id="btnVaciarVentas">Vaciar ventas</span>
		</form>
	</div>
	<div class="col-sm-3">
		<div id="imgProduct"></div>
	</div>
	<div class="col-sm-4">
		<div id="tablaVentasTempLoad"></div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
		$('#productoVenta').change(function(){
			$.ajax({
				type:"POST",
				data:"idproducto=" + $('#productoVenta').val(),
				url:"../procesos/ventas/llenarFormProducto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#descripcionV').val(dato['descripcion']);
					$('#cantidadV').val(dato['cantidad']);
					$('#precioV').val(dato['precio']);
					$('#imgProducto').prepend('<img class="img-thumbnail" id="imgp" src="' + dato['ruta'] + '" />');
				}
			});
		});
		$('#addSaleBtn').click(function(){
			vacios=validarFormVacio('frmProductSale');
			if(vacios > 0){
				alertify.alert("Debes llenar todos los campos!!");
				return false;
			}
			datos=$('#frmProductSale').serialize();
			$.ajax({
				type:"POST",
				data:datos,
				url:"../procesos/ventas/agregaProductoTemp.php",
				success:function(r){
					$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				}
			});
		});
		$('#btnVaciarVentas').click(function(){
		$.ajax({
			url:"../procesos/ventas/vaciarTemp.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
			}
		});
	});
	});
</script>

<script type="text/javascript">
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"../procesos/ventas/quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("ventas/tablaVentasTemp.php");
				alertify.success("Se quito el producto :D");
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
		$('#clienteVenta').select2();
		$('#productoVenta').select2();
	});
</script>
