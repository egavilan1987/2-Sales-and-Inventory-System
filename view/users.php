<?php 
session_start();
if(isset($_SESSION['user']) and $_SESSION['user']=='admin'){
	?>


<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
	<?php require_once "menu.php"; ?>
</head>
<body>
		<div class="container">
			<h1>Users Manager</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmRegister">
						<label>Name</label>
						<input type="text" class="form-control input-sm" name="name" id="name">
						<label>Last name</label>
						<input type="text" class="form-control input-sm" name="lastName" id="lastName">
						<label>User</label>
						<input type="text" class="form-control input-sm" name="user" id="user">
						<label>Password</label>
						<input type="text" class="form-control input-sm" name="password" id="password">
						<p></p>
						<span class="btn btn-primary" id="register">Register</span>

					</form>
				</div>
				<div class="col-sm-7">
					<div id="loadUsersTable"></div>
				</div>
			</div>
		</div>

		<!-- Button trigger modal -->


		<!-- Modal -->
		<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Update User</h4>
					</div>
					<div class="modal-body">
						<form id="frmUpdateUser">
							<input type="text" hidden="" id="idUser" name="idUser">
							<label>Name</label>
							<input type="text" class="form-control input-sm" name="nameUpdate" id="nameUpdate">
							<label>Last Name</label>
							<input type="text" class="form-control input-sm" name="lastNameUpdate" id="lastNameUpdate">
							<label>User</label>
							<input type="text" class="form-control input-sm" name="userUpdate" id="userUpdate">

						</form>
					</div>
					<div class="modal-footer">
						<button id="updateUserBtn" type="button" class="btn btn-warning" data-dismiss="modal">Save changes</button>

					</div>
				</div>
			</div>
		</div>

</body>
</html>


	<script type="text/javascript">
		function updateUser(idUser){
			$.ajax({
				type:"POST",
				data:"idUser=" + idUser,
				url:"../process/users/getUserData.php",
				success:function(r){
					data=jQuery.parseJSON(r);
					$('#idUser').val(data['idUser']);
					$('#nameUpdate').val(data['name']);
					$('#lastNameUpdate').val(data['lastName']);
					$('#userUpdate').val(data['email']);
				}
			});
		}
		function deleteUser(idUser){
			alertify.confirm('¿Desea eliminar este usuario?', function(){ 
				$.ajax({
					type:"POST",
					data:"idusuario=" + idusuario,
					url:"../procesos/usuarios/eliminarUsuario.php",
					success:function(r){
						if(r==1){
							$('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
							alertify.success("Eliminado con exito!!");
						}else{
							alertify.error("No se pudo eliminar :(");
						}
					}
				});
			}, function(){ 
				alertify.error('Cancelo !')
			});
		}
	</script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#loadUsersTable').load("users/usersTable.php");

			$('#register').click(function(){

					Empties=validateEmptyForm('frmRegister');
		
					if(Empties > 0){
						alertify.alert("You must fill all of the fields!");
						return false;
					}
				data=$('#frmRegister').serialize();
				$.ajax({
					type:"POST",
					data:data,
					url:"../process/regLogin/registerUser.php",
					success:function(r){
					if(r==1){
						$('#frmRegister')[0].reset();
						$('#loadUsersTable').load("users/usersTable.php");
						alertify.success("Category successfuly added.");
				}else{
						alertify.error("Could not add Category.");
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
