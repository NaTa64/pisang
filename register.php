<?php
session_start();
require("koneksi/koneksi.php"); // Including the db Connection
?>

<html lang="en">

<head>
	<title>WARUNG ZAYN</title>
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
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="home.php">Home</a></li>
					<li><a href="menu.php">Menu Makanan</a></li>
					<li><a href="#">Riwayat Pemesanan</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="top:7px;">
						<form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
						</form>
					<li><?php
						if (!isset($_SESSION['username'])) {

							echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a>";
						} else {
							echo "<a href='logout.php'><span class='glyphicon glyphicon-user'></span> Logout</a>";
						}
						?></li>
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> keranjang</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
				<form role="form" method="post" action="register.php" enctype="multipart/form-data">
					<h2>Register <!--<small>It's free and always will be.</small>--></h2>

					<div class="form-group">
						<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Tampilan Nama" tabindex="3" required="">
					</div>

					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="4" required="">
					</div>

					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="6" required="">
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-lg" placeholder="Konfirmasi Password" tabindex="7" required="">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="8"></div>
						<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Login</a></div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$ip = getIp();
	// $f_name = $_POST['first_name'];
	// $l_name = $_POST['last_name'];
	$d_name = $_POST['display_name'];
	$c_user = $_POST['username'];
	// $c_email2 = $_POST['email_confirmation'];
	$c_pass1 = $_POST['password'];
	$c_pass2 = $_POST['password_confirmation'];

	$validasi = 'select username from customers where username= ?';
	$stmt = $conn->prepare($validasi);
	$stmt->execute(array($c_user));
	$check_user = $stmt->rowCount();

	if ($check_user > 0) {
		echo '<p class="h4"><script>alert("username sudah digunakan, silahkan ganti!")</script></p>';
		exit();
	}

	if ($c_pass1 != $c_pass2) {
		echo '<p class="h4"><script>alert("Passwords do not match,Type again!")</script></p>';
		echo "<script>window.open('register.php','_self')</script>";
	}

	$insert_c = 'insert into customers (cust_ip,cust_dname,username,cust_pass) values ("' . $ip . '","' . $d_name . '","' . $c_user . '","' . $c_pass1 . '")';
	if ($conn->query($insert_c) == TRUE) {
		echo '<p class="h4"><script>alert("Account created successfully!")</script></p>';
		echo "<script>window.open('menu.php','_self')</script>";
	} else {
		echo "Error: " . $insert_c . "<br>" . $conn->error;
	}
}

?>