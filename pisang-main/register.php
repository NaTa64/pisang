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
					<div class="row">
						<!-- <div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" tabindex="1" required="">
							</div>
						</div>

						<div class="col-xs-12 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" tabindex="2" required="">
							</div>
						</div> -->
					</div>

					<div class="form-group">
						<input type="text" name="display_name" id="display_name" class="form-control input-lg" placeholder="Tampilan Nama" tabindex="3" required="">
					</div>

					<div class="form-group">
						<input type="text" name="username" id="username" class="form-control input-lg" placeholder="Username" tabindex="4" required="">
					</div>

					<!-- <div class="form-group">
						<input type="email" name="email_confirmation" id="email" class="form-control input-lg" placeholder="Confirm Email Address" tabindex="5" required="">
					</div> -->

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

					<!-- <div class="row">
						<div class="col-xs-4 col-sm-3 col-md-3">
							<span class="button-checkbox">
								<button type="button" class="btn" data-color="info" tabindex="7" required="">I Agree</button>
								<input type="checkbox" name="t_and_c" id="t_and_c" class="hidden" value="1">
							</span>
						</div>
						<div class="col-xs-8 col-sm-9 col-md-9">
							By clicking <strong class="label label-primary">Register</strong>, you agree to the <a href="#" data-toggle="modal" data-target="#t_and_c_m">Terms and Conditions</a> set out by this site, including our Cookie Use.
						</div>
					</div> -->
					<div class="row">
						<div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="8"></div>
						<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">Login</a></div>
					</div>
				</form>
			</div>
		</div>
		<!-- Modal -->
		<!-- <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						<h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
					</div>
					<div class="modal-body">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique, itaque, modi, aliquam nostrum at sapiente consequuntur natus odio reiciendis perferendis rem nisi tempore possimus ipsa porro delectus quidem dolorem ad.</p>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
					</div>
				</div>/.modal-content
			</div> /.modal-dialog
		</div>/.modal -->

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

	// if ($c_email1 != $c_email2) {
	// 	echo '<p class="h4"><script>alert("E-mail address do not match,Type again!")</script></p>';
	// 	echo "<script>window.open('register.php','_self')</script>";
	// }

	if ($c_pass1 != $c_pass2) {
		echo '<p class="h4"><script>alert("Passwords do not match,Type again!")</script></p>';
		echo "<script>window.open('register.php','_self')</script>";
	}

	// $insert_c = 'insert into customers (cust_ip,cust_fname,cust_lname,cust_dname,cust_email,cust_pass) values ("' . $ip . '","' . $f_name . '","' . $l_name . '","' . $d_name . '","' . $c_email1 . '","' . $c_pass1 . '")';
	$insert_c = 'insert into customers (cust_ip,cust_dname,username,cust_pass) values ("' . $ip . '","' . $d_name . '","' . $c_user . '","' . $c_pass1 . '")';
	if ($conn->query($insert_c) == TRUE) {
		echo '<p class="h4"><script>alert("Account created successfully!")</script></p>';
		echo "<script>window.open('menu.php','_self')</script>";
	} else {
		echo "Error: " . $insert_c . "<br>" . $conn->error;
	}
}

?>