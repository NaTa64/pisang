<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header('location:login.php');
} else {
  $username = $_SESSION['admin'];
}
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
    /* Style the sidebar */
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

    .row-search {
      margin-top: 20px;
      display: flex;
      justify-content: flex-end;
    }

    .row-search a {
      margin-left: 10px;
    }

    /* .page-header {
      font-size: 26px;
      font-weight: bold;
      color: #333;
    } */

    /* h2.page-header {
      font-family: 'Roboto', sans-serif;
    } */

    /* Efek hover pada baris tabel */
    #tabelpelanggan tbody tr:hover {
      background-color: #f0f8ff;
      /* Warna latar belakang saat hover (biru muda) */
      transform: scale(1.03);
      /* Sedikit pembesaran pada baris */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Bayangan lembut */
      transition: all 0.3s ease;
      /* Transisi halus untuk perubahan latar belakang, pembesaran, dan bayangan */
    }

    /* Memberikan animasi transisi pada nomor HP ketika hover */
    #tabelpelanggan tbody td a:hover {
      color: #25d366;
      /* Ubah warna teks menjadi hijau khas WhatsApp saat hover */
      text-decoration: underline;
      /* Menambahkan garis bawah pada teks */
      transition: color 0.3s ease, text-decoration 0.3s ease;
      /* Transisi halus pada perubahan warna dan garis bawah */
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="produk.php"><i class="fas fa-box"></i> Produk</a>
    <a href="#"><i class="fas fa-users"></i> Pelanggan</a>
    <a href="pesanan.php"><i class="fas fa-clipboard"></i> Pesanan</a>
    <!-- <a href="pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a> -->
    <div style="flex-grow: 1;"></div>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="content">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="page-header">Data Pelanggan</h2>
      <hr>

      <!-- <div class="row-search" >
        <a href="tambahpeminjam.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Anggota</a>
      </div> -->

      <table id="tabelpelanggan" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Username</th>
            <!-- <th>Nim</th> -->
            <!-- <th>Jurusan</th> -->
            <!-- <th>Kelas</th> -->
            <!-- <th>Semester</th> -->
            <!-- <th>Nomor HP</th> Menambahkan kolom untuk Nomor HP -->
            <!-- <th>Opsi</th> -->
            <!-- <th>Hapus</th> -->
          </tr>
        </thead>

        <?php
        // Menambahkan kolom no_hp di query
        $query = $conn->query("SELECT * FROM customers");
        $nomor = 1;
        while ($lihat = $query->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <tbody>
            <tr>
              <td><?php echo $nomor; ?></td>
              <td><?php echo htmlspecialchars($lihat['cust_id']); ?></td>
              <td><?php echo htmlspecialchars($lihat['cust_dname']); ?></td>
              <!-- <td><?php echo htmlspecialchars($lihat['nim']); ?></td> -->
              <!-- <td><?php echo htmlspecialchars($lihat['jurusan']); ?></td> -->
              <!-- <td><?php echo htmlspecialchars($lihat['no_kelas']); ?></td> -->
              <!-- <td><?php echo htmlspecialchars($lihat['semester']); ?></td> -->
              <!-- <td>
                <!-- Membuat nomor HP menjadi link WhatsApp dengan pesan otomatis -->
              <!-- <a href="https://wa.me/<?php echo preg_replace('/[^0-9]/', '', htmlspecialchars($lihat['no_hp'])); ?>?text=<?php echo urlencode('Terima Kasih Telah Melakukan Peminjaman Barang Di Jurusan Saya Harap Anda Dapat Mengembalikannya Sebelum Pukul 17:30 WITA TERIMA KASIH :) '); ?>" target="_blank" style="text-decoration: none">
                  <?php echo htmlspecialchars($lihat['no_hp']); ?>
                </a> -->

              <!-- </td> -->

              <!-- <td>
                <a href="editpeminjam.php?cust_id=<?php echo htmlspecialchars($lihat['cust_id']); ?>" class="btn btn-primary"><i class="fas fa-edit"> Edit</i></a>
                <a href="hapuspeminjam.php?cust_id=<?php echo htmlspecialchars($lihat['cust_id']); ?>" class="btn btn-danger"><i class="fa fa-trash"> Hapus</i></a>
              </td> -->

            </tr>
            <?php $nomor++; ?>
          <?php
        } ?>
          </tbody>
      </table>

    </div>
  </div>
</body>

</html>