<?php 
	session_start();
	if(isset($_SESSION['user'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Items</title>
	<?php require_once "menu.php"; ?>
	<?php require_once "../classes/connection.php";
	$c=new Connect();
	$connection=$c->connection();
	$sql="SELECT id_category,name_category FROM sl_categories";
						
	$result=mysqli_query($connection,$sql);
	?>
</head>
<body>
		<div class="container">
			<h1>Items</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmItems" enctype="multipart/form-data">
												<label>Category</label>
						<select class="form-control input-sm" id="selectCategory" name="selectCategory">
							<option value="A">Select Category</option>
							<?php while($row=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $row[0] ?>"><?php echo $row[1]; ?></option>
							<?php endwhile; ?>
						</select>
						<label>Name</label>
						<input type="text" class="form-control input-sm" id="name" name="name">
						<label>Description</label>
						<input type="text" class="form-control input-sm" id="description" name="description">
						<label>Quantity</label>
						<input type="text" class="form-control input-sm" id="quantity" name="quantity">
						<label>Price</label>
						<input type="text" class="form-control input-sm" id="price" name="price">
						<label>Image</label>
						<input type="file" id="image" name="image">
						<p></p>
						<span id="btnAddItem" class="btn btn-primary">Save</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="loadItemsTable"></div>
				</div>
			</div>
		</div>
		<!-- Button trigger modal -->
		
		<!-- Modal -->
		<div class="modal fade" id="openUpdateItemModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Item</h4>
					</div>
					<div class="modal-body">
						<form id="frmItemUpdate" enctype="multipart/form-data">
							<input type="text" id="idItem" hidden="" name="idItemidItem">
							<label>Category</label>
							<select class="form-control input-sm" id="selectCategoryUpdate" name="selectCategoryUpdate">
								<option value="A">Select Category</option>
								<?php 
								$sql="SELECT id_category,name_category
								from sl_categories";
								$result=mysqli_query($connection,$sql);
								?>
								<?php while($row=mysqli_fetch_row($result)): ?>
									<option value="<?php echo $row[0] ?>"><?php echo $row[1]; ?></option>
								<?php endwhile; ?>
							</select>
							<label>Name</label>
							<input type="text" class="form-control input-sm" id="nameUpdate" name="nameUpdate">
							<label>Description</label>
							<input type="text" class="form-control input-sm" id="descriptionUpdate" name="descriptionUpdate" >
							<label>Quantity</label>
							<input type="number" class="form-control input-sm" id="quantityUpdate" name="quantityUpdate" min="0">
							<label>Price</label>
							<input type="number" class="form-control input-sm" id="priceUpdate" name="priceUpdate" min="0">
							
						</form>
					</div>
					<div class="modal-footer">
						<button id="updateItemBtn" type="button" class="btn btn-warning" data-dismiss="modal">Save Changes</button>

					</div>
				</div>
			</div>
		</div>
</body>
</html>
	<script type="text/javascript">
		function updateItemData(idItem){
			$.ajax({
				type:"POST",
				data:"idItm=" + idItem,
				url:"../process/items/getItemData.php",
				success:function(r){

					data=jQuery.parseJSON(r);
					$('#idItem').val(data['id_product']);
					$('#selectCategoryUpdate').val(data['id_category']);
					$('#nameUpdate').val(data['name_product']);
					$('#descriptionUpdate').val(data['description_product']);
					$('#quantityUpdate').val(data['stock_product']);
					$('#priceUpdate').val(data['price_product']);
				}
			});
		}
		function deleteItem(idItem){
			alertify.confirm('Do you want to delete this item?', function(){ 
				$.ajax({
					type:"POST",
					data:"idItem=" + idItem,
					url:"../process/items/deleteItem.php",
					success:function(r){
						if(r==1){
							$('#loadItemsTable').load("items/itemsTable.php");
							alertify.success("Item sucessfuly deleted!");
						}else{
							alertify.error("The item could no be deleted");
						}
					}
				});
			}, function(){ 
				alertify.error('Canceled !')
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#updateItemBtn').click(function(){
				data=$('#frmItemUpdate').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/items/updateItem.php",
					success:function(r){
						if(r==1){
							$('#loadItemsTable').load("items/itemsTable.php");
							alertify.success("Item sucessfuly updated!");
						}else{
							alertify.error("Item information could not be updated.");
						}
					}
				});
			});
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#loadItemsTable').load("items/itemsTable.php");
			$('#btnAddItem').click(function(){
					Empties=validateEmptyForm('frmItems');
		
					if(Empties > 0){
						alertify.alert("You must fill all of the fields!");
						return false;
					}
				var formData = new FormData(document.getElementById("frmItems"));
				$.ajax({
					url: "../process/items/insertItem.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success:function(r){
						alert(r);
						if(r == 1){
							$('#frmItems')[0].reset();
							$('#loadItemsTable').load("items/itemsTable.php");
							alertify.success("Item successfully added");
						}else{
							alertify.error("Upload failed");
						}
					}
				});
			});
		});
	</script>


<?php 
	}else{
		header("location:../index.php");
	}
 ?>
