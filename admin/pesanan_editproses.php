<?php
include "../koneksi/koneksi.php";

$order_id = $_POST['order_id'];
$status = $_POST['status'];
$estimasi = $_POST['estimasi'];

// Jika status pesanan adalah "selesai", maka kolom aktif diupdate menjadi 0
if ($status == "Telah Selesai") {
    $aktif = 0;
} else {
    $aktif = 1;
}

$ubah_status = "UPDATE orders set status = '$status', estimasi = '$estimasi' , aktif = '$aktif', tanggal_selesai = " . ($status == "Telah Selesai" ? "NOW()" : "NULL") . " WHERE order_id ='$order_id'";

if ($conn->query($ubah_status)) {
    // Jika query berhasil dijalankan, maka header akan dikirimkan
    header("location: pesanan.php");
    exit;
} else {
    // Jika query gagal dijalankan, maka pesan error akan ditampilkan
    echo "Gagal update status pesanan";
}
