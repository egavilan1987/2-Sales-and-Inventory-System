<?php 
session_start();
if(isset($_SESSION['user'])){

	?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>Categories</title>
		<?php require_once "menu.php"; ?>
	</head>
	<body>

		<div class="container">
			<h1>Categories</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCategories">
						<label>Category</label>
						<input type="text" class="form-control input-sm" name="category" id="category">
						<p></p>
						<span class="btn btn-primary" id="btnAddCategories">Add</span>
					</form>
				</div>
				<div class="col-sm-6">
					<div id="loadCategoriesTable"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->

		<!-- Modal -->
		<div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update Category</h4>
					</div>
					<div class="modal-body">
						<form id="frmCategoryUpdate">
							<input type="text" hidden="" id="idCategory" name="idCategory">
							<label>Category</label>
							<input type="text" id="categoryUpdate" name="categoryUpdate" class="form-control input-sm">
						</form>


					</div>
					<div class="modal-footer">
						<button type="button" id="btnUpdateCategory" class="btn btn-warning" data-dismiss="modal">Update Changes</button>

					</div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#loadCategoriesTable').load("Categories/categoriesTable.php");

			$('#btnAddCategories').click(function(){

				Empties=validateEmptyForm('frmCategories');

				if(Empties > 0){
					alertify.alert("You must fill all of the fields!");
					return false;
				}

				data=$('#frmCategories').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/categories/AddCategories.php",
					success:function(r){
						if(r==1){
						//clear the form
						$('#frmCategories')[0].reset();
						$('#loadCategoriesTable').load("Categories/categoriesTable.php");
						alertify.success("Categories successfuly added.");
					}else{
						alertify.error("Could not add Category.");
					}
				}
			});
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnUpdateCategory').click(function(){

				datos=$('#frmCategoryUpdate').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"../process/categories/updateCategory.php",
					success:function(r){
						if(r==1){
							$('#loadCategoriesTable').load("categories/categoriesTable.php");
							alertify.success("Category updated!");
						}else{
							alertify.error("Could not update the category");
						}
					}
				});
			});
		});
	</script>
	<script type="text/javascript">
		function addData(idCategory,category){
			$('#idCategory').val(idCategory);
			$('#categoryUpdate').val(category);
		}
		function deleteCategory(idcategory){
			alertify.confirm('Do you want to delete the category?', function(){ 
				$.ajax({
					type:"POST",
					data:"idcategory=" + idcategory,
					url:"../process/categories/deleteCategory.php",
					success:function(r){
						if(r==1){
							$('#loadCategoriesTable').load("categories/categoriesTable.php");
							alertify.success("Category successfuly deleted!");
						}else{
							alertify.error("Category could not be deleted");
						}
					}
				});
			}, function(){ 
				alertify.error('Canceled!')
			});
		}
	</script>
	<?php 
}else{
	header("location:../index.php");
}
?>