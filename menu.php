<?php
session_start();

require("koneksi/koneksi.php"); // Including the db Connection

if (!isset($_SESSION['username'])) {
  echo "<script>window.open('login.php','_self')</script>";
} else {
?>

  <html lang="en">

  <head>
    <title>E-Commerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
      $(function() {
        $('[data-toggle="tooltip"]').tooltip()
      })
    </script>

  </head>

  <body>

    <nav class="navbar navbar-inverse" style="border-radius:0px;">
      <?php cart(); ?>
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
            <li class="active"><a href="menu.php">Menu Makanan</a></li>
            <li><a href="contact.php">Kontak</a></li>
            <li><a href="#">Riwayat Pemesanan</a></li>
          </ul>
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
      <div class="collapse navbar-collapse" style="text-align:center; background-color:#eeeeee; ">
        <h4>Selamat datang <?php echo $_SESSION['cust_name']; ?></h4>
      </div>
    </nav>

    <!-- menu makanan -->
    <div class="container">
      <div class="row">
        <?php
        $stmt = $conn->query('select item_id,item_name,harga,stok,item_image from items where aktif=1'); //Query to select sire, dam and horse name from the horse table with the associated connection.	
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="col-sm-4">
            <div class="panel panel-primary" style="border-radius:0px;">
              <div class="panel-heading" align="center" style="border-radius:0px;"><b style="font-size:17px;"><?php echo $row['item_name']; ?></b></div>

              <div class="panel-body" align="center" style="height:250px; width:350px; "><?php echo '<img src="' . $row['item_image'] . '"  alt="Image">' ?></div>
              
              <div class="panel-footer" align="center"><b style="font-size:15px;">Harga : Rp<?php echo $row['harga']; ?></b></div>
              
              <div class="panel-footer" align="center">
                <b style="font-size:15px;">Stok : <?php echo $row['stok']; ?></b>
              </div>
              
              <?php if ($row['stok'] > 0) { ?>
                <a class="btn btn-light btn-lg btn-block" href="menu.php?itm_id=<?php echo $row['item_id']; ?>">Tambah ke keranjang</a>
              <?php } else { ?>
                <button class="btn btn-light btn-lg btn-block" disabled style="color: red;">Stok habis. Silakan cek kembali nanti.</button>
              <?php } ?>
              <!-- <a class="btn btn-light btn-lg btn-block" href="menu.php?itm_id=<?php echo $row['item_id']; ?>">Tambah ke keranjang</a> -->
            </div>
          </div>


        <?php } ?>
      </div>
    </div>


  </body>

  </html>
<?php } ?>