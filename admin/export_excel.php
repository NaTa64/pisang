<?php
session_start();
include "../koneksi/koneksi.php";

if (!isset($_SESSION['idadmin'])) {
    header('location:login.php');
}

$period = $_GET['period'] ?? 'daily';
$date = $_GET['date'] ?? date('Y-m-d');

// Query berdasarkan periode
if ($period == 'daily') {
    $query = "SELECT 
        DATE(o.tanggal_order) as tanggal,
        i.item_name as produk,
        SUM(oi.qty) as jumlah_terjual,
        SUM(oi.qty * i.harga) as total_pendapatan
    FROM orders o
    JOIN order_items oi ON o.order_id = oi.order_id
    JOIN items i ON oi.item_id = i.item_id
    WHERE DATE(o.tanggal_order) = :date
    GROUP BY i.item_id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':date', $date);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $filename = "Laporan_Harian_" . $date . ".xls";
} else {
    // Monthly report
    $month = date('Y-m', strtotime($date));

    $query = "SELECT 
        DATE_FORMAT(o.tanggal_order, '%Y-%m-%d') as tanggal,
        i.item_name as produk,
        SUM(oi.qty) as jumlah_terjual,
        SUM(oi.qty * i.harga) as total_pendapatan
    FROM orders o
    JOIN order_items oi ON o.order_id = oi.order_id
    JOIN items i ON oi.item_id = i.item_id
    WHERE DATE_FORMAT(o.tanggal_order, '%Y-%m') = :month
    GROUP BY DATE(o.tanggal_order), i.item_id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':month', $month);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $filename = "Laporan_Bulanan_" . $month . ".xls";
}

// Header untuk file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");

// Output data
echo "Tanggal\tProduk\tJumlah Terjual\tTotal Pendapatan\n";

$total_terjual = 0;
$total_pendapatan = 0;

foreach ($results as $row) {
    echo $row['tanggal'] . "\t";
    echo $row['produk'] . "\t";
    echo $row['jumlah_terjual'] . "\t";
    echo 'Rp' . number_format($row['total_pendapatan'], 3, '.', '.') . "\n";

    $total_terjual += $row['jumlah_terjual'];
    $total_pendapatan += $row['total_pendapatan'];
}

echo "\n";
echo "Total\t\t" . $total_terjual . "\tRp" . number_format($total_pendapatan, 3, '.', '.') . "\n";

exit;
