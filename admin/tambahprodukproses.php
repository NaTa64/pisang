<?php
include '../koneksi/koneksi.php';

$namafolder = "Pictures"; //tempat menyimpan file

// $id_produk = $_POST['item_id'];
$nama_produk = $_POST['item_name'];
$harga_produk = $_POST['harga'];
$stok_produk = $_POST['stok'];
$foto = $_FILES['item_image']['name'];

if (isset($_POST['tambah'])) {
    $dir = "Pictures/";
    $fileName = $dir . basename($_FILES['item_image']['name']);

    // Simpan di Folder Gambar
    move_uploaded_file($_FILES['item_image']['tmp_name'], $fileName);

    $query = $conn->query("INSERT INTO items (item_name, harga, stok, item_image) VALUES ('$nama_produk', '$harga_produk', $stok_produk, '$fileName')");

    if ($query) {
        header("location: produk.php");
    } else {
        echo "gagal menambah data";
    }
}
?>
