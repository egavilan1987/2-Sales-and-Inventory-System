<?php 
	
	require_once "classes/connection.php";
	$obj= new Connect();
	$connection=$obj->connection();

	$sql="SELECT * from sl_users where email='admin'";
	$result=mysqli_query($connection,$sql);
	$validate=0;
	if(mysqli_num_rows($result) > 0){
		header("location:index.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/css/bootstrap.css">
	<script src="libraries/jquery-3.2.1.min.js"></script>
	<script src="js/functions.js"></script>
</head>
<body>
<br><br><br>
<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-primary">
			  	<div class="panel-heading">
			    	<label class="panel-title">Admin Registration</label>
			 	</div>
			  	<div class="panel-body">
			    	<form id="frmRegister">
                    <fieldset>
                    	<span class="text-danger">* - All fields are required.</span>
                    	<br><br>
						<div class="form-group">
							<label>Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="name" id="name" >
			  			</div>
			  			<div class="form-group">
							<label>Last Name <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="lastName" id="lastName">
			  			</div>
			  			<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input type="text" class="form-control" name="email" id="email">
			  			</div>
			  			<div class="form-group">
							<label>Password <span class="text-danger">*</span></label>
							<input type="password" class="form-control" name="password" id="password">
			  			</div>
			    		<span class="btn btn-lg btn-success btn-block" id="register">Register</span>
			    		<a href="index.php" class="btn btn-lg btn-danger btn-block">Cancel</a>
			    	</fieldset>
			      	</form>
			    </div>
			</div>            	
		</div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#register').click(function(){
		Empties=validateEmptyForm('frmRegister');
			if(Empties > 0){
				alert("You must fill all of the fields!");
				return false;
			}
			data=$('#frmRegister').serialize();
			$.ajax({
				type:"POST",
				data:data,
				url:"process/regLogin/registerUser.php",
				success:function(r){
					if(r==1){
						alert("Successfuly Added!");
					}else{
						alert("You can not access! :(");
					}
				}
			});
		});
	});
</script>