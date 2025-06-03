<?php
include '../koneksi/koneksi.php';

$id_produk = $_GET['item_id'];

$hapus = $conn->query("UPDATE items SET aktif=0 WHERE item_id=$id_produk");

if($hapus){
	header("location:produk.php");
}else{
	echo"gagal menghapus data";
}
?>