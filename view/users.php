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
</body>
</html>
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
