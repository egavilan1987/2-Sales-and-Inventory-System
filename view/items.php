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
							<?php while($show=mysqli_fetch_row($result)): ?>
								<option value="<?php echo $show[0] ?>"><?php echo $show[1]; ?></option>
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
						<span id="btnAddItem" class="btn btn-primary">Add</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="loadItemsTable"></div>
				</div>
			</div>
		</div>
</body>
</html>

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