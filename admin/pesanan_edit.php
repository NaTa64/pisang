<?php
session_start();
// if (!isset($_SESSION['admin'])) {
//     header('location:login.php');
//     exit();
// } else {
//     $username = $_SESSION['admin'];
// }

include "../koneksi/koneksi.php";

// Pastikan order_id diterima dengan benar (dari URL atau POST)
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id']; // Mengambil ID dari URL
} else {
    die("Pesanan tidak ditemukan.");
}

// Ambil data pesanan dari database untuk menampilkan data yang akan diedit
$query = $conn->query("SELECT 
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
        WHERE orders.order_id='$order_id'");

$result = $query->fetch(PDO::FETCH_ASSOC);

// Pastikan data peminjaman ditemukan
if (!$result) {
    die("Pesanan tidak ditemukan.");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="produk.php"><i class="fas fa-box"></i> Produk</a>
        <a href="pelanggan.php"><i class="fas fa-users"></i> Pelanggan</a>
        <a href="pesanan.php"><i class="fas fa-clipboard"></i> Pesanan</a>
    </div>

    <div class="content">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header">Edit Pesanan</h1>
            <hr>
            <section class="row">
                <div class="col-md-12">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                        </div><!--/.box-header-->

                        <!-- Form start -->
                        <form role="form" action="pesanan_editproses.php" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label>No Pesanan :</label>
                                    <input type="text" disabled value="<?php echo $result['order_id']; ?>" name="order_id" class="form-control mt-2">
                                    <input type="hidden" value="<?php echo $result['order_id']; ?>" name="order_id">
                                </div>

                                <div class="form-group mt-3">
                                    <label>Nama Pelanggan :</label>
                                    <input type="text" disabled value="<?php echo $result['name']; ?>" name="name" class="form-control mt-2">
                                </div>

                                <!-- <div class="form-group mt-3">
                                    <label>Alamat :</label>
                                    <input type="text" disabled value="<?php echo $result['alamat']; ?>" name="alamat" class="form-control mt-2">
                                </div>

                                <div class="form-group mt-3">
                                    <label>No HP :</label>
                                    <input type="text" disabled value="<?php echo $result['phone']; ?>" name="phone" class="form-control mt-2">
                                </div> -->

                                <div class="form-group mt-3">
                                    <label>Produk :</label>
                                    <ul>
                                        <?php
                                        $produk = explode(', ', $result['produk']);
                                        $jumlah = explode(', ', $result['jumlah']);

                                        foreach ($produk as $key => $value) {
                                            echo '<li>' . $value . ' (' . $jumlah[$key] . ')</li>';
                                        }
                                        ?>
                                    </ul>
                                </div>

                                <div class="form-group mt-3">
                                    <label>Total :</label>
                                    <input type="text" disabled value="<?php echo $result['total']; ?>" name="total" class="form-control mt-2">
                                </div>

                                <?php
                                $status = $result['status'];
                                ?>

                                <div class="form-group mt-3">
                                    <label for="exampleInputPassword1">Status Pesanan :</label>
                                    <select name="status" class="form-control mt-2">
                                        <option value="Sedang Diproses" <?php echo $status == 'Sedang Diproses' ? 'selected' : ''; ?>>Sedang Diproses</option>
                                        <option value="Sedang Diantar" <?php echo $status == 'Sedang Diantar' ? 'selected' : ''; ?>>Sedang Diantar</option>
                                        <option value="Telah Selesai" <?php echo $status == 'Telah Selesai' ? 'selected' : ''; ?>>Telah Selesai</option>
                                    </select>
                                </div>

                                <div class="box mt-5" style="display: flex; justify-content: space-between;">
                                    <a href="pesanan.php" class="btn btn-danger">Kembali</a>
                                    <button type="submit" name="simpan" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                </div>

                            </div>
                        </form>
                    </div><!--/.box-danger-->
                </div><!--/.col-md-12-->
            </section><!-- /.content -->
        </div><!-- /.col-sm-9 -->
    </div><!-- /.content -->
</body>

</html>