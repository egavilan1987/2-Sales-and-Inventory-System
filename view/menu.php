
<?php require_once "dependencies.php" ?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="init.php"><img class="img-responsive logo img-thumbnail" src="../images/sales.png" alt="" width="150px" height="150px"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">

            <li><a href="init.php"><span class="glyphicon glyphicon-home"></span> Home</a>
            </li>

            
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>  Items Manager <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="categories.php">Categories</a></li>
              <li><a href="items.php">Items</a></li>
            </ul>
          </li>


           <li><a href="users.php"><span class="glyphicon glyphicon-user"></span> Manage Users</a>
            </li>



           <li><a href="clients.php"><span class="glyphicon glyphicon-user"></span> Clients</a>
          </li>
          <li><a href="sales.php"><span class="glyphicon glyphicon-usd"></span> Sale Items</a>
          </li>
          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Users:  <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../process/logout.php"><span class="glyphicon glyphicon-off"></span> Log out</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        


</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').height(200);

    }
    else {
      $('.logo').height(100);
    }
  }
  );
</script>