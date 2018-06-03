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

		<!-- Button trigger updated client modal -->


		<!-- Modal -->
		<div class="modal fade" id="openUpdateClientModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update client information</h4>
					</div>
					<div class="modal-body">
						<form id="frmUpdateClient">
							<input type="text" hidden="" id="idClient" name="idClient">
							<label>Name</label>
							<input type="text" class="form-control input-sm" name="nameUpdate" id="nameUpdate">
							<label>Last Name</label>
							<input type="text" class="form-control input-sm" name="lastNameUpdate" id="lastNameUpdate">
							<label>Address</label>
							<input type="text" class="form-control input-sm" name="addressUpdate" id="addressUpdate">
							<label>Email</label>
							<input type="text" class="form-control input-sm" name="emailUpdate" id="emailUpdate">
							<label>Telephone</label>
							<input type="text" class="form-control input-sm" name="telephoneUpdate" id="telephoneUpdate">
							<label>RFC</label>
							<input type="text" class="form-control input-sm" name="rfcUpdate" id="rfcUpdate">

						</form>
					</div>
					<div class="modal-footer">
						<button id="updateClientBtn" type="button" class="btn btn-warning" data-dismiss="modal">Save changes</button>

					</div>
				</div>
			</div>
		</div>
</body>
</html>

	<script type="text/javascript">
		function addClient(idClient){
			$.ajax({
				type:"POST",
				data:"idClient=" + idClient,
				url:"../process/client/getClientData.php",
				success:function(r){
					data=jQuery.parseJSON(r);
					$('#idClient').val(data['id_client']);
					$('#nameUpdate').val(data['name_client']);
					$('#lastNameUpdate').val(data['last_client']);
					$('#addressUpdate').val(data['address_client']);
					$('#emailUpdate').val(data['email_client']);
					$('#telephoneUpdate').val(data['telephone_client']);
					$('#rfcUpdate').val(data['rfc']);
				}
			});
		}			
		function deleteTheClient(idClient){
			alertify.confirm('Do you want to delete the client?', function(){ 
				$.ajax({
					type:"POST",
					data:"idClient=" + idClient,
					url:"../process/client/deleteClient.php",
					success:function(r){
						if(r==1){
							$('#loadClientsTable').load("clients/clientsTable.php");
							alertify.success("Client successfuly deleted!");
						}else{
							alertify.error("Client could not be deleled.");
						}
					}
				});
			}, function(){ 
				alertify.error('Canceled!')
			});
		}
	</script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#updateClientBtn').click(function(){
				data=$('#frmUpdateClient').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/client/updateClient.php",
					success:function(r){
						if(r==1){
							$('#frmUpdateClient')[0].reset();
							$('#loadClientsTable').load("clients/clientsTable.php");
							alertify.success("Client successfuly updated.");
						}else{
							alertify.error("Client information could not be updated.");
						}
					}
				});
			});
		});
	</script>

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
						$('#frmClients')[0].reset();
						$('#loadClientsTable').load("clients/clientsTable.php");
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
