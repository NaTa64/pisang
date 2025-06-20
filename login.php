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
  <script>
    $().alert()
    $(".alert").alert()
  </script>
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
          <li><a href="home.php">Home</a></li>
          <li><a href="menu.php">Menu Makanan</a></li>
          <li><a href="history.php">Riwayat Pemesanan</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="top:7px;">
            <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
            </form>
          <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container" align="center">
    <form class="form-signin" method="post" action="" style="width:450px; height:450px;">
      <h2 class="form-signin-heading">Login</h2><br>

      <!-- <label for="inputUsername" class="sr-only">Username</label> -->
      <input type="text" id="InputUsername" name="username" class="form-control" placeholder="Username" required="" autofocus=""><br>

      <!-- <label for="inputPassword" class="sr-only">Password</label> -->
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">

      <hr class="colorgraph">

      <button class="btn btn-primary btn-block" type="submit">Login</button>
      <p class="h4">Belum punya akun? <a href="register.php">Buat Akun</a></p>
    </form>

  </div> <!-- /container -->

</body>

</html>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $c_user = $_POST['username'];
  $c_pass = $_POST['password'];

  $sel_c = $conn->prepare('SELECT * FROM customers WHERE username = :username AND cust_pass = :password');
  $sel_c->bindParam(':username', $c_user);
  $sel_c->bindParam(':password', $c_pass);
  $sel_c->execute();

  while ($row = $sel_c->fetch(PDO::FETCH_ASSOC)) {
    $cust_id = $row['cust_id'];
    $name = $row['cust_dname'];
  }

  $check_customer = $sel_c->rowCount();
  if ($check_customer == 0) {
    echo "<script>alert('Password atau Username salah, Coba lagi!')</script>";
    exit();
  }

  $ip = getIp();

  $sel_cart = $conn->query('select * from cart where ip_add="' . $ip . '"');
  $row = $sel_cart->fetch(PDO::FETCH_ASSOC);
  $check_cart = $sel_cart->rowCount();

  if ($check_customer > 0 and $check_cart == 0) {

    $_SESSION['cust_id'] = $cust_id;
    $_SESSION['cust_name'] = $name;
    $_SESSION['username'] = $c_user;

    echo "<script>window.open('menu.php','_self')</script>";
  } else {
    $_SESSION['cust_id'] = $cust_id;
    $_SESSION['cust_name'] = $name;
    $_SESSION['username'] = $c_user;

    echo "<script>window.open('cart.php','_self')</script>";
  }
}


?>