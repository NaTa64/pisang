<?php
session_start();
require("koneksi/koneksi.php"); // Including the db Connection
if (!isset($_SESSION['username'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
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
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="menu.php">Food Menu</a></li>
            <li><a href="stores.php">Stores</a></li>
          </ul>
          <ul>
            <ul class="nav navbar-nav navbar-right">
              <li style="top:7px;">
                <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
                  <input class="form-control" type="search" name="user_query" placeholder="Search" aria-label="Search">
                  <button class="btn btn-primary" name="search" type="submit">Search</button>
                </form>
              </li>
              <li><?php
                  if (!isset($_SESSION['username'])) {

                    echo "<a href='login.php'><span class='glyphicon glyphicon-user'></span> Login</a>";
                  } else {
                    echo "<a href='logout.php'><span class='glyphicon glyphicon-user'></span> Logout</a>";
                  }
                  ?></li>
              <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Keranjang</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <?php
        if (isset($_GET['search'])) {

          $search_query = $_GET['user_query'];

          $get_itm = $conn->query("select item_name,harga,stok,item_image from items where item_keywords like '%$search_query%'");

          while ($row = $get_itm->fetch(PDO::FETCH_ASSOC)) {
        ?>


            <div class="col-sm-4">
              <div class="panel panel-primary" style="border-radius:0px;">
                <div class="panel-heading" align="center" style="border-radius:0px;"><b style="font-size:17px;"><?php echo $row['item_name']; ?></b></div>
                <div class="panel-body" align="center" style="height:250px; width:350px; "><?php echo '<img src="' . $row['item_image'] . '"  alt="Image">' ?></div>
                <div class="panel-footer" align="center"><b style="font-size:15px;">Harga : Rp<?php echo $row['harga']; ?></b></div>
                <div class="panel-footer" align="center"><b style="font-size:15px;">Stok : <?php echo $row['stok']; ?></b></div>

                <a href="menu.php?add_cart=$item_id"><button class="btn btn-secondary btn-lg btn-block" style="border-radius:0px;">Tambah ke keranjang</button></a></li>
              </div>
            </div>


        <?php }
        } ?>
      </div>
    </div>

  </body>

  </html>
<?php } ?>