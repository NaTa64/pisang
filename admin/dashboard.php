<?php

include "../koneksi/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="../css/bootstrap.min1.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="icon" type="image/png" href="./image aset/images-removebg-preview.png">

  <title>Web Penjualan</title>

  <style>
    /* Default Styles */
    /* Sidebar Styling */
    .sidebar {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background: linear-gradient(to right, #007bff, #5c9fff);
      /* Gradasi biru lebih soft */
      display: flex;
      flex-direction: column;
      padding-top: 70px;
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
      /* Bayangan lembut di samping */
    }

    .sidebar a {
      padding: 12px 8px 12px 32px;
      text-decoration: none;
      font-size: 16px;
      color: white;
      display: block;
      margin-bottom: 12px;
      border-radius: 4px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    /* Efek hover untuk link di sidebar */
    .sidebar a:hover {
      background-color: #f1f1f1;
      /* Warna latar belakang saat hover */
      color: #007bff;
      /* Mengubah warna teks menjadi biru */
      transform: translateX(10px);
      /* Efek geser ke kanan */
    }

    /* Content Styling */
    .content {
      margin-left: 200px;
      padding: 30px;
      background-color: #f4f7fc;
      /* Latar belakang konten yang lembut */
      min-height: 100vh;
    }

    /* Card Styles */
    .card-info {
      margin: 20px 0;
      padding: 20px;
      border-radius: 8px;
      background-color: #ffffff;
      /* Latar belakang putih untuk kartu */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Bayangan lembut untuk kartu */
      text-align: center;
      height: 200px;
      transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
      border: 1px solid #e3e3e3;
      /* Border abu-abu lembut */
    }

    .card-info h4 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #333333;
      /* Warna teks judul yang gelap */
    }

    .card-info .value {
      font-size: 36px;
      font-weight: bold;
      color: #28a745;
      /* Warna hijau untuk nilai */
      margin-top: 10px;
    }

    .card-info .icon {
      font-size: 50px;
      color: #007bff;
      /* Warna ikon biru */
    }

    /* Animasi efek muncul saat hover */
    .card-info:hover {
      transform: scale(1.05);
      /* Zoom sedikit saat hover */
      background-color: #f8f9fa;
      /* Latar belakang berubah lebih terang */
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      /* Efek bayangan lebih besar */
    }

    /* Make the whole card clickable */
    .card-link {
      text-decoration: none;
      color: inherit;
    }

    /* On screens that are less than 700px wide, make the sidebar into a topbar */
    @media screen and (max-width: 700px) {
      .sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }

      .sidebar a {
        float: left;
      }

      div.content {
        margin-left: 0;
      }
    }

    /* On screens that are less than 400px, display the bar vertically, instead of horizontally
    /* @media screen and (max-width: 400px) {
      .sidebar a {
        text-align: center;
        float: none;
      }
    } */
  </style>
</head>

<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <a href="#"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="produk.php"><i class="fas fa-box"></i> Produk</a>
    <a href="pelanggan.php"><i class="fas fa-users"></i> Pelanggan</a>
    <a href="pesanan.php"><i class="fas fa-clipboard"></i> Pesanan</a>
    <!-- <a href="pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a> -->
    <div style="flex-grow: 1;"></div>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <!-- Content -->
  <div class="content">
    <h2>Dashboard Admin</h2>
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <div class="panel-body">
        <h2 class="text-center">Data</h2>
        <hr>
        <div class="row">

          <!-- Jumlah Produk -->
          <div class="col-md-4">
            <a href="produk.php" class="card-link">
              <div class="card-info">
                <i class="fas fa-box icon"></i>
                <h4>Jumlah Produk</h4>
                <div class="value">
                  <?php

                  $query = $conn->query("SELECT count(item_id) as a FROM items where aktif=1");
                  $data = $query->fetch(PDO::FETCH_ASSOC);
                  echo $data['a'];
                  ?>
                </div>
              </div>
            </a>
          </div>

          <!-- Pelanggan Terdaftar -->
          <!-- <div class="row"> -->
            <div class="col-md-4">
              <a href="pelanggan.php" class="card-link">
                <div class="card-info">
                  <i class="fas fa-users icon"></i>
                  <h4>Pelanggan Terdaftar</h4>
                  <div class="value">
                    <?php
                    $query_pelanggan = $conn->query("SELECT count(cust_id) as pelanggan FROM customers");
                    $data_pelanggan = $query_pelanggan->fetch(PDO::FETCH_ASSOC);
                    echo $data_pelanggan['pelanggan'];
                    ?>
                  </div>
                </div>
              </a>
            </div>
          <!-- </div> -->

          <!-- Jumlah Pesanan -->
          <div class="col-md-4">
            <a href="pesanan.php" class="card-link">
              <div class="card-info">
                <i class="fas fa-box-open icon"></i>
                <h4>Jumlah Pesanan</h4>
                <div class="value">
                  <?php
                  $query_pesanan = $conn->query("SELECT count(order_id) as pesanan FROM orders WHERE aktif = 1");
                  $data_pesanan = $query_pesanan->fetch(PDO::FETCH_ASSOC);
                  echo $data_pesanan['pesanan'];
                  ?>
                </div>
              </div>
            </a>
          </div>

          <!-- Barang Dikembalikan -->
          <!-- <div class="col-md-4">
            <a href="pengembalian.php" class="card-link">
              <div class="card-info">
                <i class="fas fa-undo icon"></i>
                <h4>Barang Dikembalikan</h4>
                <div class="value">
                  <?php
                  // $query_pengembalian = $mysqli->query("SELECT count(id_brg) as returned FROM pengembalian");
                  // $data_pengembalian = mysqli_fetch_assoc($query_pengembalian);
                  // echo $data_pengembalian['returned'];
                  ?>
                </div>
              </div>
            </a>
          </div> -->

        </div>
      </div>
    </div>
  </div>

</body>

</html>