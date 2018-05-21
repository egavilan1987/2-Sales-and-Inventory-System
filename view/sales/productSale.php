<h4>Sale an item</h4>
<div class="row">
	<div class="col-sm-4">
		<form id="frmProductSale">
			<label>Customers</label>
			<select class="form-control input-sm" id="saleClient" name="saleClient">
				<option value="A">Select</option>
			</select>		
			<label>Products</label>
			<select class="form-control input-sm" id="saleProduct" name="saleProduct">
				<option value="A">Select</option>
			</select>
			<label>Descripction</label>
			<textarea readonly="" id="descripctionSale" name="descripctionSale" class="form-control input-sm"></textarea>
			<label>Quantity</label>
			<input readonly="" type="text" class="form-control input-sm" id="quantitySale" name="quantitySale">
			<label>Price</label>
			<input readonly="" type="text" class="form-control input-sm" id="priceSale" name="priceSale">
			<p></p>
			<span class="btn btn-primary" id="btnAddSale">Add</span>
			<span class="btn btn-danger" id="btnCancelSale">Cancel Sale</span>
		</form>
	</div>
	<div class="col-sm-3">
		<div id="imgProduct"></div>
	</div>
	<div class="col-sm-4">
		<div id="loadTempSalesTable"></div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		$('#saleClient').select2();
		$('#saleProduct').select2();

	});
</script>