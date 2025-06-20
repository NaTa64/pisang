<?php
require("koneksi/koneksi.php");

if (!isset($_SESSION['username'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
?>

<html lang="en">

<head>
    <title>WARUNG ZAYN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
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

    <nav class="navbar navbar-inverse" style="border-radius:0px;">
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
                    <li><a href="menu.php">Menu Makanan</a></li>
                    <li class="active"><a href="history.php">Riwayat Pemesanan</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
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
            <h2 class="page-header">Riwayat Pemesanan</h2>
            <button onclick="window.print()">Cetak</button>

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
                        <th>Estimasi</th>
                        <th>Tanggal_Order</th>
                        <th>Tanggal_Selesai</th>
                        <!-- <th>Opsi</th> -->
                    </tr>
                </thead>

                <?php

                $query = "SELECT 
        orders.order_id,
        orders.total,
        orders.name,
        orders.alamat,
        orders.phone,
        orders.status,
        orders.tanggal_order,
        orders.tanggal_selesai,
        orders.estimasi,
        GROUP_CONCAT(items.item_name SEPARATOR ', ') AS produk,
        GROUP_CONCAT(order_items.qty SEPARATOR ', ') AS jumlah
        from orders
        JOIN order_items ON orders.order_id = order_items.order_id
        JOIN items ON order_items.item_id = items.item_id
        WHERE orders.cust_id = '" . $_SESSION['cust_id'] . "'
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
                            <td align="center">
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

                            <td><?php echo $lihat['estimasi']; ?></td>

                            <td><?php echo $lihat['tanggal_order']; ?></td>

                            <td>
                                <?php if (empty($lihat['tanggal_selesai'])) { ?>
                                    Belum Selesai
                                <?php } else { ?>
                                    <?php echo $lihat['tanggal_selesai']; ?>
                                <?php } ?>
                            </td>

                        </tr>
                        <?php $no++; ?>
                    <?php
                } ?>
                    </tbody>
            </table>
        </div>
</body>

</html>