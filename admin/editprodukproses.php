<?php

include "../koneksi/koneksi.php";

$id_produk = $_POST['item_id'];

// Fungsi resize image
function resize_image($file, $width, $height)
{
	$image = imagecreatefromstring(file_get_contents($file));
	$new_image = imagecreatetruecolor($width, $height);
	imagecopyresampled($new_image, $image, 0, 0, 0, 0, $width, $height, imagesx($image), imagesy($image));
	imagejpeg($new_image, $file, 90);
	imagedestroy($image);
	imagedestroy($new_image);
}

// Proses upload file
if (isset($_FILES['gambar']) && $_FILES['gambar']['size'] > 0) {
	$gambar = $_FILES['gambar'];
	// $nama_gambar = $gambar['name']; //menyimpan file dengan nama file yang diupload jika ingin

	//menyimpan file dengan nama sesuai item id jika ingin
	// '.' digunakan untuk memisahkan nama file dengan ekstensi file
	// pathinfo($gambar['name'], PATHINFO_EXTENSION) digunakan untuk mengambil ekstensi file asal misal jpg png svg webp
	$nama_gambar = $id_produk . '.' . pathinfo($gambar['name'], PATHINFO_EXTENSION);

	$tmp_gambar = $gambar['tmp_name']; //file akan disimpan sementara di server
	$path_gambar = '../Pictures/' . $nama_gambar; //tempat menyimpan file
	$folder_gambar = dirname($path_gambar); // hasil: '../Pictures'
	$gambar_path_db = $folder_gambar . '/' . $nama_gambar; // hasil: '../Pictures/namafile'

	// tapi kamu ingin menghilangkan prefix '../', jadi:
	$gambar_path_db = str_replace('../', '', $gambar_path_db); // hasil: 'Pictures/namafile

	move_uploaded_file($tmp_gambar, $path_gambar); //memindah file sementara yang ada di server ke lokal
	resize_image($path_gambar, 200, 200); // Panggil fungsi resize image
	$query = $conn->query("UPDATE items SET item_image = '$gambar_path_db' WHERE item_id = '$id_produk'");
}

$nama_produk = $_POST['item_name'];
$harga_produk = $_POST['harga'];
$stok_produk = $_POST['stok'];
$deskripsi = $_POST['item_desc'];

$ubah = "update items set item_id=$id_produk, item_name='$nama_produk', harga='$harga_produk', stok=$stok_produk, item_desc='$deskripsi' where item_id='$id_produk'";
$update = $conn->query($ubah);

if ($update) {
	header("location:produk.php");
} else {
	echo "gagal mengubah data";
}
