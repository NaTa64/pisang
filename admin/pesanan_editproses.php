<?php
include "../koneksi/koneksi.php";

$order_id = $_POST['order_id'];
$status = $_POST['status'];

// Jika status pesanan adalah "selesai", maka kolom aktif diupdate menjadi 0
if ($status == "Telah Selesai") {
    $aktif = 0;
} else {
    $aktif = 1;
}

$ubah_status = "UPDATE orders set status = '$status', aktif = '$aktif' WHERE order_id ='$order_id'";

if ($conn->query($ubah_status)) {
    // Jika query berhasil dijalankan, maka header akan dikirimkan
    header("location: pesanan.php");
    exit;
} else {
    // Jika query gagal dijalankan, maka pesan error akan ditampilkan
    echo "Gagal update status pesanan";
}
