<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" type="text/css" href="libraries/bootstrap/css/bootstrap.css">
	<script src="libraries/jquery-3.2.1.min.js"></script>
	<script src="js/functions.js"></script>
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
    <div class="row">
    	<div class="col-md-4 col-md-offset-4">
    		<div class="panel panel-default">
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
			    		    <input class="form-control" placeholder="Username" name="username" type="text" required autofocus>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
			    		</div>
			    		<input href="register.php" class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
                      <hr/>
                    <a href="register.php" class="text-center new-account">Create an account </a>
			    </div>
			</div>            	
		</div>
	</div>

</div>

</body>
</html>
