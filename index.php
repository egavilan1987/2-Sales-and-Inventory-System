<?php 
	
	require_once "classes/connection.php";
	$obj= new Connect();
	$connection=$obj->connection();

	$sql="SELECT * from sl_users where email='admin'";
	$result=mysqli_query($connection,$sql);
	$validate=0;
	if(mysqli_num_rows($result) > 0){
		$validate=1;
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
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
			    	<label class="panel-title">Login</label>
			 	</div>
			 	<br>
			 	<p align="middle">
					<img class="center" src="images/login.png"  height="120" class="center" >
				</p>
			  	<div class="panel-body">
			    	<form id="frmLogin">
                    <fieldset>
			    	  	<div class="form-group">
			    		    <input class="form-control" placeholder="Username" name="user" type="text" id="user">
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="" id="password">
			    		</div>
			    		<span class="btn btn-lg btn-primary btn-block" id="enter">Login</span>
			    	</fieldset>
			      	</form>
                      <hr/>
                    <?php  if(!$validate): ?>
                    <a href="register.php" class="text-center new-account">Create an account </a>
                    <?php endif; ?>
			    </div>
			</div>            	
		</div>
	</div>

</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#enter').click(function(){

		Empties=validateEmptyForm('frmLogin');

			if(Empties > 0){
				alert("You must fill all of the fields!");
				return false;
			}

		data=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:data,
			url:"process/regLogin/login.php",
			success:function(r){

				if(r==1){
					window.location="view/init.php";
				}else{
					alert("You can not access! :(");
				}
			}
		});
	});
	});
</script>