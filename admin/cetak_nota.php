<?php
session_start();
include "../koneksi/koneksi.php";

if (!isset($_SESSION['idadmin'])) {
    header('location:login.php');
}

$order_id = $_GET['order_id'];

$query = "SELECT 
          orders.order_id,
          orders.cust_id,
          orders.total,
          orders.name,
          orders.alamat,
          orders.phone,
          orders.status,
          orders.tanggal_order,
          orders.tanggal_selesai,
          GROUP_CONCAT(items.item_name SEPARATOR ', ') AS produk,
          GROUP_CONCAT(order_items.qty SEPARATOR ', ') AS jumlah,
          GROUP_CONCAT(items.harga SEPARATOR ', ') AS harga
          from orders
          JOIN order_items ON orders.order_id = order_items.order_id
          JOIN items ON order_items.item_id = items.item_id
          WHERE orders.order_id = :order_id
          GROUP BY orders.order_id";

$stmt = $conn->prepare($query);
$stmt->bindParam(':order_id', $order_id);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);

$produk = explode(', ', $data['produk']);
$jumlah = explode(', ', $data['jumlah']);
$harga = explode(', ', $data['harga']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pemesanan #<?php echo $data['order_id']; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .nota-container {
            max-width: 500px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 1px dashed #000;
            padding-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        .info-pelanggan {
            margin-bottom: 20px;
        }

        .info-pelanggan p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        .total {
            text-align: right;
            font-weight: bold;
            font-size: 18px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            border-top: 1px dashed #000;
            padding-top: 10px;
            font-style: italic;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                padding: 0;
            }

            .nota-container {
                box-shadow: none;
                border: none;
            }
        }
    </style>
</head>

<body>
    <div class="nota-container">
        <div class="header">
            <h2>Nota Pemesanan</h2>
            <p>No. Order: <?php echo $data['order_id']; ?></p>
            <p>Tanggal: <?php echo $data['tanggal_order']; ?></p>
        </div>

        <div class="info-pelanggan">
            <h3>Informasi Pelanggan</h3>
            <p>Nama: <?php echo $data['name']; ?></p>
            <p>Alamat: <?php echo $data['alamat']; ?></p>
            <p>No. HP: <?php echo $data['phone']; ?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th>Produk</th>
                    <th style="text-align: center;">Jumlah</th>
                    <th>Harga/pcs</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                for ($i = 0; $i < count($produk); $i++):
                    $subtotal = $jumlah[$i] * $harga[$i];
                    $total += $subtotal;
                ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $i + 1; ?></td>
                        <td><?php echo $produk[$i]; ?></td>
                        <td style="text-align: center;"><?php echo $jumlah[$i]; ?></td>
                        <td>Rp<?php echo number_format($harga[$i], 3, '.', '.'); ?></td>
                        <td>Rp<?php echo number_format($subtotal, 3, '.', '.'); ?></td>
                    </tr>
                <?php endfor; ?>
            </tbody>
        </table>

        <div class="total">
            Total: Rp<?php echo number_format($data['total'], 3, '.', '.'); ?>
        </div>

        <!-- <div class="status">
            <p><strong>Status:</strong> <?php echo $data['status']; ?></p>
            <?php if (!empty($data['tanggal_selesai'])): ?>
                <p><strong>Tanggal Selesai:</strong> <?php echo $data['tanggal_selesai']; ?></p>
            <?php endif; ?>
        </div> -->

        <div class="footer">
            <p>Terima kasih atas pesanannya!</p>
            <p>Hubungi kami jika ada pertanyaan</p>
            <button onclick="window.print()" class="no-print">Cetak Nota</button>
        </div>
    </div>
</body>

</html>