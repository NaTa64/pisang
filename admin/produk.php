<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['admin'];
}
?>
<?php
include "../koneksi/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="icon" type="image/png" href="./image aset/images-removebg-preview.png">
  <title>Web Pemimjaman Jurusan TI</title>
  <style>
    /* Sidebar */
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

    /* Content */
    .content {
      margin-left: 200px;
      padding: 30px;
      background-color: #f4f7fc;
      min-height: 100vh;
    }

    .card {
      margin-top: 30px;
      margin-bottom: 30px;
      border: 1px solid #e3e3e3;
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transform: translateY(-5px);
    }

    .card-body {
      padding: 20px;
    }

    .card-title {
      font-size: 18px;
      font-weight: bold;
    }

    .card-text {
      font-size: 14px;
      color: #555;
    }

    .btn {
      font-size: 14px;
      padding: 8px 12px;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-danger {
      background-color: #dc3545;
      border-color: #dc3545;
    }

    .text-center a {
      margin: 5px;
    }

    .row-search {
      margin-top: 20px;
      display: flex;
      justify-content: flex-end;
    }

    /* Hilangkan efek hover pada gambar */
    .card-img-top {
      transition: none;
      /* Menghapus efek transisi saat hover */
    }

    /* Efek hover untuk card (kartu) */
    .card:hover {
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      transform: translateY(-5px);
    }

    /* Efek hover pada tombol Edit dan Hapus (tetap ada) */
    #tabelanggota .btn-group .btn-primary:hover,
    #tabelanggota .btn-group .btn-danger:hover {
      transform: scale(1.1);
      /* Membesarkan tombol saat hover */
      background-color: #007bff;
      /* Mengubah warna latar belakang tombol Edit */
      color: white;
      /* Mengubah warna teks tombol Edit menjadi putih */
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="#"><i class="fas fa-box"></i> Produk</a>
    <a href="pelanggan.php"><i class="fas fa-users"></i> Pelanggan</a>
    <a href="pesanan.php"><i class="fas fa-clipboard"></i> Pesanan</a>
    <!-- <a href="pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a> -->
    <div style="flex-grow: 1;"></div>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="content">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="page-header">Data Produk</h2>
      <hr>

      <div class="row-search" >
        <a href="tambahproduk.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Produk</a>
      </div>

      <div class="row">
        <?php
        $query = $conn->query("SELECT * FROM items where aktif=1");
        while ($lihat = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <div class="col-md-3">
            <div class="card">
              <img src="../<?php echo $lihat['item_image']; ?>" class="card-img-top" alt="" width="300px" height="200px">
              <div class="card-body">

                <h5 class="card-title"><?php echo $lihat['item_name']; ?></h5>

                <p class="card-text">Harga: <?php echo $lihat['harga']; ?></p>
                
                <p class="card-text">Stok: <?php echo $lihat['stok']; ?></p>

                <div class="text-center">
                  <a href="editproduk.php?item_id=<?php echo $lihat['item_id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                  <a href="hapusproduk.php?item_id=<?php echo $lihat['item_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>