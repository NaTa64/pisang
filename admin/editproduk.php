<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['admin'];
}
?>
<?php
include "../koneksi/koneksi.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="icon" type="image/png" href="./image aset/images-removebg-preview.png">

  <title>Web Penjualan</title>

  <style>
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

    .content {
      margin-left: 200px;
      padding: 20px;
      padding-top: 30px;

    }
  </style>
</head>

<body>
  <div class="sidebar">
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="produk.php"><i class="fas fa-box"></i> Produk</a>
    <a href="peminjam.php"><i class="fas fa-users"></i> Anggota</a>
    <a href="peminjaman.php"><i class="fas fa-clipboard"></i> Peminjaman</a>
    <a href="pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a>
  </div>

  <div class="content">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h1 class="page-header">Edit Produk</h1>
      <hr>
      <section class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form element -->
          <div class="box box-danger">
            <div class="box-header with-border">
            </div><!--/.box-header-->
            <?php
            $item_id = $_GET['item_id'];
            $query = $conn->query("SELECT * FROM items where item_id='$item_id'");
            while ($edit = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
              <!-- form start -->
              <form role="form" action="editprodukproses.php" method="post">
                <div class="box-body">

                  <div class="form-group">
                    <!-- <label>Gambar Produk :</label> -->
                    <img src="../<?php echo $edit['item_image']; ?>" alt="Gambar Produk" width="200" height="200">
                  </div>

                  <!-- Jika mau ganti gambar -->
                  <!-- <div class="form-group">
                    <label>Upload Gambar :</label>
                    <input type="file" name="gambar" class="form-control mt-2">
                  </div> -->

                  <div class="form-group">
                    <!-- <label>ID :</label> -->
                    <input type="hidden" disable value="<?php echo $edit['item_id'] ?>" name="item_id" class="form-control mt-2" placeholder="" disabled>
                    <input type="hidden" value="<?= $edit['item_id']; ?>" name="item_id">
                  </div>

                  <div class="form-group mt-3">
                    <label>Nama Produk : <?php echo $edit['item_name'] ?></label>
                    <input type="text" value="<?php echo $edit['item_name'] ?>" name="item_name"
                      class="form-control mt-2" placeholder="" required>
                  </div>

                  <div class="form-group mt-3">
                    <label>Harga Produk : Rp<?php echo $edit['harga'] ?></label>
                    <input type="text" value="<?php echo $edit['harga'] ?>" name="harga"
                      class="form-control mt-2" placeholder="" required>
                  </div>

                  <div class="form-group mt-3">
                    <label>Stok Barang : <?php echo $edit['stok'] ?></label>
                    <input type="number" value="<?php echo $edit['stok'] ?>" name="stok" style="height: 40px;"
                      class="form-control mt-2" placeholder="" required min="0" max="1000">
                    <style>
                      input[type="number"]::-webkit-inner-spin-button,
                      input[type="number"]::-webkit-outer-spin-button {
                        height: 40px;
                        width: 20px;
                        margin: 0;
                        -webkit-appearance: default;
                        background-color: #fff;
                        border: 1px solid #ccc;
                      }
                    </style>
                  </div>

                  <!-- <div class="box mt-5" style=" display: flex; justify-content: space-between;"> -->
                  <div class="box mt-5">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                    <!-- <div class="d-flex"> -->
                    <button type="reset" class="btn btn-danger">Reset Data</button>
                    <a href="produk.php" class="btn btn-warning">Kembali</a>
                    <!-- </div> -->

                  </div>

                </div>

              </form>
            <?php
            }
            ?>
      </section>
    </div>
  </div>