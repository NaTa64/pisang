<?php
session_start();

require("koneksi/koneksi.php"); // Including the db Connection

// if (!isset($_SESSION['username'])) {
//   echo "<script>window.open('login.php','_self')</script>";
// } else {
?>

<html lang="en">

<head>
  <title>WARUNG ZAYN</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script>
    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>

  <style>
    .panel-primary {
      border-color: linear-gradient(to right, #007bff, #5c9fff);
    }

    .panel-primary>.panel-heading {
      /* background-color:rgb(251, 113, 0); */
      background: linear-gradient(to right, #007bff, #5c9fff);

      border-color: linear-gradient(to right, #007bff, #5c9fff);
    }

    .deskripsi-makanan {
      color: white;
      display: none;
      text-align: justify;
      position: absolute;
      top: 100%;
      left: 0;
      background: linear-gradient(to right, #007bff, #5c9fff);
      border-color: linear-gradient(to right, #007bff, #5c9fff);
      border-radius: 8px;
      margin: 1px;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
      padding: 10px;
      border: 1px solid #ddd;
      width: 100%;
    }

    .panel-body:hover .deskripsi-makanan {
      display: block;
    }
  </style>

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
        <!-- <a class="navbar-brand" href="#">Logo</a> -->
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="home.php">Home</a></li>
          <li class="active"><a href="menu.php">Menu Makanan</a></li>
          <li><a href="history.php">Riwayat Pemesanan</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li style="top:7px;">
            <form class="form-inline my-2 my-lg-0" method="get" action="results.php" enctype="multipart/form-data">
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

    <!-- Pesan selamat datang -->
    <?php if (isset($_SESSION['username'])) { ?>
      <div class="collapse navbar-collapse" style="text-align:center; background-color:#eeeeee; ">
        <h4>Selamat datang <?php echo $_SESSION['cust_name']; ?></h4>
      </div>
    <?php } ?>
    <!-- End Pesan selamat datang -->

  </nav>

  <!-- menu makanan -->
  <div class="container">
    <div class="row">
      <?php
      $stmt = $conn->query('select item_id,item_name,harga,stok,item_image,item_desc from items where aktif=1');
      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <div class="col-sm-4">
          <div class="panel panel-primary" style="border-radius:10px 10px 10px 10px;">

            <div class="panel-heading" align="center" style="border-radius:7px 7px 0px 0px;"><b style="font-size:17px;"><?php echo $row['item_name']; ?></b></div>

            <div class="panel-body" align="center" style="height:250px; width:auto; ">
              <img src="<?php echo $row['item_image']; ?>" alt="Image" class="img-responsive">
              <div class="deskripsi-makanan">
                <p><?php echo $row['item_desc']; ?></p>
              </div>

              <script>
                $(document).ready(function() {
                  $('.img-responsive').on('click', function() {
                    $(this).next('.deskripsi-makanan').toggle();
                  });
                });
              </script>
            </div>

            <div class="panel-footer" align="center"><b style="font-size:15px;">Harga : Rp<?php echo $row['harga']; ?></b></div>

            <div class="panel-footer" align="center">
              <b style="font-size:15px;">Stok : <?php echo $row['stok']; ?></b>
            </div>

            <?php if ($row['stok'] > 0) { ?>
              <?php if (isset($_SESSION['username'])) { ?>
                <a class="btn btn-tambah btn-md btn-block" href="menu.php?itm_id=<?php echo $row['item_id']; ?>">Tambah ke keranjang</a>
              <?php } else { ?>
                <a class="btn btn-tambah btn-md btn-block" href="login.php" style="pointer-events: none; cursor: default;">Login untuk tambah ke keranjang</a>
              <?php } ?>
            <?php } else { ?>
              <button class="btn btn-light btn-lg btn-block" disabled style="color: red;">Stok habis. Silakan cek kembali nanti.</button>
            <?php } ?>

          </div>
        </div>
      <?php } ?>
    </div>

    <!-- <a href="https://wa.me/+6289657172345?text=Halo%20saya%20ingin%20bertanya%20tentang%20produk%20Anda" class="whatsapp-button" target="_blank">
      <img src="Pictures/whatsapp.webp" alt="Logo WhatsApp">
    </a> -->

</body>

</html>