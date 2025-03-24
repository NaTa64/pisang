<?php

include "../koneksi/koneksi.php";

// if (isset($_FILES['gambar'])) {
// 	$gambar = $_FILES['gambar'];
// 	$nama_gambar = $gambar['name'];
// 	$tmp_gambar = $gambar['tmp_name'];
// 	$path_gambar = '../image aset/' . $nama_gambar;
// 	move_uploaded_file($tmp_gambar, $path_gambar);
// 	$query = $conn->query("UPDATE items SET gambar = '$path_gambar' WHERE item_id = '$item_id'");
// }

$id_produk = $_POST['item_id'];
$nama_produk = $_POST['item_name'];
$harga_produk = $_POST['harga'];
$stok_produk = $_POST['stok'];

$ubah = "update items set item_id=$id_produk, item_name='$nama_produk', harga='$harga_produk', stok=$stok_produk where item_id='$id_produk'";
$update = $conn->query($ubah);

if ($update) {
	header("location:produk.php");
} else {
	echo $ganti;
	echo "gagal mengubah data";
}
?>