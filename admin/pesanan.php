<?php
session_start();
// if (!isset($_SESSION['admin'])) {
//   header('location:login.php');
// } else {
//   $username = $_SESSION['admin'];
// }

include "../koneksi/koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="icon" type="image/png" href="./image aset/images-removebg-preview.png">
  <title>Web Peminjaman Jurusan TI</title>
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
      padding: 30px;
      background-color: #f4f7fc;
      min-height: 100vh;
    }

    .page-header {
      font-size: 30px;
      font-weight: bold;
      color: #333;
      text-align: left;
    }

    .row-search {
      display: flex;
      justify-content: space-between;
      /* Teks kiri dan tombol kanan */
      align-items: center;
      margin-top: 20px;
      margin-bottom: 20px;
    }

    .row-search .btn-primary {
      margin-left: auto;
    }

    #tabelpesanan th,
    #tabelpesanan td {
      text-align: center;
      vertical-align: middle;
    }

    .btn-primary {
      margin-right: 10px;
    }

    h2.page-header {
      font-family: 'Roboto', sans-serif;
    }

    /* Menambahkan efek hover dengan bayangan dan pembesaran */
    #tabelpesanan tbody tr:hover {
      background-color: #f0f8ff;
      /* Biru terang saat hover */
      transform: scale(1.03);
      /* Membesarkan sedikit */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Menambahkan bayangan halus */
      transition: all 0.3s ease;
    }

    /* Animasi pada tombol Edit dan Hapus */
    #tabelpesanan .btn-group a {
      transition: transform 0.2s ease, background-color 0.3s ease;
    }

    /* Efek hover pada tombol Edit */
    #tabelpesanan .btn-group .btn-primary:hover {
      transform: scale(1.1);
      /* Membesarkan tombol Edit sedikit */
      background-color: #0056b3;
      /* Mengubah warna latar belakang tombol Edit menjadi biru lebih gelap */
      color: white;
      /* Mengubah warna teks menjadi putih */
    }

    /* Efek hover pada tombol Hapus */
    #tabelpesanan .btn-group .btn-danger:hover {
      transform: scale(1.1);
      /* Membesarkan tombol Hapus sedikit */
      background-color: #dc3545;
      /* Mengubah warna latar belakang tombol Hapus menjadi merah terang */
      color: white;
      /* Mengubah warna teks menjadi putih */
    }
  </style>

</head>

<body>
  <div class="sidebar">
    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    <a href="produk.php"><i class="fas fa-box"></i> Produk</a>
    <a href="pelanggan.php"><i class="fas fa-users"></i> Pelanggan</a>
    <a href="pesanan.php"><i class="fas fa-clipboard"></i> Pesanan</a>
    <!-- <a href="pengembalian.php"><i class="fas fa-undo"></i> Pengembalian</a> -->
    <div style="flex-grow: 1;"></div>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="content">
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <h2 class="page-header">Pesanan</h2>
      <hr>

      <div class="row-search">
        <a href="tambahpeminjaman.php" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Peminjaman</a>
      </div>

      <table id="tabelpesanan" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat</th>
            <th>No HP</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Status</th>
            <th>Tanggal_Order</th>
            <!-- <th>Status</th> -->
            <th>Opsi</th>
          </tr>
        </thead>

        <?php
        // $query = "SELECT orders.order_id, orders.name, orders.alamat, orders.phone, orders.jumlah, order_items.i_id, items.item_name, items.harga
        //   as jumlah
        //   FROM orders 
        //   JOIN order_items 
        //   ON orders.order_id = order_items.cust_id
        //   JOIN items 
        //   ON order_items.i_id = items.item_id";

        // $query = "SELECT 
        // orders.order_id,
        // orders.order_amount,
        // orders.name,
        // orders.alamat,
        // orders.phone,
        // orders.status,
        // GROUP_CONCAT(items.item_name SEPARATOR ', ') AS produk, 
        // GROUP_CONCAT(order_items.qty SEPARATOR ', ') AS jumlah
        // from orders
        // JOIN order_items ON orders.order_id = order_items.id
        // JOIN items ON order_items.id = items.item_id
        // GROUP BY orders.order_id";

        $query = "SELECT 
        orders.order_id,
        orders.total,
        orders.name,
        orders.alamat,
        orders.phone,
        orders.status,
        orders.tanggal_order,
        GROUP_CONCAT(items.item_name SEPARATOR ', ') AS produk,
        GROUP_CONCAT(order_items.qty SEPARATOR ', ') AS jumlah
        from orders
        JOIN order_items ON orders.order_id = order_items.order_id
        JOIN items ON order_items.item_id = items.item_id
        GROUP BY orders.order_id";

        $result = $conn->query($query);
        $no = 1;
        while ($lihat = $result->fetch(PDO::FETCH_ASSOC)) {
          $total_produk = $lihat['total'];
          // $produk = $lihat['produk'];
          // $jumlah = $lihat['jumlah'];
          $produk = explode(', ', $lihat['produk']);
          $jumlah = explode(', ', $lihat['jumlah']);

        ?>
          <tbody>
            <tr>
              <td><?php echo $no; ?></td>

              <td><?php echo $lihat['name']; ?></td>

              <td><?php echo $lihat['alamat']; ?></td>

              <td><?php echo $lihat['phone']; ?></td>

              <!-- menampilkan produk yang dibeli -->
              <!-- <td>
                <?php foreach ($produk as $value) {
                  echo $value . '<br>';
                } ?>
              </td> -->
              <td>
                <?php foreach ($produk as $key => $value) {
                  echo $value . ' (' . $jumlah[$key] . ')<br>';
                } ?>
              </td>
              <!-- <td>
                <?php echo $produk; ?>
              </td> -->

              <!-- menampilkan total jumlah semua item -->
              <td>
                <?php
                $total_jumlah = array_sum($jumlah);
                echo $total_jumlah;
                ?>
              </td>
              <!-- <td>
                <?php echo $jumlah; ?>
              </td> -->

              <td><?php echo 'Rp' . $total_produk; ?></td>

              <td><?php echo $lihat['status']; ?></td>

              <td><?php echo $lihat['tanggal_order']; ?></td>

              <td>
                <div class="btn-group">
                  <a href="editpeminjaman.php?id_peminjaman=<?php echo $lihat['order_id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                  <a href="hapuspeminjaman.php?id=<?php echo $lihat['order_id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                </div>
              </td>
            </tr>
            <?php $no++; ?>
          <?php
        } ?>
          </tbody>
      </table>
    </div>
  </div>
</body>

</html>