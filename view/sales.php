<?php 
	session_start();
	if(isset($_SESSION['user'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>sales</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
	<div class="container">
		 <h1>Product Sales</h1>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<span class="btn btn-default" id="btnProductSales">Sale Products</span>
		 		<span class="btn btn-default" id="btnSalesDone">Sales Done</span>
		 	</div>
		 </div>
		 <div class="row">
		 	<div class="col-sm-12">
		 		<div id="productSale"></div>
		 		<div id="salesDone"></div>
		 	</div>
		 </div>
	</div>

</body>
</html>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#btnProductSales').click(function(){
				hideServiceSection();
				$('#productSale').load('sales/productSale.php');
				$('#productSale').show();
			});
			$('#btnSalesDone').click(function(){
				hideServiceSection();
				$('#salesDone').load('sales/salesAndReports.php');
				$('#salesDone').show();
			});
		});

		function hideServiceSection(){
			$('#productSale').hide();
			$('#salesDone').hide();
		}

	</script>



<?php 
	}else{
		header("location:../index.php");
	}
 ?>