<?php 
	session_start();
	if(isset($_SESSION['user'])){
		
 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Clients</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
		<div class="container">
			<h1>Clients</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmClients">
						<label>Name</label>
						<input type="text" class="form-control input-sm" id="name" name="name">
						<label>Last name</label>
						<input type="text" class="form-control input-sm" id="lastName" name="lastName">
						<label>Address</label>
						<input type="text" class="form-control input-sm" id="address" name="address">
						<label>Email</label>
						<input type="text" class="form-control input-sm" id="email" name="email">
						<label>Telephone</label>
						<input type="text" class="form-control input-sm" id="telephone" name="telephone">
						<label>RFC</label>
						<input type="text" class="form-control input-sm" id="rfc" name="rfc">
						<p></p>
						<span class="btn btn-primary" id="insertClientBtn">Save</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="loadClientsTable"></div>
				</div>
			</div>
		</div>
</body>
</html>

	<script type="text/javascript">
		$(document).ready(function(){
			
			$('#loadClientsTable').load("clients/clientsTable.php");

			$('#insertClientBtn').click(function(){

					Empties=validateEmptyForm('frmClients');
		
					if(Empties > 0){
						alertify.alert("You must fill all of the fields!");
						return false;
					}
				data=$('#frmClients').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/client/insertClient.php",
					success:function(r){
						if(r==1){
						alertify.success("Client successfuly added.");
				}else{
						alertify.error("Could not add Client.");
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
