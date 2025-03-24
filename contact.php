<?php
	require ("koneksi/koneksi.php");// Including the db Connection
?>

<html lang="en">
<head>
  <title>E-Commerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head>
<body>
   
<nav class="navbar navbar-inverse" style="border-radius:0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="home.php">Home</a></li>
        <li><a href="menu.php">Menu Makanan</a></li>
        <li class="active"><a href="contact.php">Kontak</a></li>
        <li><a href="#">Riwayat Pemesanan</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><?php
	if(!isset($_SESSION['username'])){
		
		echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a>";
	}
	else
	{
		echo "<a href='logout.php'><span class='glyphicon glyphicon-user'></span> Logout</a>";
	}
	?></li>
        <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html>
